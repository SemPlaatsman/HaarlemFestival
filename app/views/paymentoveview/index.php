<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="7" class="fs-3">PAYMENT HISTORY</th>
                </tr>
                <tr>
                    <th class="col-1" id="IdColumn">
                        <input class="form-check-input" type="radio" name="idOption" id="idOption">
                        <label class="form-check-label" for="idOption">ID</label>
                    </th>
                    <th class="col-3" id="WHenColumn">
                        <input class="form-check-input" type="radio" name="idOption" id="idOption">
                        <label class="form-check-label" for="idOption">When</label>
                    </th>
                    <th class="col-3" id="WhereColumn">
                        <input class="form-check-input" type="radio" name="idOption" id="idOption">
                        <label class="form-check-label" for="idOption">Where</label>
                    </th>
                    <th class="col-3" id="WhatColumn">
                        <input class="form-check-input" type="radio" name="idOption" id="idOption">
                        <label class="form-check-label" for="idOption">What</label>
                    </th>
                    <th class="col-3" id="Total">
                        <input class="form-check-input" type="radio" name="idOption" id="idOption">
                        <label class="form-check-label" for="idOption">Total Price</label>
                    </th>
                    <th class="col-3" id="VatColumn">
                        <input class="form-check-input" type="radio" name="idOption" id="idOption">
                        <label class="form-check-label" for="idOption">VAT</label>
                    </th>


                </tr>
            </thead>

            <body class="text-center">

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
    </div>
</div>

<!-- Modal Insert -->
<div id="insertModalOpeningHour" class="modal fade" tabindex="-1" aria-labelledby="openingHourModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert opening hours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="insertFormOpeningHour" method="post" action="/openinghour" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Restaurant name</label><br>
                        <select name="restaurant_id" id="restaurant_id">
                            <?php foreach ($model['restaurant'] as $restaurant) : ?>
                                <option value="<?= $restaurant->getId() ?>">
                                    <?= $restaurant->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day-of-week">Day of the week</label>
                        <input type="text" class="form-control" id="day-of-week-opening-hour" name="day_of_week" required>
                    </div>
                    <div class="form-group">
                        <label for="opening-time">Opening time</label>
                        <input type="time" class="form-control" id="opening-time-opening-hour" name="opening_time" step="1" required>
                    </div>
                    <div class="form-group">
                        <label for="closing-time">Closing time</label>
                        <input type="time" class="form-control" id="closing-time-opening-hour" name="closing_time" step="1" required>
                    </div>
                    <input type="hidden" name="_openingHourMethod" value="CREATE">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2" value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div id="editModal" class="modal" tabindex="-1" aria-labelledby="openingHourModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update Opening hours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editFormOpeningHour" method="post" action="/openinghour" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-opening-hour">
                    <div class="form-group">
                        <label for="day-of-week">Day of the week</label>
                        <input type="text" class="form-control" id="day-of-week-opening-hour" name="day_of_week" required>
                    </div>
                    <div class="form-group">
                        <label for="opening-time">Opening time</label>
                        <input type="time" class="form-control" id="opening-time-opening-hour" name="opening_time" step="1" required>
                    </div>
                    <div class="form-group">
                        <label for="closing-time">Closing time</label>
                        <input type="time" class="form-control" id="closing-time-opening-hour" name="closing_time" step="1" required>
                    </div>
                    <input type="hidden" name="_openingHourMethod" value="PUT">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include __DIR__ . '/../footer.php';
?>