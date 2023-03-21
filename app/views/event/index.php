<?php
include __DIR__ . '/../header.php';
?>
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

<div class="row container">
    <div class="col-md-12">
        <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="7" class="fs-3">Event</th>
                </tr>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-3">Name</th>
                    <th class="col-3">Start date</th>
                    <th class="col-3">End date</th>
                    <th>Delete</th>
                    <th>Edit</th>
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
                        <td class="col-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <form method="post" action="/event">
                                    <input type="hidden" name="id" value="<?= $event->getId() ?>">
                                    <input type="hidden" name="_eventMethod" value="DELETE">
                                    <button type="submit"
                                        class="btn btn-danger mr-1 bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="col-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalEvent"
                                    class="btn btn-primary edit-button-event bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                                    data-id="<?= $event->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="7" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModalEvent"
                        class="btn btn-primary insert-button-event bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="INSERT" style="width: 50%;">
                </td>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert Event -->
<div id="insertModalEvent" class="modal fade" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert Event</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="insertEventForm" method="post" action="/event" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <input type="hidden" name="_eventMethod" value="CREATE">
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

<!-- Modal Update Event -->
<div id="editModalEvent" class="modal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update Event</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="editFormEvent" method="post" action="/event" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-event">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <input type="hidden" name="_eventMethod" value="PUT">
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