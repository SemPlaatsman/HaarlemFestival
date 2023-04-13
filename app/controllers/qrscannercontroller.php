<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/ticketdanceservice.php';
require_once __DIR__ . '/../services/tickethistoryservice.php';

class QrScannerController extends Controller
{
    private $reservationService;
    private $ticketDanceService;    
    private $ticketHistoryService;
    public $item;

    function __construct()
    {
        $this->reservationService = new ReservationService();
        $this->ticketDanceService = new TicketDanceService();
        $this->ticketHistoryService = new TicketHistoryService();
        $this->item = null;
    }

    public function index()
    {

        if (isset($_POST['output'])) {
            $data = json_decode($_POST['output'], true);
            echo("test");
            if (preg_match('/\] (.*?)$/', $data, $matches)) {
                $data = $matches[1];
                //echo $data;
              }
    
            // Send a response back to the client
        }
        if (isset($_POST['output'])) {
            $data = $_POST['output'];
            
            if (preg_match('/\] (.*?)$/', $data, $matches)) {
                $data = $matches[1];
                echo $data;
              }
            //echo $data;
            //($qrCode);
            $this->checkQRCode($data);
        }
        $this->displayView();

    }

    function checkQRCode(string $QR_Code){
        $reservation = $this->reservationService->getReservationForQR($QR_Code);
        $ticketDance = $this->ticketDanceService->getTicketDanceForQR($QR_Code);
        $ticketHistory = $this->ticketHistoryService->getTicketHistoryForQR($QR_Code);
        if(!is_null($reservation)){
            $this->item = $reservation;
        }
        else if(!is_null($ticketDance)){
            $this->item = $ticketDance;
        }
        else if(!is_null($ticketHistory)){
            $this->item = $ticketHistory;
        }
    }
}
?>