<?php

use Mollie\Api\Exceptions\ApiException;

require_once __DIR__ . '/../services/orderservice.php';

class MollieWebhookController {
    private $orderService;

    function __construct() {
        $this->orderService = new OrderService();
    }

    public function index() {
        try {
            include __DIR__ . '/../config/dbconfig.php';
            require_once __DIR__ . '/../vendor/autoload.php';
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey($mollieAPIKey);
        
            $payment = $mollie->payments->get($_POST["id"]);
            $orderId = $payment->metadata->orderId;
            
            if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {
                if (!$this->orderService->completeOrder($orderId)) {
                    throw new \Mollie\Api\Exceptions\ApiException('Something went wrong while completing the order!');
                }
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