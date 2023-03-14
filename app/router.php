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
                unset($_SESSION['user']);
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
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Check if this is an update request
                    if (isset($_POST['_venueMethod']) && $_POST['_venueMethod'] === 'PUT') {
                        $controller->updateVenue();
                    } else if (isset($_POST['_venueMethod']) && $_POST['_venueMethod'] === 'DELETE') {
                        $controller->deleteVenue();
                    } else if (isset($_POST['_venueMethod']) && $_POST['_venueMethod'] === 'CREATE') {
                        $controller->insertVenue();
                    } else if (isset($_POST['_eventMethod']) && $_POST['_eventMethod'] === 'PUT') {
                        $controller->updateEvent();
                    } else if (isset($_POST['_eventMethod']) && $_POST['_eventMethod'] === 'DELETE') {
                        $controller->deleteEvent();
                    } else if (isset($_POST['_eventMethod']) && $_POST['_eventMethod'] === 'CREATE') {
                        $controller->insertEvent();
                    } else if (isset($_POST['_artistMethod']) && $_POST['_artistMethod'] === 'PUT') {
                        $controller->updateArtist();
                    } else if (isset($_POST['_artistMethod']) && $_POST['_artistMethod'] === 'CREATE') {
                        $controller->insertArtist();
                    } else if (isset($_POST['_artistMethod']) && $_POST['_artistMethod'] === 'DELETE') {
                        $controller->deleteArtist();
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



            case 'test':
                require __DIR__ . '/controllers/artistManagementController.php';
                $controller = new ArtistManagementController();
                $controller->index();
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

?>