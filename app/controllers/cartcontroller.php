<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../services/cartservice.php';

class CartController extends Controller {
    private $cartService;

    function __construct() {
        $this->cartService = new CartService();
    }

    public function index() {
        $model = [];
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST)) {
            $this->handlePOST($model);
        }

        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        $model = $this->cartService->getCart(unserialize($_SESSION['user'])->getId());
        $this->displayView($model);
    }

    private function handlePOST(&$model) {
        // filter POST
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_POST['editId']) && isset($_POST['editNrOfAdults']) && isset($_POST['editNrOfKids']) && isset($_POST['editDatetime'])) {
            $reservationId = $_POST['editId'];
            $nrOfAdults = $_POST['editNrOfAdults'];
            $nrOfKids = $_POST['editNrOfKids'];
            $datetime = date_format(DateTime::createFromFormat('Y-m-d\TH:i', $_POST['editDatetime']), 'Y-m-d H:i:s');
            $this->cartService->updateReservation($reservationId, $nrOfAdults, $nrOfKids, $datetime);
        }
    }
}
?>