<?php
    class router{
        public function route($uri)
        {
            $uri = $this->stripParameters($uri);

            switch($uri) {
                case '':
                case 'login':
                    require_once __DIR__ . '/controllers/logincontroller.php';
                    $controller = new LoginController();
                    $controller->index();
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
        
                case 'captcha': 
                    require_once __DIR__.'/private/controllers/captchacontroller.php';
                    $controller = new captchacontroller();
                    $controller->index();
                    break;

                case 'validate/Hcaptcha':
                    require_once __DIR__.'/private/controllers/validatecontroller.php';
                    $controller = new validateController();
                    $controller->Hcaptcha();
                    break;

                case 'validate/Gcaptcha':
                    require_once __DIR__.'/private/controllers/validatecontroller.php';
                    $controller = new validateController();
                    $controller->Gcaptcha();
                    break;

                 case 'qr':
                    require_once __DIR__. '/private/controllers/QrGeneratorScanner.php';
                    $controller = new QrGeneratorScanner();
                    break;

                case 'qr/generate':
                    require_once __DIR__.'/private/controllers/QrGeneratorcontroller.php';
                    $controller = new QrGeneratorcontroller();
                    $controller->generateQR();

                case 'pdf':
                    require_once __DIR__.'/private/controllers/pdfcontroller.php';
                    $controller = new pdfcontroller();
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
        private function stripParameters($uri) {
            // if(str_contains($uri, '?')) {
            //     $uri = substr($uri, 0, strpos($uri, '?'));
            // }
            
            if(strpos($uri, '?') !== false) {
                $uri = substr($uri, 0, strpos($uri, '?'));
            }
            return $uri;
        }
    }

