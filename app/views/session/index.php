<?php
include __DIR__ . '/../header.php';
?>

<div class="row container">
    <div class="col-md-12">
        <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="7" class="fs-3">Sessions</th>
                </tr>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-3">Restaurant name</th>
                    <th class="col-3">Day of week</th>
                    <th class="col-3">Opening time</th>
                    <th class="col-3">Closing time</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($model['session'] as $session): ?>
                    <tr>
                        <td class="align-middle">
                            <?= $session->getId() ?>
                        </td>
                        <td class="align-middle">
                            <?= $session->getRestaurant_name() ?>
                        </td>
                        <td class="align-middle">
                            <?= $session->getDay_of_week() ?>
                        </td>
                        <td class="align-middle">
                            <?= $session->getOpening_time()->format('H:i:s') ?>
                        </td>
                        <td class="align-middle">
                            <?= $session->getClosing_time()->format('H:i:s') ?>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <form method="post" action="/session">
                                    <input type="hidden" name="id" value="<?= $session->getId() ?>">
                                    <input type="hidden" name="_sessionMethod" value="DELETE">
                                    <button type="submit"
                                        class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalSession"
                                    class="btn btn-primary edit-button-venue bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"
                                    data-id="<?= $session->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="7" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModalSession"
                        class="btn btn-primary insert-button-venue bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="INSERT" style="width: 50%;">
                </td>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert Venue -->
<div id="insertModalSession" class="modal fade" tabindex="-1" aria-labelledby="sessionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert Session</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="insertFormSession" method="post" action="/session" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Restaurant name</label>
                        <input type="text" class="form-control" id="name-restaurant" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="day-of-week">Day of the week</label>
                        <input type="text" class="form-control" id="day-of-week-session" name="day-of-week" required>
                    </div>
                    <div class="form-group">
                        <label for="opening-time">Opening time</label>
                        <input type="time" class="form-control" id="opening-time-session" name="opening-time" step="1"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="closing-time">Closing time</label>
                        <input type="time" class="form-control" id="closing-time-session" name="closing-time" step="1"
                            required>
                    </div>
                    <input type="hidden" name="_venueMethod" value="CREATE">
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

<!-- Modal Update Venue -->
<div id="editModalVenue" class="modal" tabindex="-1" aria-labelledby="venueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update Venue</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="editFormVenue" method="post" action="/session" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-venue">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name-venue" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location-venue" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Number of Seats</label>
                        <input type="number" class="form-control" id="seats-venue" name="seats" required>
                    </div>
                    <input type="hidden" name="_venueMethod" value="PUT">
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