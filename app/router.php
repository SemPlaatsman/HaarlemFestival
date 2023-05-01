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

            case 'molliewebhook':
                require_once __DIR__ . '/controllers/molliewebhookcontroller.php';
                $controller = new MollieWebhookController();
                $controller->index();
                break;

            case 'adminoverview':
                require_once __DIR__ . '/controllers/adminoverviewcontroller.php';
                $controller = new AdminOverviewController();
                if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                    $controller->index();
                } else {
                    http_response_code(404);
                    echo "404 Not Found";
                }
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
                    if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                        $controller->index();
                    } else {
                        http_response_code(404);
                        echo "404 Not Found";
                    }
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
                    if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                        $controller->index();
                    } else {
                        http_response_code(404);
                        echo "404 Not Found";
                    }
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
                    if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                        $controller->index();
                    } else {
                        http_response_code(404);
                        echo "404 Not Found";
                    }
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
                    if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                        $controller->index();
                    } else {
                        http_response_code(404);
                        echo "404 Not Found";
                    }
                }
                break;

            case 'openinghour':
                require_once __DIR__ . '/controllers/openinghourcontroller.php';
                $controller = new OpeningHourController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['_openingHourMethod']) && $_POST['_openingHourMethod'] === 'PUT') {
                        $controller->updateOpeningHour();
                    } else if (isset($_POST['_openingHourMethod']) && $_POST['_openingHourMethod'] === 'DELETE') {
                        $controller->deleteOpeningHour();
                    } else if (isset($_POST['_openingHourMethod']) && $_POST['_openingHourMethod'] === 'CREATE') {
                        $controller->insertOpeningHour();
                    }
                } else {
                    if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                        $controller->index();
                    } else {
                        http_response_code(404);
                        echo "404 Not Found";
                    }
                }
                break;

            case 'restaurant':
                require_once __DIR__ . '/controllers/restaurantcontroller.php';
                $controller = new RestaurantController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['_restaurantMethod']) && $_POST['_restaurantMethod'] === 'PUT') {
                        $controller->updateRestaurant();
                    } else if (isset($_POST['_restaurantMethod']) && $_POST['_restaurantMethod'] === 'DELETE') {
                        $controller->deleteRestaurant();
                    } else if (isset($_POST['_restaurantMethod']) && $_POST['_restaurantMethod'] === 'CREATE') {
                        $controller->insertRestaurant();
                    }
                } else {
                    if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                        $controller->index();
                    } else {
                        http_response_code(404);
                        echo "404 Not Found";
                    }
                }
                break;

            case 'reservation':
                require_once __DIR__ . '/controllers/reservationcontroller.php';
                $controller = new ReservationController();
                if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) {
                    $controller->index();
                } else {
                    http_response_code(404);
                    echo "404 Not Found";
                }
                break;
            case 'paymentOveview'   :
                require_once __DIR__ . '/controllers/paymentOveviewController.php';
                $controller = new PaymentOveviewController();
                $controller->index();
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

            // case 'validate/Gcaptcha':
            //     require_once __DIR__ . '/controllers/validatecontroller.php';
            //     $controller = new validateController();
            //     $controller->Gcaptcha();
            //     break;

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


            case 'download/income':
                require __DIR__ . '/controllers/exceldownloadcontroller.php';
                $controller = new excelDownloadController();
                $controller->downloadExcel();
                break;

            case 'api':
            // require __DIR__ . '/apiControllers/apiController.php';
            // $api = new api();
            // break;

            case 'dance':
                require_once __DIR__ . '/controllers/dancecontroller.php';
                $controller = new DanceController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index();
                }
                break;

            case 'history':
                require_once __DIR__ . '/controllers/historycontroller.php';
                $controller = new HistoryController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index();
                }
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

            case 'forgotpassword':
                require_once __DIR__ . '/controllers/forgotpasswordcontroller.php';
                $controller = new ForgotPasswordController();
                $controller->index();
                break;

            case 'resetpassword':
                require_once __DIR__ . '/controllers/resetpasswordcontroller.php';
                $controller = new ResetPasswordController();
                $controller->index();
                break;

            case 'registration':
                require_once __DIR__ . '/controllers/registrationcontroller.php';
                $controller = new RegistrationController();
                $controller->index();

                break;
            case 'history/StBravo':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("StBravo");
                }
                break;
            case 'history/GroteMarkt':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("GroteMarkt");
                }
                break;
            case 'history/DeHallen':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("DeHallen");
                }
                break;
            case 'history/ProveniersHof':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("Proveniershof");
                }
                break;
            case 'history/JopenKerk':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("Jopenkerk");
                }
                break;
            case 'history/WaalseKerk':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("WaalseKerk");
                }
                break;
            case 'history/MolenAdriaan':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("MolenAdriaan");
                }
                break;
            case 'history/AmsterdamPoort':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("AmsterdamPoort");
                }
                break;
            case 'history/HofBakenes':
                require_once __DIR__ . '/controllers/historydetailcontroller.php';
                $controller = new HistoryDetailController();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $controller->updateContent();
                } else {
                    $controller->index("HofBakenes");
                }
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