<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/reservationservice.php';

class ReservationController extends Controller {
    private $reservationService;

    function __construct() {
        $this->reservationService = new ReservationService();
    }

    public function index() {
        $data = [];
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST)) {
            $this->handlePOST($model);
        }

        $reservations = $this->reservationService->getAllReservations();
        $data += [ 'reservations' => $reservations ];
        $this->displayView($data);
    }

    private function handlePOST(&$model) {
        // filter POST
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_POST['deleteId'])) {
            $id = $_POST['deleteId'];
            $this->reservationService->deleteReservation($id);
        }
    }
}

?>