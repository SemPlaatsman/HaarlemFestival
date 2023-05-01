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
                    <th class="col-1">Total Price</th>
                    <th class="col-1">VAT</th>
                    <th class="col-2">Restaurant</th>
                    <th class="col-1">Final check</th>
                    <th class="col-1">Nr of adults</th>
                    <th class="col-1">Nr of kids</th>
                    <th class="col-2">Datetime</th>
                    <th>Deactivate</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($model['reservations'] as $reservation): ?>
                    <tr>
                        <td class="align-middle">
                            <?= $reservation->getId() ?>
                        </td>
                        <td class="align-middle">
                            <?= $reservation->getTotalPriceFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $reservation->getVATFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $reservation->getRestaurant()->getName() ?>
                        </td>
                        <td class="align-middle">
                            <?= $reservation->getFinalCheckFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $reservation->getNrOfAdults() ?>
                        </td>
                        <td class="align-middle">
                            <?= $reservation->getNrOfKids() ?>
                        </td>
                        <td class="align-middle">
                            <?= $reservation->getDatetimeFormatted() ?>
                        </td>
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <form method="post" onsubmit="return confirm('Are you sure you wish to remove a reservation for <?= $reservation->getRestaurant()->getName(); ?> at <?= $reservation->getDatetimeFormatted(); ?>?');">
                                    <input type="hidden" name="deleteId" value="<?= $reservation->getId() ?>">
                                    <button type="submit"
                                        class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>