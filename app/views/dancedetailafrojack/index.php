<?php include __DIR__ . '/../header.php';
(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
?>
<?php include __DIR__ . '/../subheaderdance.php'; ?>
<div class="container-fluid bg-black">
    <div class="position-relative">
        <img src="img/png/dance/detail/Afrojack-banner.png" class="img-fluid w-100 h-100" alt="Banner Image">
        <h1 class="title-banner-acid-yellow text-acid-yellow position-absolute bottom-0 start-0 pb-5 mb-5">
            AFROJACK
        </h1>
        <h1 class="title-banner-light-purple text-light-purple position-absolute bottom-0 start-0 pb-5 mb-5 ms-5">
            AFROJACK
        </h1>
    </div>
    <div class="mx-auto">
        <h1 class="text-center text-light-purple mt-5 display-2">CAREER HIGHLIGHTS!</h1>
    </div>
    <div class="section-with-background-1">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <h2 class="text-center text-light-purple mt-5 m1-1 display-3">WHO IS AFROJACK?</h2>
                <?php foreach ($model['pages'] as $page) { ?>
                    <?php if ($page->getId() === 33) { ?>
                        <p class="text-acid-yellow mt-3 m-3 m1-3 fs-5" data-id="<?= $page->getId() ?>"
                            data-url="<?= $page->getUrl() ?>" data-body-markup="<?= $page->getBody_markup() ?>">
                            <?= $page->getBody_markup(); ?>
                        </p>
                        <div class="text-center">
                            <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
                                <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open
                                    Editor</button>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="col-6">
                <img src="img/png/dance/detail/Group-Afrojack.png" class="w-100"></img>
            </div>
        </div>
        <div class="row">
            <img src="img/png/dance/detail/Group-Afrojack-2.png" class="col-md-5"></img>
            <div class="col-md-4 offset-md-2">
                <h2 class="text-center justify-content-center text-light-purple mt-5 display-3">HIGHLIGHTS</h2>
                <?php foreach ($model['pages'] as $page) { ?>
                    <?php if ($page->getId() === 34) { ?>
                        <p class="text-acid-yellow mt-3 m-3 text-end fs-5" data-id="<?= $page->getId() ?>"
                            data-url="<?= $page->getUrl() ?>" data-body-markup="<?= $page->getBody_markup() ?>">
                            <?= $page->getBody_markup(); ?>
                        </p>
                        <div class="text-center">
                            <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
                                <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open
                                    Editor</button>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-1 mt-5">
                <h2 class="text-center text-light-purple mt-5 m1-1 display-3">MOST IMPORTANT TRACK/ALBUM</h2>
                <?php foreach ($model['pages'] as $page) { ?>
                    <?php if ($page->getId() === 35) { ?>
                        <p class="text-acid-yellow mt-3 m-3 m1-3 fs-5" data-id="<?= $page->getId() ?>"
                            data-url="<?= $page->getUrl() ?>" data-body-markup="<?= $page->getBody_markup() ?>">
                            <?= $page->getBody_markup(); ?>
                        </p>
                        <div class="text-center">
                            <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
                                <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open
                                    Editor</button>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <img src="img/png/dance/detail/Group-Afrojack-3.png" class="w-100"></img>
            </div>
        </div>

        <h1 class="text-center text-light-purple mt-5 display-2">TAKE A LISTEN</h1>
        <div class="align-items-center text-center">
            <img src="img/png/dance/detail/Simulated-Music-3.png" class="col-md-3"></img>
            <img src="img/png/dance/detail/Simulated-Music-4.png" class="col-md-3"></img>
        </div>
    </div>
    <?php
    include __DIR__ . '/../modalwysiwyg.php';
    ?>
</div>

<?php
include __DIR__ . '/../footer.php';
?>