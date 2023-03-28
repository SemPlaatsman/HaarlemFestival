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
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>