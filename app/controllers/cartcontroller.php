<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/guestcartservice.php';
require_once __DIR__ . '/../vendor/mollie/mollie-api-php/src/MollieApiClient.php';

class CartController extends Controller {
    private $cartService;

    function __construct() {
        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        $this->cartService = isset($_SESSION['user']) ? new CartService() : new GuestCartService($_SESSION['guest']->cart);
    }

    public function index() {
        $model = [];

        if ($_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST) && !isset($_POST['mollie'])) {
            $this->handlePOST($model);
        }

        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        if ($_SERVER["REQUEST_METHOD"] === 'GET' && isset($_GET['cart'])) {
            var_dump($_GET['cart']);
            $this->decodeCartLink($model, $_GET['cart']);
            var_dump($model['reservations']);
        } else if (isset($_SESSION['user'])) {
            $model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
        } else if (isset($_SESSION['guest'])) {
            // uncomment to use test data
            // $_SESSION['guest']->cart = serialize((new CartService())->getCart(1));
            $model = unserialize($_SESSION['guest']->cart);
        }

        $this->addPaymentTotals($model);
        $this->addCartLink($model);

        if (isset($_POST['mollie'])) {
            $this->handleMollie($model);
        }

        // $var = $model['reservations'][0];
        // var_dump($model['reservations'][0]);

        // $var = str_replace('(', '', $var);
        // $array = explode(')', $var);
        // array_pop($array);
        // var_dump($array);

        // $array = explode(', ', $var);
        // var_dump($array);
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
                "cancelUrl" => "https://0376-145-81-195-218.eu.ngrok.io/cart",
                "redirectUrl" => "https://0376-145-81-195-218.eu.ngrok.io/cart",
                "webhookUrl" => "https://0376-145-81-195-218.eu.ngrok.io/molliewebhook",
                "metadata" => [
                    "orderId" => $orderId
                ]
            ]);
            header("Location: " . $payment->getCheckoutUrl(), true, 303);
        }
    }

    private function addCartLink(&$model) {
        $cartLink = "";
        foreach ($model as $eventItems) if (count($eventItems) > 0 && array_keys($model, $eventItems, true)[0] !== 'paymentTotals') {
            // $cartLink .= array_keys($model, $eventItems, true)[0];
            foreach ($eventItems as $eventItem) {
                $cartLink .= "(" . $eventItem->getLink() . ")";
            }
        }
        $model += ['link' => $cartLink];
    }

    private function decodeCartLink(&$model, string $link) {
        $model += ['reservations' => []];
        $model += ['ticketsDance' => []];
        $model += ['ticketsHistory' => []];
        $linkEventItemsString = str_replace('(', '', $link);
        $linkEventItems = explode(')', $linkEventItemsString);
        array_pop($linkEventItems);
        foreach ($linkEventItems as $linkEventItem) {
            try {
                $linkEventItemArray = explode(';', $linkEventItem);
                var_dump($linkEventItemArray);
                switch (end($linkEventItemArray)) {
                    case 1: if (count($linkEventItemArray) == 5) {
                        $restaurant = new Reservation(null, null, $linkEventItemArray[4], null, null, 9, "QR_Code", null, $this->cartService->getRestaurant($linkEventItemArray[0]), null, intval($linkEventItemArray[1]), intval($linkEventItemArray[2]), $linkEventItemArray[3]);
                        $restaurant->setTotalPrice();
                        $restaurant->setFinalCheck();
                        $model['reservations'][] = $restaurant;
                        } break;
                    case 2: if (count($linkEventItemArray) == 3) {
    
                        } break;
                    case 3: if (count($linkEventItemArray) == 3) {
    
                        } break;
                }
            } catch (Exception $e) {
                continue;
            }
            
        }
    }

    // private function decodeCartLink(&$model, string $link) {
    //     $model += ['reservations' => []];
    //     $model += ['ticketsDance' => []];
    //     $model += ['ticketsHistory' => []];
    //     $splitLink = preg_split('/(reservations|ticketsDance|ticketsHistory)/', $link, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    //     foreach ($model as $key => $eventItems) {
    //         $linkIndex = array_search($key, $splitLink);
    //         if (!is_bool($linkIndex)) {
    //             $linkEventItemsString = str_replace('(', '', $splitLink[$linkIndex + 1]);
    //             $linkEventItems = explode(')', $linkEventItemsString);
    //             array_pop($linkEventItems);
    //             foreach ($linkEventItems as $linkEventItem) {
    //                 $linkEventItemArray = explode('; ', $linkEventItem);
    //                 switch ($key) {
    //                     case 'reservations':
    //                         require_once __DIR__ . '/../models/reservation.php';
    //                         require_once __DIR__ . '/../models/restaurant.php';
    //                         $model[$key][] = new Reservation(intval($linkEventItemArray[12]), intval($linkEventItemArray[13]), intval($linkEventItemArray[14]), $linkEventItemArray[15], floatval($linkEventItemArray[16]), 
    //                         intval($linkEventItemArray[17]), $linkEventItemArray[18], intval($linkEventItemArray[0]), new Restaurant(intval($linkEventItemArray[1]), $linkEventItemArray[2], intval($linkEventItemArray[3]),
    //                         $linkEventItemArray[4], floatval($linkEventItemArray[5]), floatval($linkEventItemArray[6]), floatval($linkEventItemArray[7])), intval($linkEventItemArray[8]), intval($linkEventItemArray[9]), 
    //                         intval($linkEventItemArray[10]), intval($linkEventItemArray[11]));
    //                         break;
    //                     case 'ticketsDance':
    //                         require_once __DIR__ . '/../models/ticketdance.php';
    //                         $model[$key][] = new TicketDance();
    //                         break;
    //                     case 'ticketsHistory':
    //                         require_once __DIR__ . '/../models/tickethistory.php';
    //                         $model[$key][] = new TicketHistory();
    //                         break;
    //                 }
    //             }
    //         }
    //     }
    // }

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