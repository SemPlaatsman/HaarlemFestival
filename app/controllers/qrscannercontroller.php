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
        $this->makeHtml();
        //echo json_encode($this->item);
    }

    function makeHtml(){
    if ($this->item instanceof Reservation) {
        ?>
        <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="9" class="fs-3">Reservation</th>
                </tr>
                <tr>
                    <th class="col-2">Restaurant</th>
                    <th class="col-1">Nr of adults</th>
                    <th class="col-1">Nr of kids</th>
                    <th class="col-2">Datetime</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <td class="align-middle">
                    <?= $this->item->getRestaurant()->getName() ?>
                </td>
                <td class="align-middle">
                    <?= $this->item->getNrOfAdults() ?>
                </td>
                <td class="align-middle">
                    <?= $this->item->getNrOfKids() ?>
                </td>
                <td class="align-middle">
                    <?= $this->item->getDatetimeFormatted() ?>
                </td>
            </tr>
        </table>
        <?php }
            if($this->item instanceof TicketDance){ ?>
                <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="fs-3">Ticke DANCE!</th>
                        </tr>
                        <tr>
                            <th class="col-2">Venue</th>
                            <th class="col-1">Artist</th>
                            <th class="col-1">Start</th>
                            <th class="col-1">End</th>
                            <th class="col-1">Nr of People</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getVenue()->getName() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getArtist()->getName() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getStartDateFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getEndDateFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getNrOfPeople() ?>
                        </td>
                    </tr>
                </table>
                <?php } ?>
            
                <?php if($this->item instanceof TicketHistory){ ?>
                <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="fs-3">Reservation</th>
                        </tr>
                        <tr>
                            <th class="col-2">Restaurant</th>
                            <th class="col-1">Language</th>
                            <th class="col-1">Datetime</th>
                            <th class="col-2">Nr Of People</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <td class="align-middle">
                            <?= $this->item->getTour()->getGatheringLocation() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getTour()->getLanguage() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getTour()->getDatetimeFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getNrOfPeople() ?>
                        </td>
                    </tr>
                </table>
                <?php }
    }
}
?>