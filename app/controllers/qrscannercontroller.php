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

    function __construct()
    {
        $this->reservationService = new ReservationService();
        $this->ticketDanceService = new TicketDanceService();
        $this->ticketHistoryService = new TicketHistoryService();
    }

    public function index()
    {
        $this->checkQRCode("test4");
        $this->displayView();

    }

    function checkQRCode(string $QR_Code){
        $reservation = $this->reservationService->getReservationForQR($QR_Code);
        $ticketDance = $this->ticketDanceService->getTicketDanceForQR($QR_Code);
        $ticketHistory = $this->ticketHistoryService->getTicketHistoryForQR($QR_Code);
        if(is_null($reservation)){
            echo("test1");
        }
        if(is_null($ticketDance)){
            echo("test2");
        }
        if(is_null($ticketHistory)){
            echo("test3");
        }
    }
}
?>