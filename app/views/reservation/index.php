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
        <li><a href="/user" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">USERS</a></li>
        <li><a href="/openinghour" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">OPENING
                HOURS</a></li>
        <li><a href="/restaurant" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">RESTAURANTS</a>
        </li>
        <li><a href="/reservation" class="bg-light nav-item nav-link text-primary-b mx-0 mx-xxl-5">RESERVATIONS</a></li>
    </ul>
</header>

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
                                <form method="post"
                                    onsubmit="return confirm('Are you sure you wish to remove a reservation for <?= $reservation->getRestaurant()->getName(); ?> at <?= $reservation->getDatetimeFormatted(); ?>?');">
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