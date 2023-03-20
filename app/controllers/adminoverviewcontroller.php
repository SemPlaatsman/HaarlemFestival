<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/venueservice.php';
require_once __DIR__ . '/../services/eventservice.php';
require_once __DIR__ . '/../services/artistservice.php';
require_once __DIR__ . '/../services/userservice.php';

class AdminOverviewController extends Controller
{
    private $venueService;
    private $eventService;
    private $artistservice;
    private $userservice;

    function __construct()
    {
        $this->eventService = new EventService();
        $this->venueService = new VenueService();
        $this->artistservice = new ArtistService();
        $this->userservice = new UserService();
    }

    public function index()
    {
        try {
            $event = $this->eventService->getEvent();
            $venue = $this->venueService->getVenue();
            $artist = $this->artistservice->getArtists();
            $user = $this->userservice->getUser();
            $data = [
                'venue' => $venue,
                'event' => $event,
                'artist' => $artist,
                'user' => $user
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>