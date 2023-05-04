<?php include __DIR__ . '/../header.php';
(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
?>
<div class="container-fluid bg-black">
    <div class="position-relative">
        <img src="img/png/dance/banner/Banner-Component.png" class="img-fluid w-100 h-100" alt="Banner Image">
        <h1 class="title-banner-acid-yellow text-acid-yellow position-absolute bottom-0 start-0 pb-5 mb-5">WELCOME
            TO DANCE!
        </h1>
        <h1 class="title-banner-light-purple text-light-purple position-absolute bottom-0 start-0 pb-5 mb-5 ms-5">
            WELCOME TO DANCE!
        </h1>
    </div>
    <div class="mx-auto">
        <h1 class="text-center text-light-purple mt-5 display-2">HAARLEM DANCE!</h1>
    </div>
    <div class="section-with-background-1">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <h2 class="text-center text-light-purple mt-5 m1-1 display-3">BEST NIGHT EVER!</h2>
                <?php foreach ($model['pages'] as $page) { ?>
                    <?php if ($page->getId() === 26) { ?>
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
            <div class="col-4">
                <img src="img/png/dance/other/Fireworkvenue-Union.png"></img>
            </div>
            <div class="col-2">
                <img src="img/png/dance/other/Concertheart-Eclipse.png" class="concert-heart-image"></img>
            </div>
            <div class="col-2 offset-md-1">
                <img src="img/png/dance/artists/Tiësto-Eclipse1.png" class="w-100"></img>
            </div>
            <div class="col-2 offset-md-0">
                <img src="img/png/dance/artists/Martin-Garrix-Eclipse1.png" class="position-up"></img>
            </div>
        </div>
    </div>
    <div class="section-with-background-2">
        <div class="row">
            <img src="img/png/dance/other/Afrojack-Component.png" class="col-md-2 mt-5"></img>
            <img src="img/png/dance/other/Hardwell-Component.png" class="col-md-2 offset-md-1 p-3 mb-5"></img>
            <div class="col-md-4 offset-md-2">
                <h2 class="text-center justify-content-center text-light-purple mt-5 display-3">GET HYPED!</h2>
                <?php foreach ($model['pages'] as $page) { ?>
                    <?php if ($page->getId() === 27) { ?>
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

        <h1 class="text-center text-light-purple mt-5 display-2">MEET THE TEAM</h1>
        <div class="row">
            <img src="img/png/dance/other/Martin-Component.png" class="col-md-2 p-3 mx-auto"></img>
            <img src="img/png/dance/other/Nicky-Component.png" class="col-md-2 p-3 mx-auto"></img>
            <img src="img/png/dance/other/Armin-Component.png" class="col-md-2 p-3 mx-auto"></img>
            <img src="img/png/dance/other/Afrojack-Component-2.png" class="col-md-2 p-3 mx-auto"></img>
            <img src="img/png/dance/other/Hardwell-Component-2.png" class="col-md-2 p-3 mx-auto"></img>
            <img src="img/png/dance/other/Tiësto-Component.png" class="col-md-2 p-3 mx-auto"></img>
        </div>

        <h1 class="text-center text-light-purple mt-5 display-2">SCHEDULE OF OUR TEAM</h1>
        <h2 class="text-center text-warning">NOTE: All-Access pass for this day €125,00, All-Access pass for Fri, Sat,
            Sun:
            €250,00.
        </h2>
        <div class="row container align-items-center text-center mx-auto mt-3">
            <table>
                <tbody>
                    <?php foreach ($model['performances'] as $performance): ?>
                        <tr class="border-top h3">
                            <td class="text-light-purple">
                                <h3>
                                    <?= $performance->getStartDate()->format('Y-m-d H:i') ?> -
                                    <?= $performance->getEndDate()->format('Y-m-d H:i') ?>
                                </h3>
                            </td>
                            <td class="text-dance-gradient">
                                <h3>
                                    <?= $performance->getVenue()->getName() ?>
                                </h3>
                            </td>
                            <td class="text-dance-gradient">
                                <?= $performance->getArtist()->getName() ?>
                            </td>
                            <td class="text-acid-yellow">
                                €
                                <?= $performance->getPrice() ?>.-
                            </td>
                            <td colspan="7" class="text-center">
                                <input type="submit" data-bs-toggle="modal" data-bs-target="#insertTicket"
                                    class="btn btn-primary insert-ticket bg-light-purple text-white border-0 text-center fs-5 m-2"
                                    value="ADD TO CART">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="text-white">*The capacity of the Club sessions is very limited. Availability for All-Access
                pas
                holders can not
                be
                guaranteed
                due to safety regulations.</p>
            <p class="text-white">** TiëstoWorld is a special session spanning his careers work. There will also be
                some
                special
                guests. </p>
        </div>
    </div>
    <?php
    include __DIR__ . '/../modalwysiwyg.php';
    ?>
</div>

<?php
include __DIR__ . '/../footer.php';
?>