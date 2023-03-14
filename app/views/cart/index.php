<?php
    include __DIR__ . '/../header.php';
?>
<section class="col-md-8 h-100">
  <table class="table table-hover border-primary-b">
  <h1 class="w-100 text-center cart-header"><span class="hr-background bg-tetiare-a">YUMMY!</span></h1>
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
        <tr role="button" data-bs-toggle="modal" data-bs-target="#modalYummy<?= $reservation->getId(); ?>">
          <th scope="row" class="fw-normal"><?= $reservation->getRestaurant()->getName(); ?></th>
          <td><?= $reservation->getNrOfAdults(); ?></td>
          <td><?= $reservation->getNrOfKids(); ?></td>
          <td><?= $reservation->getDatetimeFormatted(); ?></td>
          <td><?= $reservation->getTotalPriceFormatted(); ?></td>
        </tr>
        <article class="modal fade" id="modalYummy<?= $reservation->getId(); ?>" tabindex="-1" aria-labelledby="modelYummyLabel<?= $reservation->getId(); ?>" aria-hidden="true">
          <section class="modal-dialog modal-xl">
            <article class="modal-content bg-primary-b text-tetiare-a">
              <form method="POST" id="yummyEditForm-<?= $reservation->getId(); ?>">
                <section class="modal-header border-tetiare-a">
                  <h5 class="modal-title" id="modelYummyLabel<?= $reservation->getId(); ?>">RESERVATION DETAILS</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </section>
                <section class="modal-body">
                  <input required type="hidden" name="editId" value="<?= $reservation->getId(); ?>">
                  <dl class="row">
                    <dt class="text-sm-start text-md-end col-md-2">Restaurant:</dt>
                    <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getRestaurant()->getName(); ?></dd>
                    <dt class="text-sm-start text-md-end col-md-2">Location:</dt>
                    <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getRestaurant()->getLocation(); ?></dd>
                    <hr class="form-hr">
                    <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $reservation->getRestaurant()->getAdultPriceFormatted(); ?> p.p.">Adults:</u></dt>
                    <dd class="text-sm-start text-md-start col-md-4"><input required class="border border-2 border-tetiare-a" type="number" min="0" max="8" name="editNrOfAdults" value="<?= $reservation->getNrOfAdults(); ?>"></dd>
                    <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $reservation->getRestaurant()->getKidsPriceFormatted(); ?> p.p.">Kids:</u></dt>
                    <dd class="text-sm-start text-md-start col-md-4"><input required class="border border-2 border-tetiare-a" type="number" min="0" max="8" name="editNrOfKids" value="<?= $reservation->getNrOfKids(); ?>"></dd>
                    <dt class="text-sm-start text-md-end col-md-2">Date & time:</dt>
                    <dd class="text-sm-start text-md-start col-md-10"><input required class="border border-2 border-tetiare-a" type="datetime-local" name="editDatetime" value="<?= date_format($reservation->getDatetime(), 'Y-m-d\TH:i'); ?>"></dd>
                    <hr class="form-hr">
                    <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="This fee is subtracted from the final check at <?= $reservation->getRestaurant()->getName(); ?>!">Fee (p.p.):</u></dt>
                    <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getRestaurant()->getReservationFeeFormatted(); ?></dd>
                    <dt class="text-sm-start text-md-end col-md-2">VAT:</dt>
                    <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getVATFormatted(); ?></dd>
                    <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $reservation->getNrOfAdults(); ?> * <?= $reservation->getRestaurant()->getAdultPrice(); ?> + <?= $reservation->getNrOfKids(); ?> * <?= $reservation->getRestaurant()->getKidsPrice(); ?> = <?= "€ " . number_format($reservation->getFinalCheck() + $reservation->getTotalPrice(), 2); ?>&#013;<?= ($reservation->getFinalCheck() + $reservation->getTotalPrice()); ?> - <?= $reservation->getTotalPrice(); ?> = <?= $reservation->getFinalCheckFormatted(); ?>">Final check:</u></dt>
                    <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getFinalCheckFormatted(); ?></dd>
                    <dt class="text-sm-start text-md-end col-md-2"><u data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($reservation->getNrOfAdults() + $reservation->getNrOfKids()); ?> * <?= $reservation->getRestaurant()->getReservationFee(); ?> = <?= $reservation->getTotalPriceFormatted(); ?>">Total price:</u></dt>
                    <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getTotalPriceFormatted(); ?></dd>
                  </dl>
                </section>
                <section class="modal-footer border-tetiare-a">
                  <button type="button" class="btn btn-primary-b btn-bg-same" data-bs-dismiss="modal">CLOSE</button>
                  <input type="submit" class="btn btn-tetiare-a" value="SAVE CHANGES">
                </section>
              </form>
            </article>
          </section>
        </article>
      <?php } ?>
    </tbody>
  </table>

  <table class="table table-hover border-primary-b">
    <h1 class="w-100 text-center cart-header"><span class="hr-background bg-tetiare-a">DANCE!</span></h1>
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
        <tr role="button" data-bs-toggle="modal" data-bs-target="#modalDance<?= $ticketDance->getId(); ?>">
          <th scope="row" class="fw-normal"><?= $ticketDance->getArtistName(); ?></th>
          <td><?= $ticketDance->getVenueName(); ?></td>
          <td><?= $ticketDance->getNrOfPeople(); ?></td>
          <td><?= $ticketDance->getStartDateFormatted(); ?></td>
          <td><?= $ticketDance->getTotalPriceFormatted(); ?></td>
        </tr>
        <article class="modal fade" id="modalDance<?= $ticketDance->getId(); ?>" tabindex="-2" aria-labelledby="modelDanceLabel<?= $ticketDance->getId(); ?>" aria-hidden="true">
          <section class="modal-dialog">
            <article class="modal-content bg-primary-b text-tetiare-a">
              <section class="modal-header">
                <h5 class="modal-title" id="modelDanceLabel<?= $ticketDance->getId(); ?>">TICKET DANCE DETAILS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </section>
              <section class="modal-body">
                <form action="POST" id="danceEditForm<?= $ticketDance->getId(); ?>">

                </form>
              </section>
              <section class="modal-footer">
                <button type="button" class="btn btn-primary-b btn-bg-same" data-bs-dismiss="modal">CLOSE</button>
                <button type="button" type="submit" form="danceEditForm<?= $ticketDance->getId(); ?>" class="btn btn-tetiare-a">SAVE CHANGES</button>
              </section>
            </article>
          </section>
        </article>
      <?php } ?>
    </tbody>
  </table>

  <table class="table table-hover border-primary-b">
  <h1 class="w-100 text-center cart-header"><span class="hr-background bg-tetiare-a">A STROLL THROUGH HISTORY</span></h1>
    <thead>
      <tr>
      <th scope="col">Language</th>
      <th scope="col">Date</th>
      <th scope="col">Total price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($model['ticketsHistory'] as $ticketHistory) { ?>
        <tr role="button" data-bs-toggle="modal" data-bs-target="#modalHistory<?= $ticketHistory->getId(); ?>">
          <th scope="row" class="fw-normal"><?= $ticketHistory->getLanguage(); ?></th>
          <td><?= $ticketHistory->getDatetimeFormatted(); ?></td>
          <td><?= $ticketHistory->getTotalPriceFormatted(); ?></td>
        </tr>
        <article class="modal fade" id="modalHistory<?= $ticketHistory->getId(); ?>" tabindex="-3" aria-labelledby="modelHistoryLabel<?= $ticketHistory->getId(); ?>" aria-hidden="true">
          <section class="modal-dialog">
            <article class="modal-content bg-primary-b text-tetiare-a">
              <section class="modal-header">
                <h5 class="modal-title" id="modelHistoryLabel<?= $ticketHistory->getId(); ?>">TICKET HISTORY DETAILS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </section>
              <section class="modal-body">
                <form action="POST" id="historyEditForm<?= $ticketHistory->getId(); ?>">

                </form>
              </section>
              <section class="modal-footer">
                <button type="button" class="btn btn-primary-b btn-bg-same" data-bs-dismiss="modal">CLOSE</button>
                <button type="button" type="submit" form="historyEditForm<?= $ticketHistory->getId(); ?>" class="btn btn-tetiare-a">SAVE CHANGES</button>
              </section>
            </article>
          </section>
        </article>
      <?php } ?>
    </tbody>
  </table>
</section>
<section class="col-md-4 h-100 bg-primary-a">

</section>
<?php
    include __DIR__ . '/../footer.php';
?>