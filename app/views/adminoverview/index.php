<?php
include __DIR__ . '/../header.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminoverview.css">
    <title>Admin Overview</title>
    <style>
    </style>
</head>

<body>
    <div class="row" class="container">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="7" class="title-table">Venues</th>
                    </tr>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-3">Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Seats</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model['venue'] as $venue): ?>
                        <tr>
                            <td>
                                <?= $venue->getId() ?>
                            </td>
                            <td>
                                <?= $venue->getName() ?>
                            </td>
                            <td>
                                <?= $venue->getDate()->format('Y-m-d H:i:s') ?>
                            </td>
                            <td>
                                <?= $venue->getLocation() ?>
                            </td>
                            <td>
                                <?= $venue->getSeats() ?>
                            </td>
                            <td class="col-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <form method="post" action="/adminoverview">
                                        <input type="hidden" name="id" value="<?= $venue->getId() ?>">
                                        <input type="hidden" name="_venueMethod" value="DELETE">
                                        <input type="submit" class="btn btn-danger mr-1" value="Delete">
                                    </form>
                                    <input type="submit" class="btn btn-primary edit-button-venue" value="Edit"
                                        data-id="<?= $venue->getId() ?>">
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <td colspan="7" class="text-center">
                        <input type="submit" class="btn btn-primary insert-button-venue" value="Insert"
                            style="width: 50%;">
                    </td>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="7" class="title-table">Event</th>
                    </tr>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-3">Name</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model['event'] as $event): ?>
                        <tr>
                            <td>
                                <?= $event->getId() ?>
                            </td>
                            <td>
                                <?= $event->getName() ?>
                            </td>
                            <td>
                                <?= $event->getStart_date()->format('Y-m-d') ?>
                            </td>
                            <td>
                                <?= $event->getEnd_date()->format('Y-m-d') ?>
                            </td>
                            <td class="col-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <form method="post" action="/adminoverview">
                                        <input type="hidden" name="id" value="<?= $event->getId() ?>">
                                        <input type="hidden" name="_eventMethod" value="DELETE">
                                        <input type="submit" class="btn btn-danger mr-1" value="Delete">
                                    </form>
                                    <input type="submit" class="btn btn-primary edit-button-event" value="Edit"
                                        data-id="<?= $event->getId() ?>">
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <td colspan="7" class="text-center">
                        <input type="submit" class="btn btn-primary insert-button-event" value="Insert"
                            style="width: 50%;">
                    </td>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="7" class="title-table">Artist</th>
                    </tr>
                    <tr>
                        <th class="col-1">ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model['artist'] as $artist): ?>
                        <tr>
                            <td>
                                <?= $artist->id ?>
                            </td>
                            <td>
                                <?= $artist->name ?>
                            </td>
                            <td class="col-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <form method="post" action="/adminoverview">
                                        <input type="hidden" name="id" value="<?= $artist->id ?>">
                                        <input type="hidden" name="_artistMethod" value="DELETE">
                                        <input type="submit" class="btn btn-danger mr-1" value="Delete">
                                    </form>
                                    <input type="submit" class="btn btn-primary edit-button-artist" value="Edit"
                                        data-id="<?= $artist->id ?>">
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <td colspan="7" class="text-center">
                        <input type="submit" class="btn btn-primary insert-button-artist" value="Insert"
                            style="width: 50%;">
                    </td>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Update Venue -->
    <div id="editModalVenue" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Venue</h5>
                    <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
                </div>
                <form id="editFormVenue" method="post" action="/adminoverview">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id-venue">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name-venue" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date and Time</label>
                            <input type="datetime-local" class="form-control" id="date-venue" name="date" step="1"
                                required>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
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
                <form id="editFormEvent" method="post" action="/adminoverview">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
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
                <form id="editFormArtist" method="post" action="/adminoverview">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id-artist">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name-artist" name="name-artist" required>
                        </div>
                        <input type="hidden" name="_artistMethod" value="PUT">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
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
                <form id="insertFormVenue" method="post" action="/adminoverview">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name-venue" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date and Time</label>
                            <input type="datetime-local" class="form-control" id="date-venue" name="date" step="1"
                                required>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Insert">
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
                <form id="insertEventForm" method="post" action="/adminoverview">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Insert">
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
                <form id="insertArtistForm" method="post" action="/adminoverview">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <input type="hidden" name="_artistMethod" value="CREATE">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Insert">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="javascript/adminoverview.js"></script>
</body>

</html>

<?php
include __DIR__ . '/../footer.php';
?>