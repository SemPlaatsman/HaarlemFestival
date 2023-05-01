<?php
include __DIR__ . '/../header.php';
(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
// require_once __DIR__ . '/../../models/reservation.php';
// require_once __DIR__ . '/../../models/restaurant.php';
// require_once __DIR__ . '/../../models/ticketdance.php';
// require_once __DIR__ . '/../../models/tickethistory.php';
// $cart = unserialize($_SESSION['guest']->cart);
// $cart['reservations'][] = new Reservation(2, 1, 1, "Yummy", 10, 9, "", 1, new Restaurant(1, "piemol", 20, "location", 100, 50, 10), 100, 1, 0, "2023-03-26 18:00:00");
// $cart['ticketsDance'][] = new TicketDance(3, 1, 2, "DANCE", 250, 9, "", 1, 2);
// $cart['ticketsDance'][] = new TicketDance(4, 1, 2, "DANCE", 250, 9, "", 2,);
// $cart['ticketsHistory'][] = new TicketHistory(5, 1, 3, "History", 50, 9, "", 1,);
// $cart['ticketsHistory'][] = new TicketHistory(6, 1, 3, "History", 120, 9, "", 2,);
// $_SESSION['guest']->cart = serialize($cart);
// var_dump(unserialize($_SESSION['guest']->cart))
?>


<div class="col-lg-6 mx-auto">
    <?php foreach ($model as $page) { ?>
        <?php if ($page->getId() === 1) { ?>
            <p class="lead mb-4" data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>">
                <?= $page->getBody_markup(); ?>
            </p>
            <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
                <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open Editor</button>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>

<div class="col-lg-6 mx-auto">
    <?php foreach ($model as $page) { ?>
        <?php if ($page->getId() === 2) { ?>
            <p class="lead mb-4" data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>">
                <?= $page->getBody_markup(); ?>
            </p>
            <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
                <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open
                    Editor</button>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
<?php
include __DIR__ . '/../modalwysiwyg.php';
?>
</div>

<?php
include __DIR__ . '/../footer.php';
?>