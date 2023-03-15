<?php
include __DIR__ . '/../header.php';
?>
<!-- temp -->
<?php
new breadcrumbcontroller();
new imageslidercontroller();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>

<body>
    <input type="submit" class="btn btn-primary insert-button-venue" value="BUY TICKETS " style="width: 50%;">

    <!-- Open ticket form -->

    <!-- <div id="history-ticket-form" class="modal">
        <form class="col-md-4 row bg-primary-b p-0 form-rightside" method="POST" id="history-ticket-form">
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
                    <input class="form-control" type="number" id="single_tickets" name="single_tickets" min="0">
                </div>
            </fieldset>

            <fieldset class="form-group row p-2 col-md-12">
                <div class="col-md-3">
                    <label class="text-tetiare-a fs-5 col-form-label" for="family_tickets">Family Ticket</label>
                </div>
                <div class="col-md-2 offset-md-1">
                    <label class="text-tetiare-a fs-5 col-form-label text-right" for="single_tickets">€ 17,50</label>
                </div>
                <div class="col-md-4 offset-md-2">
                    <input class="form-control" type="number" id="family_tickets" name="family_tickets" min="0">
                </div>
            </fieldset>

            <input type="cancel" value="cancel" class="btn btn-secondary col-md-4">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary col-md-8">
        </form>
    </div> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Hide the modal form by default
    $('#history-ticket-form').hide();
    
    // Show the modal form when the button is clicked
    $('.insert-button-venue').click(function() {
      $('#history-ticket-form').show();
    });
    
    // Hide the modal form when the "cancel" button is clicked
    $('#history-ticket-form input[type="cancel"]').click(function() {
      $('#history-ticket-form').hide();
    });
  });
</script>

</body>

</html>

<?php
include __DIR__ . '/../footer.php';
?>