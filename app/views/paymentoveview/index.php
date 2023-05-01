<?php
include __DIR__ . '/../header.php';
?>
<header class="d-flex justify-content-center py-3 bg-primary-b fs-5">
    <ul class="nav nav-pills fw-bold">
        <li><a href="/adminoverview" class="second-header nav-item nav-link text-tetiare-a bg-tetiare-a mx-0 mx-xxl-5"
                aria-current="page">OVERVIEW</a>
        </li>
        <li><a href="/venue" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">VENUES</a></li>
        <li><a href="/event" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">EVENTS</a></li>
        <li><a href="/artist" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">ARTISTS</a></li>
        <li><a href="/user" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">USERS</a></li>
        <li><a href="/openinghour" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">OPENING
                HOURS</a></li>
        <li><a href="/restaurant" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">RESTAURANTS</a>
        </li>
        <li><a href="/reservation" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">RESERVATIONS</a></li>
        <li><a href="" class="bg-light nav-item nav-link text-primary-b mx-0 mx-xxl-5">PAYMENT HISTORY</a></li>

    </ul>
</header>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="7" class="fs-3">PAYMENT HISTORY</th>
                </tr>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-3">When</th>
                    <th class="col-3">Where</th>
                    <th class="col-3">What</th>
                    <th class="col-3">Total Price</th>
                    <th class="col-3">VAT</th>

                
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($model['openinghour'] as $order): ?>
                    <tr>

                     
                    </tr>
                <?php endforeach; ?>
               
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert Opening hour -->
<div id="insertModalOpeningHour" class="modal fade" tabindex="-1" aria-labelledby="openingHourModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert opening hours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="insertFormOpeningHour" method="post" action="/openinghour" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Restaurant name</label><br>
                        <select name="restaurant_id" id="restaurant_id">
                            <?php foreach ($model['restaurant'] as $restaurant): ?>
                                <option value="<?= $restaurant->getId() ?>">
                                    <?= $restaurant->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day-of-week">Day of the week</label>
                        <input type="text" class="form-control" id="day-of-week-opening-hour" name="day_of_week"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="opening-time">Opening time</label>
                        <input type="time" class="form-control" id="opening-time-opening-hour" name="opening_time"
                            step="1" required>
                    </div>
                    <div class="form-group">
                        <label for="closing-time">Closing time</label>
                        <input type="time" class="form-control" id="closing-time-opening-hour" name="closing_time"
                            step="1" required>
                    </div>
                    <input type="hidden" name="_openingHourMethod" value="CREATE">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Opening hour -->
<div id="editModalOpeningHour" class="modal" tabindex="-1" aria-labelledby="openingHourModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update Opening hours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="editFormOpeningHour" method="post" action="/openinghour" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-opening-hour">
                    <div class="form-group">
                        <label for="day-of-week">Day of the week</label>
                        <input type="text" class="form-control" id="day-of-week-opening-hour" name="day_of_week"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="opening-time">Opening time</label>
                        <input type="time" class="form-control" id="opening-time-opening-hour" name="opening_time"
                            step="1" required>
                    </div>
                    <div class="form-group">
                        <label for="closing-time">Closing time</label>
                        <input type="time" class="form-control" id="closing-time-opening-hour" name="closing_time"
                            step="1" required>
                    </div>
                    <input type="hidden" name="_openingHourMethod" value="PUT">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Save">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include __DIR__ . '/../footer.php';
?>