<?php
include __DIR__ . '/../header.php';
?>

<section class="container-fluid px-0 bg-primary-b">
    <section class="position-relative">
        <img src="img/png/yummy/home/banner.png" class="img-fluid w-100 h-100" alt="Banner Image">
        <h1 class="banner-title text-tetiare-a position-absolute bottom-0 start-0 ms-5 col-md-3 text-end mb-0">
            YUMMY!
        </h1>
        <p class="banner-title-text position-absolute bottom-0 start-0 text-white col-md-7 fs-2 pb-2 mb-0">
            A charming and tasty food festival in the heart of Haarlem
        </p>
    </section>
    <section class="container-fluid row p-0 m-0">
        <section class="col-md-6 p-5">
            <section class="bg-tetiare-a p-3">
                <img src="img/png/yummy/home/whyhaarlem.png" class="img-fluid" alt="Why Haarlem? image">
            </section>
        </section>
        <section class="bg-tetiare-a col-md-6 p-5">
            <h1 class="display-1 text-center">WHY HAARLEM?</h1>
            <?php foreach ($model['pages'] as $page) { ?>
                <?php if ($page->getId() === 19) { ?>
                    <p class="fs-3" data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>"
                        data-body-markup="<?= $page->getBody_markup() ?>">
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
        </section>
    </section>
    <section class="col-md-8 mx-auto pt-5 container-fluid row mb-5">
        <h1 class="text-tetiare-a display-1 text-center">RESTAURANTS TO VISIT</h1>
        <?php foreach ($model['pages'] as $page) { ?>
            <?php if ($page->getId() === 39) { ?>
                <p class="text-danger text-center fs-4" data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>"
                    data-body-markup="<?= $page->getBody_markup() ?>">
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
        <?php foreach ($model['restaurants'] as $restaurant) { ?>
            <section class="col-md-6 py-3 position-relative">
                <img role="button" data-bs-toggle="modal" data-bs-target="#reservationForm-<?= $restaurant->getId(); ?>"
                    src="img/png/yummy/restaurants/<?= $restaurant->getName(); ?>/cardbanner.png"
                    class="img-fluid border border-tetiare-a border-4" alt="Why Haarlem? image">
                <?php
                include __DIR__ . '/reservationform.php';
                ?>
                <p class="text-white position-absolute bottom-0 start-25 pb-4 display-3 text-uppercase font-druk ps-2">
                    <?= $restaurant->getName(); ?>
                </p>
                <p class="text-white position-absolute bottom-0 start-25 fs-3 ps-2 fst-italic">
                    <?= $restaurant->getLocation(); ?>
                </p>
                <p class="text-white position-absolute top-0 end-0 fs-3 pt-3 pe-4">
                    <?= $restaurant->getAdultPriceFormatted(); ?>
                </p>
            </section>
        <?php } ?>
    </section>
</section>
<?php
include __DIR__ . '/../modalwysiwyg.php';
?>
<?php
include __DIR__ . '/../footer.php';
?>