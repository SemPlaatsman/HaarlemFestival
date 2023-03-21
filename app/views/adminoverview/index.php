<?php include __DIR__ . '/../header.php'; ?>
<header class="d-flex justify-content-center py-3 bg-primary-b fs-5">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/adminoverview" class="nav-link text-tetiare-a bg-tetiare-a mx-0 mx-xxl-5"
                aria-current="page">Overview</a>
        </li>
        <li class="nav-item"><a href="/venue" class="nav-link text-tetiare-a mx-0 mx-xxl-5">Venues</a></li>
        <li class="nav-item"><a href="/event" class="nav-link text-tetiare-a mx-0 mx-xxl-5">Events</a></li>
        <li class="nav-item"><a href="/artist" class="nav-link text-tetiare-a mx-0 mx-xxl-5">Artists</a></li>
        <li class="nav-item"><a href="/user" class="nav-link text-tetiare-a mx-0 mx-xxl-5">Users</a></li>
        <li class="nav-item"><a href="/openinghour" class="nav-link text-tetiare-a mx-0 mx-xxl-5">Opening hours</a></li>
        <li class="nav-item"><a href="/restaurant" class="nav-link text-tetiare-a mx-0 mx-xxl-5">Restaurants</a></li>
    </ul>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <table
                        class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
                        <thead class="text-center">
                            <tr>
                                <th colspan="7" class="fs-3">Venues</th>
                            </tr>
                            <tr>
                                <th class="col-1">ID</th>
                                <th class="col-3">Name</th>
                                <th class="col-3">Location</th>
                                <th class="col-3">Seats</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($model['venue'] as $venue): ?>
                                <tr>
                                    <td class="align-middle">
                                        <?= $venue->getId() ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $venue->getName() ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $venue->getLocation() ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $venue->getSeats() ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table
                        class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
                        <thead class="text-center">
                            <tr>
                                <th colspan="7" class="fs-3">Event</th>
                            </tr>
                            <tr>
                                <th class="col-1">ID</th>
                                <th class="col-3">Name</th>
                                <th class="col-3">Start date</th>
                                <th class="col-3">End date</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($model['event'] as $event): ?>
                                <tr>
                                    <td class="align-middle">
                                        <?= $event->getId() ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $event->getName() ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $event->getStart_date()->format('Y-m-d') ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $event->getEnd_date()->format('Y-m-d') ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table
                        class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
                        <thead class="text-center">
                            <tr>
                                <th colspan="7" class="fs-3">Artist</th>
                            </tr>
                            <tr>
                                <th class="col-1">ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($model['artist'] as $artist): ?>
                                <tr>
                                    <td class="align-middle">
                                        <?= $artist->id ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $artist->name ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table
                        class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
                        <thead class="text-center">
                            <tr>
                                <th colspan="7" class="fs-3">Users</th>
                            </tr>
                            <tr>
                                <th class="col-1">ID</th>
                                <th class="col-3">Email</th>
                                <th class="col-3">Time created</th>
                                <th class="col-1">Is admin</th>
                                <th class="col-3">Name</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($model['user'] as $user): ?>
                                <tr>
                                    <td class="align-middle">
                                        <?= $user->getId() ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $user->getEmail() ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $user->getTime_created()->format('Y-m-d H:i:s') ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $user->getIsAdmin() == 1 ? 'Yes' : 'No' ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $user->getName() ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <table
                            class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
                            <thead class="text-center">
                                <tr>
                                    <th colspan="7" class="fs-3">Opening hours</th>
                                </tr>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-3">Restaurant name</th>
                                    <th class="col-3">Day of week</th>
                                    <th class="col-3">Opening time</th>
                                    <th class="col-3">Closing time</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($model['openinghour'] as $openinghour): ?>
                                    <tr>
                                        <td class="align-middle">
                                            <?= $openinghour->getId() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $openinghour->getRestaurant_name() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $openinghour->getDay_of_week() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $openinghour->getOpening_time()->format('H:i:s') ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $openinghour->getClosing_time()->format('H:i:s') ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table
                            class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
                            <thead class="text-center">
                                <tr>
                                    <th colspan="7" class="fs-3">Restaurants</th>
                                </tr>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-3">Name</th>
                                    <th class="col-1">Seats</th>
                                    <th class="col-3">Location</th>
                                    <th class="col-1">Adult price</th>
                                    <th class="col-1">Kids price</th>
                                    <th class="col-3">Reservation fee</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($model['restaurant'] as $restaurant): ?>
                                    <tr>
                                        <td class="align-middle">
                                            <?= $restaurant->getId() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $restaurant->getName() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $restaurant->getSeats() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $restaurant->getLocation() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $restaurant->getAdultPrice() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $restaurant->getKidsPrice() ?>
                                        </td>
                                        <td class="align-middle">
                                            <?= $restaurant->getReservationFee() ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include __DIR__ . '/../footer.php';
?>