<?php

use Shuchkin\SimpleXLSXGen;

require_once '../vendor/autoload.php';
require_once __DIR__ . '/../services/orderservice.php';

class excelDownloadController
{


    public function downloadExcel(array $columns)
    {


        $totalPrice = 0;
        $orderService = new OrderService();
        $orders = $orderService->getOrderHistory();

        $costs = [];

        $header = [];



        foreach ($orders as $order) {

            $fields  = array();

            foreach ($columns as $column) {

                switch ($column) {
                    case 'id':
                        array_push($fields, $order->getId());
                        if (!in_array('<b><style font-size="12">ID</style></b>', $header)) {
                            array_push($header, '<b><style font-size="12">ID</style></b>');
                            
                        }
                        break;
                    case 'date':
                        array_push($fields, $order->getWhen_event());
                        if (!in_array('<b><style font-size="12">When</style></b>', $header)) {
                            array_push($header, '<b><style font-size="12">When</style></b>');
                            
                        }
                        break;
                    case 'location':
                        array_push($fields, $order->getWhere_event());
                        if (!in_array('<b><style font-size="12">Where</style></b>', $header)) {
                            array_push($header,'<b><style font-size="12">Where</style></b>');
                            

                        }
                        break;
                    case 'product':
                        array_push($fields, $order->getWhat_event());
                        if (!in_array('<b><style font-size="12">What</style></b>', $header)) {
                            array_push($header, '<b><style font-size="12">What</style></b>');
                            

                        }
                        break;
                    case 'total':
                        array_push($fields, $order->getTotal_price());
                        $totalPrice += $order->getTotal_price();
                        if (!in_array('<b><style font-size="12">Total Price</style></b>', $header)) {
                            array_push($header,'<b><style font-size="12">Total Price</style></b>');
                            

                        }
                        break;
                    case 'vat':
                        array_push($fields, $order->getVAT());
                        if (!in_array('<b><style font-size="12">VAT</style></b>', $header)) {
                            array_push($header,'<b><style font-size="12">VAT</style></b>');
                            

                        }
                        break;
                }
            }

            array_push($costs, $fields);
        }

        array_unshift($costs, $header);
        array_push($costs, array('Total Price', '', '', $totalPrice . ' €', ''));
        $xlsx = SimpleXLSXGen::fromArray($costs);
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
