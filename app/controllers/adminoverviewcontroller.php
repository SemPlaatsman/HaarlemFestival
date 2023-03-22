<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/venueservice.php';
require_once __DIR__ . '/../services/eventservice.php';
require_once __DIR__ . '/../services/artistservice.php';
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../services/openinghourservice.php';
require_once __DIR__ . '/../services/restaurantservice.php';

class AdminOverviewController extends Controller
{
    private $venueService;
    private $eventService;
    private $artistService;
    private $userService;
    private $openingHourService;
    private $restaurantservice;

    function __construct()
    {
        $this->eventService = new EventService();
        $this->venueService = new VenueService();
        $this->artistService = new ArtistService();
        $this->userService = new UserService();
        $this->openingHourService = new OpeningHourService();
        $this->restaurantservice = new RestaurantService();
    }

    public function index()
    {
        try {
            $event = $this->eventService->getEvent();
            $venue = $this->venueService->getVenue();
            $artist = $this->artistService->getArtists();
            $user = $this->userService->getUser();
            $openingHour = $this->openingHourService->getOpeningHour();
            $restaurant = $this->restaurantservice->getRestaurants();
            $data = [
                'venue' => $venue,
                'event' => $event,
                'artist' => $artist,
                'user' => $user,
                'openinghour' => $openingHour,
                'restaurant' => $restaurant,
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>