<?php include __DIR__ . '/../header.php'; ?>
<header class="d-flex justify-content-center py-3 bg-primary-b fs-5">
    <ul class="nav nav-pills fw-bold">
        <li><a href="/adminoverview" class="bg-light nav-item nav-link text-primary-b mx-0 mx-xxl-5"
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
    </ul>
</header>
<div class="container-fluid mt-5">
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">WELCOME ADMIN</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">You can create, read, delete or edit the items you can find in the header. Feel free to
                navigate through the tabs above to access the different sections of the system or click on one of the
                buttons below.</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a href="/venue" class="btn bg-primary-b text-tetiare-a btn-lg btn-block">VENUES</a>
                <a href="/event" class="btn bg-primary-b text-tetiare-a btn-lg btn-block">EVENTS</a>
                <a href="/artist" class="btn bg-primary-b text-tetiare-a btn-lg btn-block">ARTISTS</a>
                <a href="/user" class="btn bg-primary-b text-tetiare-a btn-lg btn-block">USERS</a>
                <a href="/openinghour" class="btn bg-primary-b text-tetiare-a btn-lg btn-block">OPENING HOURS</a>
                <a href="/restaurant" class="btn bg-primary-b text-tetiare-a btn-lg btn-block">RESTAURANTS</A>

            </div>
            <form id="editFormUser" method="post" action="/adminoverview" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-user">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name-user" name="name" required>
                    </div>
                    <div class="form-group"><label for="is_admin">Is admin</label>
                        <div class="form-check"><input type="checkbox" class="form-check-input" id="is_admin"
                                name="is_admin" value="1"><label class="form-check-label" for="is_admin">Yes</label>
                        </div>
                    </div>
                    <input type="hidden" name="_userMethod" value="PUT">
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

<!-- Modal Insert Venue -->
<div id="insertModalVenue" class="modal fade" tabindex="-1" aria-labelledby="venueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert Venue</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
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
                        class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Insert">
                </div>
            </form>
        </div>
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
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Insert Artist -->
<div id="insertModalArtist" class="modal fade" tabindex="-1" aria-labelledby="artistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert Artist</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
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
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit" role="button"
                        class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Insert">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Insert User -->
<div id="insertModalUser" class="modal fade" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="insertEventForm" method="post" action="/adminoverview" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="is_admin">Is admin</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1">
                            <label class="form-check-label" for="is_admin">Yes</label>
                        </div>
                    </div>
                    <input type="hidden" name="_userMethod" value="CREATE">
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

<?php
include __DIR__ . '/../footer.php';
?>