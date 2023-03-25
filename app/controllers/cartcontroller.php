<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/guestcartservice.php';
require_once __DIR__ . '/../vendor/mollie/mollie-api-php/src/MollieApiClient.php';

class CartController extends Controller {
    private $cartService;

    function __construct() {
        $this->cartService = new CartService();
    }

    public function index() {
        $model = [];

        if ($_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST) && !isset($_POST['mollie'])) {
            $this->handlePOST($model);
        }

        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        if (isset($_SESSION['user'])) {
            $model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
        } else if (isset($_SESSION['guest'])) {
            // uncomment to use test data
            // $_SESSION['guest']->cart = serialize((new CartService())->getCart(1));
            $model = unserialize($_SESSION['guest']->cart);
        }

        $this->addPaymentTotals($model);

        if (isset($_POST['mollie'])) {
            $this->handleMollie($model);
        }

        $this->displayView($model);
    }

    private function handlePOST(&$model) {
        // filter POST
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_POST['editYummyId']) && isset($_POST['editYummyNrOfAdults']) && isset($_POST['editYummyNrOfKids']) && isset($_POST['editYummyDatetime'])) {
            $reservationId = $_POST['editYummyId'];
            $nrOfAdults = $_POST['editYummyNrOfAdults'];
            $nrOfKids = $_POST['editYummyNrOfKids'];
            $datetime = date_format(DateTime::createFromFormat('Y-m-d\TH:i', $_POST['editYummyDatetime']), 'Y-m-d H:i:s');
            $this->cartService->updateReservation($reservationId, $nrOfAdults, $nrOfKids, $datetime);
        } else if (isset($_POST['editDanceId']) && isset($_POST['editDanceNrOfPeople'])) {
            $ticketDanceId = $_POST['editDanceId'];
            $nrOfPeople = $_POST['editDanceNrOfPeople'];
            $this->cartService->updateTicketDance($ticketDanceId, $nrOfPeople);
        } else if (isset($_POST['editHistoryId']) && isset($_POST['editHistoryNrOfPeople'])) {
            $ticketHistoryId = $_POST['editHistoryId'];
            $nrOfPeople = $_POST['editHistoryNrOfPeople'];
            $this->cartService->updateTicketHistory($ticketHistoryId, $nrOfPeople);
        } else if (isset($_POST['deleteItemId'])) {
            $itemId = $_POST['deleteItemId'];
            $this->cartService->deleteItem($itemId);
        }
    }

    private function handleMollie(&$model) {
        include __DIR__ . '/../config/dbconfig.php';
        require_once __DIR__ . "/../vendor/autoload.php";
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($mollieAPIKey);

        $orderId = count($model['reservations'] ?? []) > 0 ? $model['reservations'][0]->getItemId() : (count($model['ticketsDance'] ?? []) > 0 ? $model['ticketsDance'][0]->getItemId() : (count($model['ticketsHistory'] ?? []) > 0 ? $model['ticketsHistory'][0]->getItemId() : null));
        $description = (count($model['reservations'] ?? []) > 0 ? count($model['reservations']) . "x Yummy! " : "") . (count($model['ticketsDance'] ?? []) > 0 ? count($model['ticketsDance']) . "x DANCE! " : "") . (count($model['ticketsHistory'] ?? []) > 0 ? count($model['ticketsHistory']) . "x A Stroll Through History " : "");

        if (!is_null($orderId)) {
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => number_format(($model['paymentTotals']['reservations'] ?? 0) + ($model['paymentTotals']['ticketsDance'] ?? 0) + ($model['paymentTotals']['ticketsHistory'] ?? 0), 2)
                ],
                "description" => $description,
                "cancelUrl" => "https://e886-62-131-85-104.eu.ngrok.io/cart",
                "redirectUrl" => "https://e886-62-131-85-104.eu.ngrok.io/cart",
                "webhookUrl" => "https://e886-62-131-85-104.eu.ngrok.io/molliewebhook",
                "metadata" => [
                    "orderId" => $orderId
                ]
            ]);
            header("Location: " . $payment->getCheckoutUrl(), true, 303);
        }
    }

    private function addPaymentTotals(&$model) {
        $paymentTotals = [];
        foreach ($model as $eventItems) {
            $paymentTotals += [array_keys($model, $eventItems, true)[0] => 0];
            foreach($eventItems as $eventItem) {
                $paymentTotals[array_keys($model, $eventItems, true)[0]] += $eventItem->getTotalPrice();
            }
        }
        $model += ['paymentTotals' => $paymentTotals];
    }
}
?>