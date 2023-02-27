<?php
    include __DIR__ . '/../header.php';
?>

    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold">Centered hero</h1>
        <div class="col-lg-6 mx-auto">
            <?php foreach ($model as $page) { ?>
                <p class="lead mb-4">
                    <?= $page->getBody_markup(); ?>
                </p>
            <?php } ?>

            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary
                    button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
        </div>


        <div class="container mt-5">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editor-modal">Open
                Editor</button>
        </div>

        <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-modal-label"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="/home" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editor-modal-label">WYSIWYG Editor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= /*$page->getId()*/ "fix this pls" ?>" />
                            <textarea name="body_markup" id="editor" rows="10"><?= /*$page->getBody_markup()*/ "this gives errors too" ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . '/../footer.php';
?>