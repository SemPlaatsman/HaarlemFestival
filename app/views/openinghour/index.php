<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="7" class="fs-3">Opening hours</th>
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
                <?php foreach ($model['openinghour'] as $openingHour): ?>
                    <tr>
                        <td class="align-middle">
                            <?= $openingHour->getId() ?>
                        </td>
                        <td class="align-middle">
                            <?= $openingHour->getRestaurant_name() ?>
                        </td>
                        <td class="align-middle">
                            <?= $openingHour->getDay_of_week() ?>
                        </td>
                        <td class="align-middle">
                            <?= $openingHour->getOpening_time()->format('H:i:s') ?>
                        </td>
                        <td class="align-middle">
                            <?= $openingHour->getClosing_time()->format('H:i:s') ?>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <form method="post" action="/openinghour">
                                    <input type="hidden" name="id" value="<?= $openingHour->getId() ?>">
                                    <input type="hidden" name="_openingHourMethod" value="DELETE">
                                    <button type="submit"
                                        class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalOpeningHour"
                                    class="btn btn-primary edit-button-opening-hour bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"
                                    data-id="<?= $openingHour->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="7" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModalOpeningHour"
                        class="btn btn-primary insert-button-opening-hour bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2 w-50"
                        value="INSERT">
                </td>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert Opening hour -->
<div id="insertModalOpeningHour" class="modal fade" tabindex="-1" aria-labelledby="openingHourModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert opening hours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="insertFormOpeningHour" method="post" action="/openinghour" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Restaurant name</label><br>
                        <select name="restaurant_id" id="restaurant_id">
                            <?php foreach ($model['restaurant'] as $restaurant): ?>
                                <option value="<?= $restaurant->getId() ?>">
                                    <?= $restaurant->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day-of-week">Day of the week</label>
                        <input type="text" class="form-control" id="insert-day-of-week-opening-hour" name="day_of_week"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="opening-time">Opening time</label>
                        <input type="time" class="form-control" id="insert-opening-time-opening-hour"
                            name="opening_time" step="1" required>
                    </div>
                    <div class="form-group">
                        <label for="closing-time">Closing time</label>
                        <input type="time" class="form-control" id="insert-closing-time-opening-hour"
                            name="closing_time" step="1" required>
                    </div>
                    <input type="hidden" name="_openingHourMethod" value="CREATE">
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

<!-- Modal Update Opening hour -->
<div id="editModalOpeningHour" class="modal" tabindex="-1" aria-labelledby="openingHourModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update Opening hours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="editFormOpeningHour" method="post" action="/openinghour" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-opening-hour">
                    <div class="form-group">
                        <label for="day-of-week">Day of the week</label>
                        <input type="text" class="form-control" id="update-day-of-week" name="day_of_week" required>
                    </div>
                    <div class="form-group">
                        <label for="opening-time">Opening time</label>
                        <input type="time" class="form-control" id="update-opening-time-opening-hour"
                            name="opening_time" step="1" required>
                    </div>
                    <div class="form-group">
                        <label for="closing-time">Closing time</label>
                        <input type="time" class="form-control" id="update-closing-time-opening-hour"
                            name="closing_time" step="1" required>
                    </div>
                    <input type="hidden" name="_openingHourMethod" value="PUT">
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
            showSuccessModalAndRedirect('/openinghour');
        });
    </script>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>


<?php
include __DIR__ . '/../footer.php';
?>