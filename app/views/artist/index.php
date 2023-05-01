<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../adminSubheader.php';
?>
<div class="row container">
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered w-150 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="7" class="fs-3">Artist</th>
                </tr>
                <tr>
                    <th class="col-1">ID</th>
                    <th>Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($model['artist'] as $artist): ?>
                    <tr>
                        <td class="align-middle">
                            <?= $artist->getId() ?>
                        </td>
                        <td class="align-middle">
                            <?= $artist->getName() ?>
                        </td>
                        <td class="col-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <form method="post" action="/artist">
                                    <input type="hidden" name="id" value="<?= $artist->getId() ?>">
                                    <input type="hidden" name="_artistMethod" value="DELETE">
                                    <button type="submit"
                                        class="btn btn-danger mr-1 bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="col-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModalArtist"
                                    class="btn btn-primary edit-button-artist bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2"
                                    data-id="<?= $artist->getId() ?>"><i class="fas fa-edit"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <td colspan="7" class="text-center">
                    <input type="submit" data-bs-toggle="modal" data-bs-target="#insertModalArtist"
                        class="btn btn-primary insert-button-artist bg-primary-a text-white border-0 text-center text-decoration-none d-inline-block fs-5 m-2 w-50"
                        value="INSERT">
                </td>
            </tbody>
        </table>
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
            <form id="insertArtistForm" method="post" action="/artist" class="d-flex justify-content-between">
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

<!-- Modal Update Artist -->
<div id="editModalArtist" class="modal" tabindex="-1" aria-labelledby="artistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-white">
        <div class="modal-content bg-primary-a border border-white">
            <div class="modal-header">
                <h5 class="modal-title">Update Artist</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="editFormArtist" method="post" action="/artist" class="d-flex justify-content-between">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id-artist">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name-artist" name="name" required>
                    </div>
                    <input type="hidden" name="_artistMethod" value="PUT">
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