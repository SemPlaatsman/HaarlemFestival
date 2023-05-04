<?php

use Mollie\Api\Resources\Permission;

include __DIR__ . '/../header.php';
(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
// require_once __DIR__ . '/../../models/reservation.php';
// require_once __DIR__ . '/../../models/restaurant.php';
// require_once __DIR__ . '/../../models/ticketdance.php';
// require_once __DIR__ . '/../../models/performance.php';
// require_once __DIR__ . '/../../models/artist.php';
// require_once __DIR__ . '/../../models/venue.php';
// require_once __DIR__ . '/../../models/tickethistory.php';
// require_once __DIR__ . '/../../models/tour.php';
// $cart = unserialize($_SESSION['guest']->cart);
// $cart['reservations'][] = new Reservation(2, 1, 1, "Yummy", 10, 9, "", 1, new Restaurant(1, "piemol", 20, "location", 100, 50, 10), 100, 1, 0, "2023-03-26 18:00:00");
// $cart['ticketsDance'][] = new TicketDance(3, 1, 2, "DANCE", 250, 9, "", 1, 2);
// $cart['ticketsDance'][] = new TicketDance(4, 1, 2, "DANCE", 250, 9, "", 2,);
// $cart['ticketsHistory'][] = new TicketHistory(5, 1, 3, "History", 50, 9, "", 1,);
// $cart['ticketsHistory'][] = new TicketHistory(6, 1, 3, "History", 120, 9, "", 2,);
// $_SESSION['guest']->cart = serialize($cart);
// var_dump(unserialize($_SESSION['guest']->cart))

// require_once __DIR__ . '/../../services/cartservice.php';
// $cartService = new CartService();
// $reservation = new Reservation(null, null, 1, "Yummy!", 30, 9, "", null, new Restaurant(1, "De Ripper", 32, "Ripperdastraat 13-A, 2011 KG Haarlem", 35, 17.50, 10), 75, 3, 0, "2023-05-02 23:00:00");
// $ticketDance = new TicketDance(null, 1, 2, "DANCE!", 110, 9, "", null, new Performance(2, new Artist(null, null), new Venue(null, null, null, null), null, null, 110), 1);
// $ticketHistory = new TicketHistory(null, 1, 3, "A Stroll Through History", 35, 9, "", null, new Tour(3, null, null, null, null, null, null, null, null), 2);
// var_dump($cartService->addToCart($reservation, 2));
// var_dump($cartService->addToCart($ticketDance, 1));
// var_dump($cartService->addToCart($ticketHistory, 1));
?>

<div class="col-lg-6 mx-auto">
    <?php foreach ($model as $page) { ?>
        <?php if ($page->getId() === 1) { ?>
            <p class="lead mb-4" data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>"
                data-body-markup="<?= $page->getBody_markup() ?>">
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
            <p class="lead mb-4" data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>"
                data-body-markup="<?= $page->getBody_markup() ?>">
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