<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center" id="SelectableColumns">
                <tr>
                    <th colspan="7" class="fs-3">ORDERS</th>
                </tr>
                <tr>
                    <th class="col-1" id="IdColumn">
                      ID
                    </th>
                    <th class="col-3" id="url">
                       When
                    </th>

                    <!-- <th class="col-3" id="containerId">
                     container id
                    </th> -->
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <body class="text-center" id="table">
                <?php
                foreach ($model["orderhistory"] as $order) : 
                ?>
                <tr>
                    <td class="align-middle">
                        <?= $order->getId() ?>
                    </td>
                    <td class="align-middle">
                        <?= $order->getWhen_event()->format('M d H:i') ?>
                    </td>
                    <td class="align-middle">
                        <?= $order->getWhere_event() ?>
                    </td>
                    <td class="align-middle">
                        <?= $order->getWhat_event() ?>
                    </td>
                    <td class="align-middle">
                        <?= $order->getTotal_price() ?>
                    </td>
                    <td class="align-middle">
                        <?= strval($order->getVAT()) ?>
                    </td>

                    <!-- buttons -->
                    <td class="col-1">
                        <div class="justify-content-center align-items-center">
                            <form method="post" action="/venue">
                                <input type="hidden" name="id" value="<?= $venue->getId() ?>">
                                <input type="hidden" name="_venueMethod" value="DELETE">
                                <button type="submit" class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                    <!-- delete button -->
                    <td class="col-1">
                        <div class="justify-content-center align-items-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#editModalVenue" class="btn btn-primary edit-button-venue bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2" data-id="<?= $venue->getId() ?>"><i class="fas fa-edit"></i></button>
                        </div>
                    </td>
                </tr>
                <?php
                endforeach; 
                ?>

            </body>
        </table>
        <input type="button" id="download" class="btn bg-primary-b text-tetiare-a btn-lg btn-block d-none" value="DOWNLOAD EXCEL">
    </div>
</div>



<?php
include __DIR__ . '/../footer.php';
?>