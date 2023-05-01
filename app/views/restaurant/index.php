<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="9" class="fs-3">Restaurants</th>
                </tr>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-2">Restaurant name</th>
                    <th class="col-1">Seats</th>
                    <th class="col-2">Location</th>
                    <th class="col-2">Adult price</th>
                    <th class="col-2">Kids price</th>
                    <th class="col-3">Reservation fee</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($model['restaurant'] as $restaurant): ?>
                    <tr>
                        <td class="align-middle">
                            <?= $restaurant->getId() ?>
                        </td>
                        <td class="align-middle">
                            <?= $restaurant->getName() ?>
                        </td>
                        <td class="align-middle">
                            <?= $restaurant->getSeats() ?>
                        </td>
                        <td class="align-middle">
                            <?= $restaurant->getLocation() ?>
                        </td>
                        <td class="align-middle">
                            <?= $restaurant->getAdultPriceFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $restaurant->getKidsPriceFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $restaurant->getReservationFeeFormatted() ?>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <form method="post" action="/restaurant">
                                    <input type="hidden" name="id" value="<?= $restaurant->getId() ?>">
                                    <input type="hidden" name="_restaurantMethod" value="DELETE">
                                    <button type="submit"
                                        class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalRestaurant"
                                    class="btn btn-primary edit-button-restaurant bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"
                                    data-id="<?= $restaurant->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="9" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModalRestaurant"
                        class="btn btn-primary insert-button-restaurant bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2 w-50"
                        value="INSERT">
                </td>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert Restaurant -->
<div id="insertModalRestaurant" class="modal fade" tabindex="-1" aria-labelledby="restaurantModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Insert Restaurant</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="insertFormRestaurant" method="post" action="/restaurant" class="d-flex justify-content-between">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Seats</label>
                        <input type="number" class="form-control" id="seats" name="seats" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="adult_price">Adult price</label>
                        <input type="number" class="form-control" id="adult_price" name="adult_price" required>
                    </div>
                    <div class="form-group">
                        <label for="kids_price">Kids price</label>
                        <input type="number" class="form-control" id="kids_price" name="kids_price" required>
                    </div>
                    <div class="form-group">
                        <label for="reservation_fee">Reservation fee</label>
                        <input type="number" class="form-control" id="reservation_fee" name="reservation_fee" required>
                    </div>
                    <input type="hidden" name="_restaurantMethod" value="CREATE">
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

<!-- Modal Update Restaurant -->
<div id="editModalRestaurant" class="modal" tabindex="-1" aria-labelledby="restaurantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update Restaurant</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="editFormRestaurant" method="post" action="/restaurant" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-restaurant">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Seats</label>
                        <input type="number" class="form-control" id="seats" name="seats" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="adult_price">Adult price</label>
                        <input type="number" class="form-control" id="adult_price" name="adult_price" required>
                    </div>
                    <div class="form-group">
                        <label for="kids_price">Kids price</label>
                        <input type="number" class="form-control" id="kids_price" name="kids_price" required>
                    </div>
                    <div class="form-group">
                        <label for="reservation_fee">Reservation fee</label>
                        <input type="number" class="form-control" id="reservation_fee" name="reservation_fee" required>
                    </div>
                    <input type="hidden" name="_restaurantMethod" value="PUT">
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