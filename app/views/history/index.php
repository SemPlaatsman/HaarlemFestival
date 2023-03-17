<?php
include __DIR__ . '/../header.php';
?>
<!-- temp -->
<?php
new imageslidercontroller();
new breadcrumbcontroller();

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History</title>
</head>

<body class="container">
  <div class=" bg-tetiare-a">
    <div class="col-6"><img></div>
    <div class="col-6"><p> </p></div>
  </div>
  <div class="row bg-primary-b">
    <div class="col-6"></div>
    <div class="col-6"></div>
  </div>
  <div class="row bg-tetiare-a">
    <div class="col-6"></div>
    <div class="col-6"></div>
  </div>

  <input type="submit" class="btn btn-primary insert-button-venue" value="BUY TICKETS " style="width: 50%;">


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