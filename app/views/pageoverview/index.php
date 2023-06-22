<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>

<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-100 bg-primary-b mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center" id="SelectableColumns">
                <tr>
                    <th colspan="7" class="fs-3">PAGES</th>
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody class="text-center" id="table">
                <?php
                foreach ($model["pages"] as $page) :
                ?>
                    <tr>
                        <td class="align-middle">
                            <?= $page->getId() ?>
                        </td>
                        <td class="align-middle">
                            <?= $page->getUrl() ?>
                        </td>
                        <!-- <td class="align-middle"> -->
                        <?php

                        //  strval($page->getContainerId()); 
                        ?>
                        <!-- </td> -->


                        <!-- edit button -->
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalPage" class="btn btn-primary edit-button bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2" data-id="<?= $page->getId() ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>

                            <div class="justify-content-center align-items-center">
                                <a href=" <?= $page->getUrl() ?>"><button  type="button" class="btn btn-primary-a edit-html-button bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2" >
                                   <i class="fa-regular fa-file-code"></i>
                                </button>
                                </a>
                            </div>
                        </td>

                        <!-- delete button  -->
                        <td class="col-1">
                            <div class="justify-content-center align-items-center">
                                <form method="post" action="/pagesOverview">
                                    <input type="hidden" name="id" value="<?= $page->getId() ?>">
                                    <input type="hidden" name="url" value="<?= $page->getUrl() ?>">
                                    <input type="hidden" name="_editMethod" value="DELETE">
                                    <button type="submit" class="btn btn-danger bg-primary-a text-white border-0 text-center d-inline-block fs-5 m-2"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                <?php
                endforeach;
                ?>
                <!-- insert button -->
                <td colspan="7" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModal"
                        class="btn btn-primary insert-button-venue bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2 w-50"
                        value="INSERT">
                        <div class="text-danger"><?=$this->error?></div>
                </td>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert page -->
<div id="insertModal" class="modal fade" tabindex="-1" aria-labelledby="pageModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">

            <!-- header form -->
            <div class="modal-header">
                <h5 class="modal-title">add Page</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- form  -->
            <form id="createForm" method="post" action="/pagesOverview" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="update-id">
                    <div class="form-group">
                        <label for="url">url</label>
                        <input type="text" class="form-control" id="update-url" name="url" required>
                    </div>
                    <input type="hidden" name="_editMethod" value="POST">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update page -->
<div id="editModal" class="modal" tabindex="-1" aria-labelledby="pageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">

            <!-- header form -->
            <div class="modal-header">
                <h5 class="modal-title">Update Page</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- form  -->
            <form id="editForm" method="post" action="/pagesOverview" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="update-id">
                    <div class="form-group">
                        <label for="url">url</label>
                        <input type="text" class="form-control" id="update-url" name="url" required>
                    </div>
                    <input type="hidden" name="_editMethod" value="PUT">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary bg-primary-b border-0 text-center text-decoration-none d-inline-block fs-5 m-2" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>



<?php
include __DIR__ . '/../footer.php';
?>