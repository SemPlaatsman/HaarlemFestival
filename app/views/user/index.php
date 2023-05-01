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
        <li><a href="/user" class="bg-light nav-item nav-link text-primary-b mx-0 mx-xxl-5">USERS</a></li>
        <li><a href="/openinghour" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">OPENING
                HOURS</a></li>
        <li><a href="/restaurant" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">RESTAURANTS</a>
        </li>
        <li><a href="/reservation" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">RESERVATIONS</a>
        </li>
    </ul>
</header>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
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
                    <th>Delete</th>
                    <th>Edit</th>
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
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <form method="post" action="/user">
                                    <input type="hidden" name="id" value="<?= $user->getId() ?>">
                                    <input type="hidden" name="_userMethod" value="DELETE">
                                    <button type="submit"
                                        class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalUser"
                                    class="btn btn-primary edit-button-user bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"
                                    data-id="<?= $user->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="7" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModalUser"
                        class="btn btn-primary insert-button-user bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2 w-50"
                        value="INSERT">
                </td>
            </tbody>
        </table>
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
            <form id="insertEventForm" method="post" action="/user" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="insert-user-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="insert-user-password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="insert-user-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="is_admin">Is admin</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="insert-user-is-admin" name="is_admin"
                                value="1">
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


<!-- Modal Update User -->
<div id="editModalUser" class="modal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="editFormUser" method="post" action="/user" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-user">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="update-user-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="update-user-password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="update-user-name" name="name" required>
                    </div>
                    <div class="form-group"><label for="is_admin">Is admin</label>
                        <div class="form-check"><input type="checkbox" class="form-check-input"
                                id="update-user-is-admin" name="is_admin" value="1"><label class="form-check-label"
                                for="is_admin">Yes</label>
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

<?php
include __DIR__ . '/../footer.php';
?>