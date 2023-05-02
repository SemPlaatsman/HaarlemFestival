<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center" id="SelectableColumns">
                <tr>
                    <th colspan="7" class="fs-3">ORDERS</th>
                </tr>
                <tr>
                    <th class="col-1" id="IdColumn">
                        <input class="form-check-input" type="checkbox" name="idOption" id="idOption" onclick="CheckboxListener()">
                        <label class="form-check-label" for="idOption">ID</label>
                    </th>
                    <th class="col-3" id="WHenColumn">
                        <input class="form-check-input" type="checkbox" name="WhenOption" id="WhenOption" onclick="CheckboxListener()">
                        <label class="form-check-label" for="WhenOption">When</label>
                    </th>
                    <th class="col-3" id="WhereColumn">
                        <input class="form-check-input" type="checkbox" name="WhereOption" id="WhereOption" onclick="CheckboxListener()">
                        <label class="form-check-label" for="WhereOption">Where</label>
                    </th>
                    <th class="col-3" id="WhatColumn">
                        <input class="form-check-input" type="checkbox" name="WhatOption" id="WhatOption" onclick="CheckboxListener()">
                        <label class="form-check-label" for="WhatOption">What</label>
                    </th>
                    <th class="col-3" id="Total">
                        <input class="form-check-input" type="checkbox" name="TotalOption" id="TotalOption" onclick="CheckboxListener()">
                        <label class="form-check-label" for="TotalOption">Total Price</label>
                    </th>
                    <th class="col-3" id="VatColumn">
                        <input class="form-check-input" type="checkbox" name="VatOption" id="VatOption" onclick="CheckboxListener()">
                        <label class="form-check-label" for="VatOption">VAT</label>
                    </th>
                </tr>
            </thead>

            <body class="text-center" id="table">

                <?php
                foreach ($model["orderhistory"] as $order) : ?>
                    <tr>
                        <td class="align-middle">
                            <?= $order->getId() ?>
                        </td>
                        <td class="align-middle">
                            <?= $order->getWhen_event()->format('M d H:i') ?>
                        </td>
                        <td class="align-middle">
                            <?= $order->getWhere_event() ?>
                        </td>
                        <td class="align-middle">
                            <?= $order->getWhat_event() ?>
                        </td>
                        <td class="align-middle">
                            <?= $order->getTotal_price() ?>
                        </td>
                        <td class="align-middle">
                            <?= strval($order->getVAT()) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </body>
        </table>
        <input type="button" id="download" class="btn bg-primary-b text-tetiare-a btn-lg btn-block d-none" value="DOWNLOAD EXCEL">
    </div>
</div>



<?php
include __DIR__ . '/../footer.php';
?>