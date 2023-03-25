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
                    <th colspan="7" class="fs-3">Venues</th>
                </tr>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-3">Name</th>
                    <th class="col-3">Location</th>
                    <th class="col-3">Seats</th>
                    <th>Delete</th>
                    <th>Edit</th>
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
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <form method="post" action="/venue">
                                    <input type="hidden" name="id" value="<?= $venue->getId() ?>">
                                    <input type="hidden" name="_venueMethod" value="DELETE">
                                    <button type="submit"
                                        class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalVenue"
                                    class="btn btn-primary edit-button-venue bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"
                                    data-id="<?= $venue->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="7" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModalVenue"
                        class="btn btn-primary insert-button-venue bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2 w-50"
                        value="INSERT">
                </td>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert Venue -->
<div id="insertModalVenue" class="modal fade" tabindex="-1" aria-labelledby="venueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert Venue</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="insertFormVenue" method="post" action="/venue" class="d-flex justify-content-between">
                <div class="modal-body">
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
            <form id="editFormVenue" method="post" action="/venue" class="d-flex justify-content-between">
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