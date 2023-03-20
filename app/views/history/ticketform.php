<head>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</head>
<div id="historyTicketForm" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-primary-b text-white">
            <div class="modal-header">
                <h5 class="modal-title p-2">Buy tickets</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form class="modal-body" method="post">
              <div class="row">
              <fieldset class="form-group p-2 col-md-6 gx-100">
                <label class="text-tetiare-a fs-5  col-form-label" for="language">Language</label>
                <select class="form-control" id="language" name="language">
                  <option value="english">English</option>
                  <option value="dutch">Dutch</option>
                  <option value="chinese">Chinese</option>
                </select>
              </fieldset>

              <fieldset class="form-group p-2 col-md-6 gx-100">
                <label class="text-tetiare-a fs-5 col-form-label" for="date">Date</label>
                <input class="form-control" type="date" id="date" name="date">
              </fieldset>

              <fieldset class="form-group p-2 col-md-6">
                <label class="text-tetiare-a fs-5 col-form-label" for="time">Time</label>
                <select class="form-control" class="col-md-4" id="time" name="time">
                  <option value="10:00-13:30">10:00-13:30</option>
                  <option value="13:00-15:30">13:00-15:30</option>
                  <option value="16:00-18:30">16:00-18:30</option>
                </select>
              </fieldset> 

              <fieldset class="form-group row p-2 col-md-12">
                <div class="col-md-3">
                  <label class="text-tetiare-a fs-5 col-form-label" for="single_tickets">Single Ticket</label>
                </div>
                <div class="col-md-2 offset-md-1">
                  <label class="text-tetiare-a fs-5 col-form-label text-right" for="single_tickets">€ 17,50</label>
                </div>
                <div class="col-md-4 offset-md-2">
                  <input class="form-control" type="number" id="single_tickets" name="single_tickets" min="0" value="0">
                </div>
                
              </fieldset>

              <fieldset class="form-group row p-2 col-md-12">
                <div class="col-md-3">
                  <label class="text-tetiare-a fs-5 col-form-label" for="family_tickets">Family Ticket</label>
                </div>
                <div class="col-md-2 offset-md-1">
                  <label class="text-tetiare-a fs-5 col-form-label text-right" for="single_tickets">€ 60,00</label>
                </div>
                <div class="col-md-4 offset-md-2">
                  <input class="form-control" type="number" id="family_tickets" name="family_tickets" min="0" value="0">
                </div>
              </fieldset>

              <input type="cancel" value="Cancel" class="btn btn-secondary col-md-4" data-bs-dismiss="modal">
              <input type="submit" name="submit" value="Submit" class="btn btn-primary col-md-8">
              </div>
            </form>
          
        </div>
    </div>
</div>

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

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservationForm">
    Open Insert Venue Modal
</button>