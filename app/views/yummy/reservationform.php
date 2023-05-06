<div id="reservationForm-<?= $restaurant->getId(); ?>" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-primary-b text-white">
            <div class="modal-header">
                <h5 class="modal-title fs-3 p-2">Place reservation for <?= $restaurant->getName(); ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form class="modal-body bg-primary-b" method="POST" id="addReservationForm-<?= $restaurant->getId(); ?>" action="/yummy/addreservation">
              <input required type="hidden" name="restaurant_id" value="<?= $restaurant->getId(); ?>">
              <div class="row">
                <!-- <fieldset class="form-group p-2 col-md-6 gx-100">
                  <label class="text-tetiare-a fs-5  col-form-label" for="name">Full name*</label>
                  <input required class="form-control" type="text" id="reservation_name" name="reservation_name">
                </fieldset> -->

                <fieldset class="form-group p-2 col-md-6 gx-100">
                  <label class="text-tetiare-a fs-5 col-form-label" for="adults">Adults*</label>
                  <input required class="form-control" type="number" min="1" max="12" id="adults" name="adults" value="1">
                </fieldset>

                <fieldset class="form-group p-2 col-md-6 gx-100">
                  <label class="text-tetiare-a fs-5 col-form-label" for="kids">Kids(&lt12)*</label>
                  <input required class="form-control" type="number" min="0" max="12" id="kids" name="kids" value="0">
                </fieldset>

                <fieldset class="form-group p-2 col-md-8 gx-100">
                  <label class="text-tetiare-a fs-5 col-form-label" for="date">Reservation date*</label>
                  <input required class="form-control" type="date" id="date" name="date">
                </fieldset>

                <fieldset class="form-group p-2 col-md-4 gx-100">
                  <label class="text-tetiare-a fs-5 col-form-label" for="time">Time*</label>
                  <input required class="form-control" type="time" id="time" name="time">
                </fieldset>

                <!-- <fieldset class="form-group p-2 col-md-8 gx-100">
                  <label class="text-tetiare-a fs-5 col-form-label" for="email">Email*</label>
                  <input class="form-control" type="email" id="email" name="email">
                </fieldset>

                <fieldset class="form-group p-2 col-md-4 gx-100">
                  <label class="text-tetiare-a fs-5 col-form-label" for="phonenumber">Phone</label>
                  <input class="form-control" type="phonenumber" id="phonenumber" name="phonenumber" placeholder="0612345678">
                </fieldset> -->

                <input type="cancel" value="CANCEL" data-bs-dismiss="modal" class="col-md-6 btn btn-primary-b btn-bg-same mt-4">
                <input type="submit" value="PLACE RESERVATION" class="col-md-6 btn btn-tetiare-a mt-4">
              </div>
            </form>
          
        </div>
    </div>
</div>