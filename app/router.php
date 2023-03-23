<?php
class router
{
    public function route($uri)
    {
        $uri = $this->stripParameters($uri);

        (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
        switch ($uri) {
            case '':
            case 'login':
                require_once __DIR__ . '/controllers/logincontroller.php';
                $controller = new LoginController();
                $controller->index();
                break;

            case 'logout':
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;

            case 'home':
                require_once __DIR__ . '/controllers/homecontroller.php';
                $controller = new HomeController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index();
                }
                break;

            case 'cart':
                require_once __DIR__ . '/controllers/cartcontroller.php';
                $controller = new CartController();
                $controller->index();
                break;

            case 'adminoverview':
                require_once __DIR__ . '/controllers/adminoverviewcontroller.php';
                $controller = new AdminOverviewController();
                $controller->index();
                break;

            case 'venue':
                require_once __DIR__ . '/controllers/venuecontroller.php';
                $controller = new VenueController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['_venueMethod']) && $_POST['_venueMethod'] === 'PUT') {
                        $controller->updateVenue();
                    } else if (isset($_POST['_venueMethod']) && $_POST['_venueMethod'] === 'DELETE') {
                        $controller->deleteVenue();
                    } else if (isset($_POST['_venueMethod']) && $_POST['_venueMethod'] === 'CREATE') {
                        $controller->insertVenue();
                    }
                } else {
                    $controller->index();
                }
                break;

            case 'event':
                require_once __DIR__ . '/controllers/eventcontroller.php';
                $controller = new EventController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['_eventMethod']) && $_POST['_eventMethod'] === 'PUT') {
                        $controller->updateEvent();
                    } else if (isset($_POST['_eventMethod']) && $_POST['_eventMethod'] === 'DELETE') {
                        $controller->deleteEvent();
                    } else if (isset($_POST['_eventMethod']) && $_POST['_eventMethod'] === 'CREATE') {
                        $controller->insertEvent();
                    }
                } else {
                    $controller->index();
                }
                break;

            case 'artist':
                require_once __DIR__ . '/controllers/artistcontroller.php';
                $controller = new ArtistController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['_artistMethod']) && $_POST['_artistMethod'] === 'PUT') {
                        $controller->updateArtist();
                    } else if (isset($_POST['_artistMethod']) && $_POST['_artistMethod'] === 'DELETE') {
                        $controller->deleteArtist();
                    } else if (isset($_POST['_artistMethod']) && $_POST['_artistMethod'] === 'CREATE') {
                        $controller->insertArtist();
                    }
                } else {
                    $controller->index();
                }
                break;

            case 'user':
                require_once __DIR__ . '/controllers/usercontroller.php';
                $controller = new UserController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['_userMethod']) && $_POST['_userMethod'] === 'PUT') {
                        $controller->updateUser();
                    } else if (isset($_POST['_userMethod']) && $_POST['_userMethod'] === 'DELETE') {
                        $controller->deleteUser();
                    } else if (isset($_POST['_userMethod']) && $_POST['_userMethod'] === 'CREATE') {
                        $controller->insertUser();
                    }
                } else {
                    $controller->index();
                }
                break;

            case 'captcha':
                require_once __DIR__ . '/controllers/captchacontroller.php';
                $controller = new captchacontroller();
                $controller->index();
                break;

            case 'validate/Hcaptcha':
                require_once __DIR__ . '/controllers/validatecontroller.php';
                $controller = new validateController();
                $controller->Hcaptcha();
                break;

            case 'validate/Gcaptcha':
                require_once __DIR__ . '/controllers/validatecontroller.php';
                $controller = new validateController();
                $controller->Gcaptcha();
                break;

            case 'qr':
                require_once __DIR__ . '/controllers/QrGeneratorScanner.php';
                $controller = new QrGeneratorScanner();
                break;

            case 'qr/generate':
                require_once __DIR__ . '/controllers/QrGeneratorcontroller.php';
                $controller = new QrGeneratorcontroller();
                $controller->generateQR();

            case 'pdf':
                require __DIR__ . '/controllers/pdfcontroller.php';
                $controller = new pdfcontroller();
                break;

            case 'api':
                // require __DIR__ . '/apiControllers/apiController.php';
                // $api = new api();
                // break;

            case 'history':
                require_once __DIR__ . '/controllers/historycontroller.php';
                $controller = new HistoryController();

                $controller->index();
                break;
            case 'history/schedule':
                require_once __DIR__ . '/controllers/historycontroller.php';
                $controller = new HistoryController();
                // print_r($_POST['language']);

                if (isset($_POST['language'])) {
                    $controller->getSchedule($_POST['language']);
                } else {
                    http_response_code(404);
                    echo "404 Not Found";
                }

                break;
            case 'history/StBravo':
            case 'history/GroteMarkt':
            case 'history/DeHallen':
            case 'history/Proveniershof':
            case 'history/JopenKerk':
            case 'history/WaalseKerk':
            case 'history/MolenAdriaan':
            case 'history/AmsterdamPoort':
            case 'history/HofBakenes':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                $controller->index("Stbravo");
                break;

            case '401':
                http_response_code(401);
                break;

            case '403':
                http_response_code(403);
                echo "403 Forbidden";
                break;

            default:
                http_response_code(404);
                echo "404 Not Found";
                break;
        }
    }
    private function stripParameters($uri)
    {
        // if(str_contains($uri, '?')) {
        //     $uri = substr($uri, 0, strpos($uri, '?'));
        // }

        if (strpos($uri, '?') !== false) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
}
