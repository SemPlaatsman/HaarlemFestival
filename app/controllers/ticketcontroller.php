<?

//controller class for adding tickes to the database and cart table
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/cartservice.php';
class TicketController extends controller {
    private $cartService;
    public function __construct() {
        $this->cartService = new CartService();
    }  
    public function displayForm() {
         
    }

    public function addDanceTicketToCart(){
        $_POST['userId'] = 1;

        $cartService = $this->cartService->addToCart();

    }
    public function addReservationToCart(){
        $_POST['userId'] = 1;

        $cartService = $this->cartService->addToCart();

    }
    public function addHistoryTicketToCart(){
        $_POST['startingLocation'];
        $_POST['Language'];
        $_POST['Date'];
        $_POST['singleTicketAmount'];
        $_POST['groupTicketAmount'];
        $_POST['userId'] = 1;
        $ticket = new TicketHistory($_POST['startingLocation'], $_POST['Language'], $_POST['Date'], $_POST['singleTicketAmount'], $_POST['groupTicketAmount']);
        $cartService = $this->cartService->addToCart();

    }

    
}