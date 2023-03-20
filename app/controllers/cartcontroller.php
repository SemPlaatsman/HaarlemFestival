<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/cartservice.php';
require_once __DIR__ . '/../services/guestcartservice.php';

class CartController extends Controller {
    private $cartService;

    function __construct() {
        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        $this->cartService = isset($_SESSION['user']) ? new CartService() : new GuestCartService($_SESSION['guest']->cart);
    }

    public function index() {
        $model = [];
        
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST)) {
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
}
?>