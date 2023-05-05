<div id="insertTicket-<?= $performance->getId(); ?>" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-light-purple">
            <div class="modal-header">
                <h5 class="modal-title fs-3 p-2">Place reservation for <?= $performance->getArtist()->getName(); ?> at <?= $performance->getVenue()->getName(); ?> from <?= $performance->getStartDateFormatted(); ?> to <?= $performance->getEndDateFormatted(); ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form class="modal-body bg-dark" method="POST" id="insertTicketForm-<?= $performance->getId(); ?>" action="/dance/insertticket">
              <input required type="hidden" name="performance_id" value="<?= $performance->getId(); ?>">
              <div class="row">
                <label class="text-light-purple col-md-6 fs-5" for="name">Number of people* (<?= $performance->getPriceFormatted(); ?> p.p.)</label>
                <input required class="form-control w-50" type="number" min="1" max="12" id="nr_of_people" name="nr_of_people" value="1">

                <input type="cancel" value="CANCEL" data-bs-dismiss="modal" class="col-md-6 btn btn-primary bg-dark text-white border-0 text-center mt-4">
                <input type="submit" value="PLACE RESERVATION" class="col-md-6 btn bg-light-purple text-white border-0 text-center mt-4">
              </div>
            </form>
          
        </div>
    </div>
</div>