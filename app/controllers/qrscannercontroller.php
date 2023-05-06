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
        require_once __DIR__ . '/../views/qr/displayticket.php';
    }
}
?>