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
        <tr data-bs-toggle="modal" data-bs-target="#modalYummy<?= $reservation->getId(); ?>">
          <th scope="row" class="fw-normal"><?= $reservation->getRestaurantName(); ?></th>
          <td><?= $reservation->getNrOfAdults(); ?></td>
          <td><?= $reservation->getNrOfKids(); ?></td>
          <td><?= $reservation->getDatetimeFormatted(); ?></td>
          <td><?= $reservation->getTotalPriceFormatted(); ?></td>
        </tr>
        <article class="modal fade" id="modalYummy<?= $reservation->getId(); ?>" tabindex="-1" aria-labelledby="modelYummyLabel<?= $reservation->getId(); ?>" aria-hidden="true">
          <section class="modal-dialog modal-xl">
            <article class="modal-content bg-primary-b text-tetiare-a">
              <section class="modal-header border-tetiare-a">
                <h5 class="modal-title" id="modelYummyLabel<?= $reservation->getId(); ?>">RESERVATION DETAILS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </section>
              <section class="modal-body">
                <form action="POST" id="yummyEditForm<?= $reservation->getId(); ?>">
                  <input type="hidden" name="editId" value="<?= $reservation->getId(); ?>">
                  <dl class="row">
                    <dt class="text-sm-start text-md-end col-md-2">Restaurant:</dt>
                    <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getRestaurantName(); ?></dd>
                    <dt class="text-sm-start text-md-end col-md-2">Location:</dt>
                    <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getRestaurantLocation(); ?></dd>
                    <hr class="form-hr">
                    <dt class="text-sm-start text-md-end col-md-2">Adults:</dt>
                    <dd class="text-sm-start text-md-start col-md-4"><input class="border border-2 border-tetiare-a" type="number" min="0" max="8" name="editNrOfAdults" value="<?= $reservation->getNrOfAdults(); ?>" form="yummyEditForm<?= $reservation->getId(); ?>"></dd>
                    <dt class="text-sm-start text-md-end col-md-2">Kids:</dt>
                    <dd class="text-sm-start text-md-start col-md-4"><input class="border border-2 border-tetiare-a" type="number" min="0" max="8" name="editNrOfKids" value="<?= $reservation->getNrOfKids(); ?>" form="yummyEditForm<?= $reservation->getId(); ?>"></dd>
                    <dt class="text-sm-start text-md-end col-md-2">Date & time:</dt>
                    <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getDatetimeFormatted(); ?></dd>
                    <hr class="form-hr">
                    <dt class="text-sm-start text-md-end col-md-2">Total price:</dt>
                    <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getTotalPriceFormatted(); ?></dd>
                    <dt class="text-sm-start text-md-end col-md-2">VAT:</dt>
                    <dd class="text-sm-start text-md-start col-md-4"><?= $reservation->getVATFormatted(); ?></dd>
                    <dt class="text-sm-start text-md-end col-md-2"><span data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip!">Final check:</span></dt>
                    <dd class="text-sm-start text-md-start col-md-10"><?= $reservation->getFinalCheckFormatted(); ?></dd>
                  </dl>
                </form>
              </section>
              <section class="modal-footer border-tetiare-a">
                <button type="button" class="btn btn-primary-b btn-bg-same" data-bs-dismiss="modal">CLOSE</button>
                <button type="button" type="submit" form="yummyEditForm<?= $reservation->getId(); ?>" class="btn btn-tetiare-a">SAVE CHANGES</button>
              </section>
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
        <tr data-bs-toggle="modal" data-bs-target="#modalDance<?= $ticketDance->getId(); ?>">
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
        <tr data-bs-toggle="modal" data-bs-target="#modalHistory<?= $ticketHistory->getId(); ?>">
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