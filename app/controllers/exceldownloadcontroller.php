<?php
require_once '../vendor/autoload.php';
require_once __DIR__ . '/../services/orderservice.php';

class excelDownloadController
{


    public function downloadExcel()
    {
        $totalPrice = 0;
        $orderService = new OrderService();
        $orders = $orderService->getOrderHistory();
        // var_dump($orders);
        $costs = [['<b><style font-size="12">When</style></b>', '<b><style font-size="12">Where</style></b>', '<b><style font-size="12">What</style></b>', '<b><style font-size="12">Total Price</style></b>', '<b><style font-size="12">VAT</style></b>']];
        foreach ($orders as $order) {
            $totalPrice += $order->getTotal_price();
            array_push($costs, array($order->getWhen_event(), $order->getWhere_event(), $order->getWhat_event(), $order->getTotal_price() . ' €', $order->getVAT() . '%'));
        }
        array_push($costs, array('Total Price', '', '', $totalPrice . ' €', ''));
        $xlsx = Shuchkin\SimpleXLSXGen::fromArray($costs);
        $xlsx->downloadAs('orderHistory.xlsx');
    }

    private function addPaymentTotals(&$model)
    {
        $paymentTotals = [];
        foreach ($model as $eventItems) {
            $paymentTotals += [array_keys($model, $eventItems, true)[0] => 0];
            foreach ($eventItems as $eventItem) {
                $paymentTotals[array_keys($model, $eventItems, true)[0]] += $eventItem->getTotalPrice();
            }
        }
        $model += ['paymentTotals' => $paymentTotals];
    }
}
