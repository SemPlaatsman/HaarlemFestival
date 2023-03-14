<?php
include __DIR__ . '/../header.php';
?>

<div class="row container">
    <div class="col-md-12">
        <table class="table table-bordered w-100 bg-primary-b m-auto border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="7" class="fs-3">Venues</th>
                </tr>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-3">Name</th>
                    <th>Location</th>
                    <th>Seats</th>
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
                                <form method="post" action="/adminoverview">
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
                                <button type="button"
                                    class="btn btn-primary edit-button-venue bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"
                                    data-id="<?= $venue->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="7" class="text-center">
                    <input type="submit"
                        class="btn btn-primary insert-button-venue bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="INSERT" style="width: 50%;">
                </td>
            </tbody>
        </table>
    </div>
    <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 border border-white text-tetiare-a">
        <thead class="text-center">
            <tr>
                <th colspan="7" class="fs-3">Event</th>
            </tr>
            <tr>
                <th class="col-1">ID</th>
                <th class="col-3">Name</th>
                <th>Start date</th>
                <th>End date</th>
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
                            <form method="post" action="/adminoverview">
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
                            <button type="button"
                                class="btn btn-primary edit-button-event bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                                data-id="<?= $event->getId() ?>"><i class="fas fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <td colspan="7" class="text-center">
                <input type="submit"
                    class="btn btn-primary insert-button-event bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                    value="INSERT" style="width: 50%;">
            </td>
        </tbody>
    </table>
    <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
        <thead class="text-center">
            <tr>
                <th colspan="7" class="fs-3">Artist</th>
            </tr>
            <tr>
                <th class="col-1">ID</th>
                <th>Name</th>
                <th>Delete</th>
                <th>Edit</th>
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
                    <td class="col-1">
                        <div class="d-flex justify-content-center align-items-center">
                            <form method="post" action="/adminoverview">
                                <input type="hidden" name="id" value="<?= $artist->id ?>">
                                <input type="hidden" name="_artistMethod" value="DELETE">
                                <button type="submit"
                                    class="btn btn-danger mr-1 bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                    <td class="col-1">
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button"
                                class="btn btn-primary edit-button-artist bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                                data-id="<?= $artist->id ?>"><i class="fas fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <td colspan="7" class="text-center">
                <input type="submit"
                    class="btn btn-primary insert-button-artist bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                    value="INSERT" style="width: 50%;">
            </td>
        </tbody>
    </table>
</div>

<!-- Modal Update Venue -->
<div id="editModalVenue" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Venue</h5>
                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
            </div>
            <form id="editFormVenue" method="post" action="/adminoverview" class="d-flex justify-content-between">
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
                    <button type="button" class="btn btn-secondary fs-5" data-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Event -->
<div id="editModalEvent" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Event</h5>
                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
            </div>
            <form id="editFormEvent" method="post" action="/adminoverview" class="d-flex justify-content-between">
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
                    <button type="button" class="btn btn-secondary fs-5" data-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Artist -->
<div id="editModalArtist" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Artist</h5>
                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
            </div>
            <form id="editFormArtist" method="post" action="/adminoverview" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-artist">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name-artist" name="name" required>
                    </div>
                    <input type="hidden" name="_artistMethod" value="PUT">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Insert Venue -->
<div id="insertModalVenue" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Venue</h5>
                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
            </div>
            <form id="insertFormVenue" method="post" action="/adminoverview" class="d-flex justify-content-between">
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
                        class="btn btn-primary bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Insert Event -->
<div id="insertModalEvent" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Event</h5>
                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
            </div>
            <form id="insertEventForm" method="post" action="/adminoverview" class="d-flex justify-content-between">
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
                    <button type="button" class="btn btn-secondary fs-5" data-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Insert Artist -->
<div id="insertModalArtist" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Artist</h5>
                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
            </div>
            <form id="insertArtistForm" method="post" action="/adminoverview" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <input type="hidden" name="_artistMethod" value="CREATE">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-dismiss="modal">Close</button>
                    <input type="submit" role="button"
                        class="btn btn-primary bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include __DIR__ . '/../footer.php';
?>