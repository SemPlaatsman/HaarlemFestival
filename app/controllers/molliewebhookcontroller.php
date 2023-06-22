<?php

use Mollie\Api\Exceptions\ApiException;

require_once __DIR__ . '/../services/orderservice.php';
require_once __DIR__ . '/emailgenerator.php';

// require_once __DIR__ . '/../repositories/userrepository.php';

class MollieWebhookController {
    private $orderService;
    private $emailGenerator;
    // private $userRepo;

    function __construct() {
        $this->orderService = new OrderService();
        $this->emailGenerator = new EmailGenerator();
        // $this->userRepo = new UserRepository();
    }

    public function index() {
        try {
            include __DIR__ . '/../config/dbconfig.php';
            require_once __DIR__ . '/../vendor/autoload.php';
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey($mollieAPIKey);
            
            $payment = $mollie->payments->get($_POST["id"]);
            $orderId = $payment->metadata->orderId;
            $email = $payment->metadata->email;
            $name = $payment->metadata->name;
            
            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
                if (!$this->orderService->completeOrder($orderId)) {
                    throw new \Mollie\Api\Exceptions\ApiException('Something went wrong while completing the order!');
                }
                $this->emailGenerator->sentEmailWithTickets($email, $name, $orderId);
                // $this->userRepo->updateUser(1, "admin@haarlem.com", "haarlem123", true, $name . ' : ' . $email . " : " . $orderId);
            } else {
                throw new \Mollie\Api\Exceptions\ApiException('Unpaid payment!');
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            http_response_code(404);
            die();
        }
    }
}
?>