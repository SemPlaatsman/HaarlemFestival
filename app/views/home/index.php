<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold">Centered hero</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with
                Bootstrap, the
                world’s
                most popular front-end open source toolkit, featuring Sass variables and mixins,
                responsive grid
                system,
                extensive prebuilt components, and powerful JavaScript plugins.</p>
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
                    <div class="modal-header">
                        <h5 class="modal-title" id="editor-modal-label">WYSIWYG Editor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <!-- THIS IS SAMPLE CODE -->
                            <!-- DYNAMIC CODE FROM DATABASE SHOULD BE PLACED HERE -->
                            <div contenteditable="true" name="content" id="content">
                                <div class="px-4 py-5 my-5 text-center">
                                    <img class="d-block mx-auto mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg"
                                        alt="" width="72" height="57">
                                    <h1 class="display-5 fw-bold">Centered hero</h1>
                                    <div class="col-lg-6 mx-auto">
                                        <p class="lead mb-4">Quickly design and customize responsive mobile-first sites
                                            with
                                            Bootstrap, the
                                            world’s
                                            most popular front-end open source toolkit, featuring Sass variables and
                                            mixins,
                                            responsive grid
                                            system,
                                            extensive prebuilt components, and powerful JavaScript plugins.</p>
                                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary
                                                button</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="save">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="js/CKeditor.js"></script>

</html>