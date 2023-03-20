<div id="reservationForm" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-primary-b text-white">
            <div class="modal-header">
                <h5 class="modal-title p-2">Buy tickets</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form class="modal-body bg-primary-b" method="post">
              <div class="row">
              <fieldset class="form-group p-2 col-md-6 gx-100">
                <label class="text-tetiare-a fs-5  col-form-label" for="name">Full name*</label>
                <input class="form-control" type="text" id="reservation_name" name="reservation_name">
              </fieldset>

              <fieldset class="form-group p-2 col-md-3 gx-100">
                <label class="text-tetiare-a fs-5 col-form-label" for="adults">Adults*</label>
                <input class="form-control" type="number" id="adults" name="adults" value="0">
              </fieldset>

              <fieldset class="form-group p-2 col-md-3 gx-100">
                <label class="text-tetiare-a fs-5 col-form-label" for="kids">Kids(<12)*</label>
                <input class="form-control" type="number" id="kids" name="kids" value="0">
              </fieldset>

              <fieldset class="form-group p-2 col-md-8 gx-100">
                <label class="text-tetiare-a fs-5 col-form-label" for="date">Reservation date*</label>
                <input class="form-control" type="date" id="date" name="date">
              </fieldset>

              <fieldset class="form-group p-2 col-md-4 gx-100">
                <label class="text-tetiare-a fs-5 col-form-label" for="time">Time*</label>
                <input class="form-control" type="time" id="time" name="time">
              </fieldset>

              <fieldset class="form-group p-2 col-md-8 gx-100">
                <label class="text-tetiare-a fs-5 col-form-label" for="email">Email*</label>
                <input class="form-control" type="email" id="email" name="email">
              </fieldset>

              <fieldset class="form-group p-2 col-md-4 gx-100">
                <label class="text-tetiare-a fs-5 col-form-label" for="phonenumber">Phone</label>
                <input class="form-control" type="phonenumber" id="phonenumber" name="phonenumber" placeholder="0612345678">
              </fieldset>

              <input type="cancel" value="cancel" class="btn btn-secondary col-md-4">
              <input type="submit" value="Submit" class="btn btn-primary col-md-8">
              </div>
            </form>
          
        </div>
    </div>
</div>