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
            var_dump("peop");
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
        
            $payment = $mollie->payments->get($_POST["id"]);
            $orderId = $payment->metadata->orderId;
            
            if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks() && $this->orderService->completeOrder($orderId)) {
                header("Location: profile");
            } else {
                http_response_code(404);
                die();
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            http_response_code(404);
            die();
        }
    }
}
?>