<?php include __DIR__ . '/../header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <span class="fs-4">Sidebar</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Venues
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Events
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Artists
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            Users
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered w-100 bg-primary-b m-auto border border-white text-tetiare-a">
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
                <div class="col-md-12">
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
                <div class="col-md-12">
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
                <div class="col-md-12">
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
            </div>
        </div>
    </div>
</div>


<?php
include __DIR__ . '/../footer.php';
?>