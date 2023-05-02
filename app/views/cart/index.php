<?php
    include __DIR__ . '/../header.php';
?>
<section class="col-md-8 h-100">
  <?php if (isset($_GET['cart'])) { ?>
    <h1 class="text-center">SHARED SHOPPING CART <span class="font-roboto">(</span><a href="/cart" class="text-primary-b">RETURN TO OWN CART</a><span class="font-roboto">)</span>:</h1>
  <?php } ?>
  <table class="table table-hover border-primary-b">
  <a href="/yummy" class="text-decoration-none text-primary-b"><h1 class="w-100 text-center cart-header"><span class="hr-background bg-tetiare-a">YUMMY!</span></h1></a>
    <thead>
      <tr>
        <th scope="col">Restaurant</th>
        <th scope="col">Nr of adults</th>
        <th scope="col">Nr of kids</th>
        <th scope="col">Date</th>
        <th scope="col">Total price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($model['reservations'] as $reservation) { ?>
        <tr role="button" data-bs-toggle="modal" data-bs-target="#modalYummy-<?= $reservation->getId(); ?>">
          <th scope="row" class="fw-normal"><?= $reservation->getRestaurant()->getName(); ?></th>
          <td><?= $reservation->getNrOfAdults(); ?></td>
          <td><?= $reservation->getNrOfKids(); ?></td>
          <td><?= $reservation->getDatetimeFormatted(); ?></td>
          <td><?= $reservation->getTotalPriceFormatted(); ?></td>
        </tr>
        <article class="modal fade" id="modalYummy-<?= $reservation->getId(); ?>" tabindex="-1" aria-labelledby="modelYummyLabel-<?= $reservation->getId(); ?>" aria-hidden="true">
          <section class="modal-dialog modal-xl">
            <article class="modal-content bg-primary-b text-tetiare-a">
              <?php if (isset($_GET['cart'])) { ?>
                <!-- <form role="form" method="POST" id="addYummyForm-<?= $reservation->getId(); ?>"></form> -->
              <?php } else { ?>
                <form role="form" method="POST" id="editYummyForm-<?= $reservation->getId(); ?>" action="/cart/reservation/edit"></form>
                <form role="form" method="POST" id="deleteYummyForm-<?= $reservation->getId(); ?>" action="/cart/item/delete" onsubmit='return confirm("Are you sure you wish to remove a reservation for <?= $reservation->getRestaurant()->getName(); ?> at <?= $reservation->getDatetimeFormatted(); ?>?");'></form>
              <?php } ?>
              <section class="modal-header border-tetiare-a">
                <h5 class="modal-title" id="modelYummyLabel-<?= $reservation->getId(); ?>">RESERVATION DETAILS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </section>
              <section class="modal-body">
                <?php if (isset($_GET['cart'])) { ?>
                  <input required type="hidden" name="addFromLinkId" form="addYummyForm-<?= $reservation->getId(); ?>" value="<?= $reservation->getId(); ?>">
                <?php } else { ?>
                  <input required type="hidden" name="editYummyId" form="editYummyForm-<?= $reservation->getId(); ?>" value="<?= $reservation->getId(); ?>">
                  <input required type="hidden" name="deleteItemId" form="deleteYummyForm-<?= $reservation->getId(); ?>" value="<?= $reservation->getItemId(); ?>">
                <?php } ?>
                <dl class="row mb-0">
                  <dt class="text-sm-start text-md-end col-md-2">Restaurant:</dt>
                  <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getRestaurant()->getName(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Location:</dt>
                  <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getRestaurant()->getLocation(); ?></dd>
                  <hr class="form-hr">
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $reservation->getRestaurant()->getAdultPriceFormatted(); ?> p.p.">Adults:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><input required <?= isset($_GET['cart']) ? "readonly" : null ?> class="border border-2 border-tetiare-a" type="number" min="0" max="8" name="editYummyNrOfAdults" form="editYummyForm-<?= $reservation->getId(); ?>" value="<?= $reservation->getNrOfAdults(); ?>"></dd>
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $reservation->getRestaurant()->getKidsPriceFormatted(); ?> p.p.">Kids:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><input required <?= isset($_GET['cart']) ? "readonly" : null ?> class="border border-2 border-tetiare-a" type="number" min="0" max="8" name="editYummyNrOfKids" form="editYummyForm-<?= $reservation->getId(); ?>" value="<?= $reservation->getNrOfKids(); ?>"></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Date & time:</dt>
                  <dd class="text-sm-start text-md-start col-md-10"><input required <?= isset($_GET['cart']) ? "readonly" : null ?> class="border border-2 border-tetiare-a" type="datetime-local" name="editYummyDatetime" form="editYummyForm-<?= $reservation->getId(); ?>" value="<?= date_format($reservation->getDatetime(), 'Y-m-d\TH:i'); ?>"></dd>
                  <hr class="form-hr">
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="This fee is subtracted from the final check at <?= $reservation->getRestaurant()->getName(); ?>!">Fee (p.p.):</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getRestaurant()->getReservationFeeFormatted(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">VAT:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getVATFormatted(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<?= $reservation->getNrOfAdults(); ?> * <?= $reservation->getRestaurant()->getAdultPrice(); ?> + <?= $reservation->getNrOfKids(); ?> * <?= $reservation->getRestaurant()->getKidsPrice(); ?> = <?= "€ " . number_format($reservation->getFinalCheck() + $reservation->getTotalPrice(), 2); ?><br><?= ($reservation->getFinalCheck() + $reservation->getTotalPrice()); ?> - <?= $reservation->getTotalPrice(); ?> = <?= $reservation->getFinalCheckFormatted(); ?>">Final check:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getFinalCheckFormatted(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($reservation->getNrOfAdults() + $reservation->getNrOfKids()); ?> * <?= $reservation->getRestaurant()->getReservationFee(); ?> = <?= $reservation->getTotalPriceFormatted(); ?>">Total price:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getTotalPriceFormatted(); ?></dd>
                </dl>
              </section>
              <section class="modal-footer border-tetiare-a">
                <?php if (!isset($_GET['cart'])) { ?>
                  <button type="submit" class="btn btn-primary-b btn-bg-same me-auto" form="deleteYummyForm-<?= $reservation->getId(); ?>"><i class="fa-solid fa-trash-can fs-3"></i></button>
                <?php } ?>
                <button type="button" class="btn btn-primary-b btn-bg-same" data-bs-dismiss="modal">CLOSE</button>
                <?php if (!isset($_GET['cart'])) { ?>
                  <button type="submit" form="editYummyForm-<?= $reservation->getId(); ?>" class="btn btn-tetiare-a">SAVE CHANGES</button>
                <?php } else { ?>
                  <!-- <button type="submit" form="addYummyForm-<?= $reservation->getId(); ?>" class="btn btn-tetiare-a">ADD TO OWN CART</button> -->
                <?php } ?>
              </section>
            </article>
          </section>
        </article>
      <?php } ?>
    </tbody>
  </table>

  <table class="table table-hover border-primary-b">
    <a href="/dance" class="text-decoration-none text-primary-b"><h1 class="w-100 text-center cart-header"><span class="hr-background bg-tetiare-a">DANCE!</span></h1></a>
    <thead>
      <tr>
        <th scope="col">Artist</th>
        <th scope="col">Venue</th>
        <th scope="col">Nr of people</th>
        <th scope="col">Date</th>
        <th scope="col">Total price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($model['ticketsDance'] as $ticketDance) { ?>
        <tr role="button" data-bs-toggle="modal" data-bs-target="#modalDance-<?= $ticketDance->getId(); ?>">
          <th scope="row" class="fw-normal"><?= $ticketDance->getPerformance()->getArtist()->getName(); ?></th>
          <td><?= $ticketDance->getPerformance()->getVenue()->getName(); ?></td>
          <td><?= $ticketDance->getNrOfPeople(); ?></td>
          <td><?= $ticketDance->getPerformance()->getStartDateFormatted(); ?></td>
          <td><?= $ticketDance->getTotalPriceFormatted(); ?></td>
        </tr>
        <article class="modal fade" id="modalDance-<?= $ticketDance->getId(); ?>" tabindex="-2" aria-labelledby="modelDanceLabel-<?= $ticketDance->getId(); ?>" aria-hidden="true">
          <section class="modal-dialog modal-xl">
            <article class="modal-content bg-primary-b text-tetiare-a">
            <?php if (isset($_GET['cart'])) { ?>
              <!-- <form role="form" method="POST" id="addDanceForm-<?= $ticketDance->getId(); ?>"></form> -->
            <?php } else { ?>
              <form role="form" method="POST" id="editDanceForm-<?= $ticketDance->getId(); ?>" action="/cart/dance/edit"></form>
              <form role="form" method="POST" id="deleteDanceForm-<?= $ticketDance->getId(); ?>" action="/cart/item/delete" onsubmit='return confirm("Are you sure you wish to remove your tickets for <?= $ticketDance->getPerformance()->getArtist()->getName(); ?> at <?= $ticketDance->getPerformance()->getStartDateFormatted(); ?>?");'></form>
            <?php } ?>
              <section class="modal-header border-tetiare-a">
                <h5 class="modal-title" id="modelDanceLabel-<?= $ticketDance->getId(); ?>">TICKET DANCE DETAILS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </section>
              <section class="modal-body">
                <?php if (isset($_GET['cart'])) { ?>
                  <input required type="hidden" name="addFromLinkId" form="addDanceForm-<?= $ticketDance->getId(); ?>" value="<?= $ticketDance->getId(); ?>">
                <?php } else { ?>
                  <input required type="hidden" name="editDanceId" form="editDanceForm-<?= $ticketDance->getId(); ?>" value="<?= $ticketDance->getId(); ?>">
                  <input required type="hidden" name="deleteItemId" form="deleteDanceForm-<?= $ticketDance->getId(); ?>" value="<?= $ticketDance->getItemId(); ?>">
                <?php } ?>
                <dl class="row mb-0">
                  <dt class="text-sm-start text-md-end col-md-2">Artist:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketDance->getPerformance()->getArtist()->getName(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Venue:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketDance->getPerformance()->getVenue()->getName(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Location:</dt>
                  <dd class="text-sm-start text-md-start col-md-10"><?= $ticketDance->getPerformance()->getVenue()->getLocation(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Start date & time:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketDance->getPerformance()->getStartDateFormatted(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">End date & time:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketDance->getPerformance()->getEndDateFormatted(); ?></dd>
                  <hr class="form-hr">
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $ticketDance->getPerformance()->getPriceFormatted(); ?> p.p.">Nr of people:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><input required <?= isset($_GET['cart']) ? "readonly" : null ?> class="border border-2 border-tetiare-a" type="number" min="0" max="24" name="editDanceNrOfPeople" form="editDanceForm-<?= $ticketDance->getId(); ?>" value="<?= $ticketDance->getNrOfPeople(); ?>"></dd>
                  <dt class="text-sm-start text-md-end col-md-2">VAT:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketDance->getVATFormatted(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $ticketDance->getNrOfPeople(); ?> * <?= $ticketDance->getPerformance()->getPrice(); ?> = <?= $ticketDance->getTotalPriceFormatted(); ?>">Total price:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-10"><?= $ticketDance->getTotalPriceFormatted(); ?></dd>
                </dl>
              </section>
              <section class="modal-footer border-tetiare-a">
                <?php if (!isset($_GET['cart'])) { ?>
                  <button type="submit" class="btn btn-primary-b btn-bg-same me-auto" form="deleteDanceForm-<?= $ticketDance->getId(); ?>"><i class="fa-solid fa-trash-can fs-3"></i></button>
                <?php } ?>
                <button type="button" class="btn btn-primary-b btn-bg-same" data-bs-dismiss="modal">CLOSE</button>
                <?php if (!isset($_GET['cart'])) { ?>
                  <button type="submit" form="editDanceForm-<?= $ticketDance->getId(); ?>" class="btn btn-tetiare-a">SAVE CHANGES</button>
                <?php } else { ?>
                  <!-- <button type="submit" form="addDanceForm-<?= $ticketDance->getId(); ?>" class="btn btn-tetiare-a">ADD TO OWN CART</button> -->
                <?php } ?>
              </section>
            </article>
          </section>
        </article>
      <?php } ?>
    </tbody>
  </table>

  <table class="table table-hover border-primary-b">
  <a href="/history" class="text-decoration-none text-primary-b"><h1 class="w-100 text-center cart-header"><span class="hr-background bg-tetiare-a">A STROLL THROUGH HISTORY</span></h1></a>
    <thead>
      <tr>
        <th scope="col">Gathering location</th>
        <th scope="col">Date</th>
        <th scope="col">Language</th>
        <th scope="col">Total price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($model['ticketsHistory'] as $ticketHistory) { ?>
        <tr role="button" data-bs-toggle="modal" data-bs-target="#modalHistory-<?= $ticketHistory->getId(); ?>">
          <th scope="row" class="fw-normal"><?= $ticketHistory->getTour()->getGatheringLocation(); ?></th>
          <td><?= $ticketHistory->getTour()->getDatetimeFormatted(); ?></td>
          <td><?= $ticketHistory->getTour()->getLanguage(); ?></td>
          <td><?= $ticketHistory->getTotalPriceFormatted(); ?></td>
        </tr>
        <article class="modal fade" id="modalHistory-<?= $ticketHistory->getId(); ?>" tabindex="-3" aria-labelledby="modelHistoryLabel-<?= $ticketHistory->getId(); ?>" aria-hidden="true">
          <section class="modal-dialog modal-xl">
            <article class="modal-content bg-primary-b text-tetiare-a">
              <?php if (isset($_GET['cart'])) { ?>
                <!-- <form role="form" method="POST" id="addHistoryForm-<?= $ticketHistory->getId(); ?>"></form> -->
              <?php } else { ?>
                <form role="form" method="POST" id="editHistoryForm-<?= $ticketHistory->getId(); ?>" action="/cart/history/edit"></form>
                <form role="form" method="POST" id="deleteHistoryForm-<?= $ticketHistory->getId(); ?>" action="/cart/item/delete" onsubmit='return confirm("Are you sure you wish to delete your tour tickets for <?= $ticketHistory->getNrOfPeople(); ?> people in <?= $ticketHistory->getTour()->getLanguage(); ?>?");'></form>
              <?php } ?>
              <section class="modal-header border-tetiare-a">
                <h5 class="modal-title" id="modelHistoryLabel-<?= $ticketHistory->getId(); ?>">TICKET HISTORY DETAILS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </section>
              <section class="modal-body">
                <?php if (isset($_GET['cart'])) { ?>
                  <input required type="hidden" name="addFromLinkId" form="addHistoryForm-<?= $ticketHistory->getId(); ?>" value="<?= $ticketHistory->getId(); ?>">
                <?php } else { ?>
                  <input required type="hidden" name="editHistoryId" form="editHistoryForm-<?= $ticketHistory->getId(); ?>" value="<?= $ticketHistory->getId(); ?>">
                  <input required type="hidden" name="deleteItemId" form="deleteHistoryForm-<?= $ticketHistory->getId(); ?>" value="<?= $ticketHistory->getItemId(); ?>"> 
                <?php } ?>
                <dl class="row mb-0">
                  <dt class="text-sm-start text-md-end col-md-2">Gathering location:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketHistory->getTour()->getGatheringLocation(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Date & time:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketHistory->getTour()->getDatetimeFormatted(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Employee:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketHistory->getTour()->getEmployeeName(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2">Language:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketHistory->getTour()->getLanguage(); ?></dd>
                  <hr class="form-hr">
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="Individual price: <?= $ticketHistory->getTour()->getPriceFormatted(); ?><br>Group price: <?= $ticketHistory->getTour()->getGroupPriceFormatted(); ?>">Nr of people:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><input required <?= isset($_GET['cart']) ? "readonly" : null ?> class="border border-2 border-tetiare-a" type="number" name="editHistoryNrOfPeople" min="0" max="12" form="editHistoryForm-<?= $ticketHistory->getId(); ?>" value="<?= $ticketHistory->getNrOfPeople(); ?>"></dd>
                  <dt class="text-sm-start text-md-end col-md-2">VAT:</dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketHistory->getVATFormatted(); ?></dd>
                  <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $ticketHistory->getNrOfPeople() % 4; ?> * <?= $ticketHistory->getTour()->getPrice(); ?> + <?= floor($ticketHistory->getNrOfPeople() / 4); ?> * <?= $ticketHistory->getTour()->getGroupPrice(); ?> = <?= $ticketHistory->getTotalPriceFormatted(); ?>">Total price:</u></dt>
                  <dd class="text-sm-start text-md-start col-md-4"><?= $ticketHistory->getTotalPriceFormatted(); ?></dd>
                </dl>
              </section>
              <section class="modal-footer border-tetiare-a">
                <?php if (!isset($_GET['cart'])) { ?>
                  <button type="submit" class="btn btn-primary-b btn-bg-same me-auto" form="deleteHistoryForm-<?= $ticketHistory->getId(); ?>"><i class="fa-solid fa-trash-can fs-3"></i></button>
                <?php } ?>
                <button type="button" class="btn btn-primary-b btn-bg-same" data-bs-dismiss="modal">CLOSE</button>
                <?php if (!isset($_GET['cart'])) { ?>
                  <button type="submit" form="editHistoryForm-<?= $ticketHistory->getId(); ?>" class="btn btn-tetiare-a">SAVE CHANGES</button>
                <?php } else { ?>
                  <!-- <button type="submit" form="addHistoryForm-<?= $ticketHistory->getId(); ?>" class="btn btn-tetiare-a">ADD TO OWN CART</button> -->
                <?php }?>
              </section>
            </article>
          </section>
        </article>
      <?php } ?>
    </tbody>
  </table>
</section>
<section class="col-md-4 h-100 bg-primary-a fs-2 font-druktext d-flex align-items-start flex-column">
  <dl class="row">
    <dt class="col-md-8"><?= count($model['reservations']); ?>x YUMMY!</dt>
    <dd class="col-md-4"><span class="font-roboto">€ </span><?= number_format($model['paymentTotals']['reservations'] ?? 0, 2) ?></dd>
    <dt class="col-md-8"><?= count($model['ticketsDance']); ?>x DANCE!</dt>
    <dd class="col-md-4"><span class="font-roboto">€ </span><?= number_format($model['paymentTotals']['ticketsDance'] ?? 0, 2) ?></dd>
    <dt class="col-md-8"><?= count($model['ticketsHistory']); ?>x A STROLL THROUGH HISTORY</dt>
    <dd class="col-md-4"><span class="font-roboto">€ </span><?= number_format($model['paymentTotals']['ticketsHistory'] ?? 0, 2) ?></dd>
    <hr class="form-hr m-0 p-0 my-3">
    <dt class="col-md-8">TOTAL</dt>
    <dd class="col-md-4"><span class="font-roboto">€ </span><?= number_format(($model['paymentTotals']['reservations'] ?? 0) + ($model['paymentTotals']['ticketsDance'] ?? 0) + ($model['paymentTotals']['ticketsHistory'] ?? 0), 2) ?></dd>
  </dl>
  <section class="row justify-content-around mt-auto mb-2 col-md-12 ps-4">
    <button class="btn rounded-0 btn-tetiare-a fs-5" id="copyCartBtn" onclick="copyCartLink('http://localhost/cart?cart=<?= $model['link']; ?>')">COPY LINK TO CLIPBOARD <i class="fa-solid fa-link"></i></button>
    <?php if (!isset($_GET['cart'])) { ?>
      <?php (session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
      if (isset($_SESSION['user'])) { if ((count($model['reservations']) + count($model['ticketsDance']) + count($model['ticketsHistory'])) > 0) { ?>
        <form method="POST" id="checkoutForm" class="p-0">
          <button type="submit" class="btn btn-primary-b rounded-0 fs-3 text-tetiare-a col-md-12" name="mollie">GO TO CHECKOUT <i class="fa-solid fa-arrow-right fa-md hover-beat"></i></button>
        </form>
      <?php } else {?>
        <button class="btn btn-primary-b rounded-0 fs-3 text-tetiare-a col-md-11 pe-none">NO ITEMS IN YOUR CART!</button>
      <?php } ?>
      <?php } else { ?>
        <p class="text-center text-primary-b font-druktext">Payment requires an account!</p>
        <a href="/register" class="btn btn-primary-b rounded-0 fs-3 text-tetiare-a col-md-5">REGISTER</a>
        <a href="/login" class="btn btn-primary-b rounded-0 fs-3 text-tetiare-a col-md-5">LOGIN</a>
      <?php } ?>
    <?php } ?>
  </section>
</section>
<?php
    include __DIR__ . '/../footer.php';
?>