<?php
include __DIR__ . '/../header.php';

?>
<html>

<body>
    <?php

    new imageslidercontroller($this->title);
    new breadcrumbcontroller();

    ?>
    <div class="container">
        <div class="row  p-5">
            <div class="col">
                <h1>ABOUT THE JOPENKERK</h1>
                <?php foreach ($model as $page) { ?>
                    <?php if ($page->getId() === 11) { ?>
                        <p data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>">
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
            <div class="col">
                <div class="ratio ratio-16x9">
                    <img class="VisualContainer" src="<?php echo $this->basedir ?>1.png">
                </div>
            </div>
        </div>
        <div class="row bg-primary-b p-5">
            <div class="col">

                <div class="ratio ratio-16x9">
                    <img class="VisualContainer" src="<?php echo $this->basedir ?>2.png">
                </div>
            </div>
            <div class="col text-tetiare-a">
                <h1>HISTORY</h1>
                <?php foreach ($model as $page) { ?>
                    <?php if ($page->getId() === 12) { ?>
                        <p data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>">
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
        </div>
        <div class="row p-5">
            <div class="col">
                <h1>RESTAURANT</h1>
                <?php foreach ($model as $page) { ?>
                    <?php if ($page->getId() === 13) { ?>
                        <p data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>">
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
            <div class="col">
                <div class="ratio ratio-16x9">
                    <img class="VisualContainer" src="<?php echo $this->basedir ?>3.png">
                </div>
            </div>
        </div>
        <div class="row bg-primary-b p-5">
            <div class="col">
                <iframe class="VisualContainer"
                    src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d77943.54668169485!2d4.719607399949666!3d52.3752098505998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x47c5ef6c60e1e9fb%3A0x8ae15680b8a17e39!2sHaarlem!3m2!1d52.3873878!2d4.6462194!4m5!1s0x47c63fb5949a7755%3A0x6600fd4cb7c0af8d!2sAmsterdam!3m2!1d52.3675734!2d4.9041388999999995!5e0!3m2!1snl!2snl!4v1679507276881!5m2!1snl!2snl"
                    width="800" height="540" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col text-tetiare-a">
                <h1>THE JOPENKERK</h1>
                <?php foreach ($model as $page) { ?>
                    <?php if ($page->getId() === 14) { ?>
                        <p data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>">
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
        </div>
    </div>
    <?php
    include __DIR__ . '/../modalwysiwyg.php';
    ?>
</body>

</html>
<?php
include __DIR__ . '/../footer.php';
?>