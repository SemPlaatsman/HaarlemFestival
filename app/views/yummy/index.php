<?php
include __DIR__ . '/../header.php';
var_dump($_POST);
?>

<section class="container-fluid px-0 bg-primary-b">
    <section class="position-relative">
        <img src="img/png/yummy/home/banner.png" class="img-fluid w-100 h-100" alt="Banner Image">
        <h1 class="banner-title text-tetiare-a position-absolute bottom-0 start-0 ms-5 col-md-3 text-end">
            YUMMY!
        </h1>
        <p class="banner-title-text position-absolute bottom-0 start-0 text-white col-md-7 fs-2 pb-2">
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
            <p class="fs-3">
                <?= $model['pages'][0]->getBody_markup(); ?>
            </p>
        </section>
    </section>
    <section class="col-md-8 mx-auto pt-5 container-fluid row mb-5">
        <h1 class="text-tetiare-a display-1 text-center">RESTAURANTS TO VISIT</h1>
        <p class="text-danger text-center fs-4">
            <?= $model['pages'][1]->getBody_markup(); ?>
        </p>
        <?php foreach($model['restaurants'] as $restaurant) { ?>
            <section class="col-md-6 py-3 position-relative">
                <img role="button" data-bs-toggle="modal" data-bs-target="#reservationForm-<?= $restaurant->getId(); ?>" src="img/png/yummy/restaurants/<?= $restaurant->getName(); ?>/cardbanner.png" class="img-fluid border border-tetiare-a border-4" alt="Why Haarlem? image">
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
include __DIR__ . '/../footer.php';
?>