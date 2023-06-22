<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
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
                        class="btn btn-primary insert-button-event bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2 w-50"
                        value="INSERT">
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
                        <input type="text" class="form-control" id="insert-event-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="insert-event-start-date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="insert-event-end-date" name="end_date" required>
                    </div>
                    <input type="hidden" name="_eventMethod" value="CREATE">
                </div>
                <div class="modal-footer border-0">
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
                        <input type="text" class="form-control" id="update-event-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="update-event-start-date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="update-event-end-date" name="end_date" required>
                    </div>
                    <input type="hidden" name="_eventMethod" value="PUT">
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit"
                        class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                        value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['success_message'])): ?>
    <?php include __DIR__ . '/../successModal.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            showSuccessModalAndRedirect('/event');
        });
    </script>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php
include __DIR__ . '/../footer.php';
?>