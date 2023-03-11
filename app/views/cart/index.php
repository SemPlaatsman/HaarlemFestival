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
          <td><?= date_format($reservation->getDatetime(), 'd-m-Y H:i'); ?></td>
          <td>€<?= number_format($reservation->getTotalPrice(), 2); ?></td>
        </tr>
        <div class="modal fade" id="modalYummy<?= $reservation->getId(); ?>" tabindex="-1" aria-labelledby="modelYummyLabel<?= $reservation->getId(); ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content bg-primary-b text-tetiare-a">
              <div class="modal-header">
                <h5 class="modal-title" id="modelYummyLabel<?= $reservation->getId(); ?>">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?= $reservation->getRestaurantName(); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
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
          <td><?= date_format($ticketDance->getStartDate(), 'd-m-Y H:i'); ?></td>
          <td>€<?= number_format($ticketDance->getTotalPrice(), 2); ?></td>
        </tr>
        <div class="modal fade" id="modalDance<?= $ticketDance->getId(); ?>" tabindex="-1" aria-labelledby="modelDanceLabel<?= $ticketDance->getId(); ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content bg-primary-b text-tetiare-a">
              <div class="modal-header">
                <h5 class="modal-title" id="modelDanceLabel<?= $ticketDance->getId(); ?>">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?= $ticketDance->getVenueName(); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
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
          <td><?= date_format($ticketHistory->getDatetime(), 'd-m-Y H:i'); ?></td>
          <td>€<?= number_format($ticketHistory->getTotalPrice(), 2); ?></td>
        </tr>
        <div class="modal fade" id="modalHistory<?= $ticketHistory->getId(); ?>" tabindex="-1" aria-labelledby="modelHistoryLabel<?= $ticketHistory->getId(); ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content bg-primary-b text-tetiare-a">
              <div class="modal-header">
                <h5 class="modal-title" id="modelHistoryLabel<?= $ticketHistory->getId(); ?>">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?= $ticketHistory->getLanguage(); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </tbody>
  </table>
</section>
<section class="col-md-4 h-100 bg-primary-a">

</section>
<?php
    include __DIR__ . '/../footer.php';
?>