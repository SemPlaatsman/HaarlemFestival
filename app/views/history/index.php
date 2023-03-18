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
  <link rel="stylesheet" href="">
</head>

<body class="container-fluid">
  <div class="row bg-tetiare-a mx-auto">
    <div class="col-4 d-none d-md-block">
      <img class="img-fluid rounded-circle p-2 mx-auto  image" src="https://fastly.picsum.photos/id/744/400/400.jpg?hmac=2J82-H9IdQpY6940Fkcvzr6n_bFovfAcNLtO7PwY-9Y">
    </div> <!-- image replace whit actual map image-->
    <div class="col">
      <h1 class="title">WELCOME</h1>
      <p>Welcome to A Stroll through History. This is an event where you will be taken on a guided tour through Haarlem. On this tour you will visit places that are important in the history of Haarlem.</p>
      <p> On this page you will find more information about the tour. You can check out information about the venues that are visited in the tour, when the tours are and what the prices are to get a ticket for the tour.</p>
    </div>
  </div>
  <div class="row bg-primary-b mx-auto">
    <div class="col md-col-6">
      <h1 class="title text-tetiare-a">LOCATIONS</h1>
      <p class="text-tetiare-a">During the tour you will get visit to visit nine amazing locations in Haarlem. Each of these locations has a great story behind them and an important contribution to the history of Haarlem. If you want to find out more details about a location or what the importance of a location was in the history of Haarlem you can find out more by clicking on it.</p>
    </div>
    <div class="col  d-none d-md-block">
      <img class="img-fluid  rounded-circle p-2 mx-auto d-inline-block image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE">
    </div>
    <div class="col d-none d-md-block">
      <img class="img-fluid rounded-circle p-2 mx-auto d-inline-block image" src="https://fastly.picsum.photos/id/54/400/400.jpg?hmac=bYiTE5dgf7aeX3u33wjsWzjFQLppWUPbsfVTn33OM9I">
    </div>
    <div class="row">
      <div class="col-3"><img class="img-fluid rounded-circle p-2 mx-auto d-inline-block image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE"></div>
      <div class="col-3"> <img class="img-fluid rounded-circle p-2 mx-auto d-inline-block image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE"></div>
      <div class="col-3"> <img class="img-fluid rounded-circle p-2 mx-auto d-inline-block image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE"></div>
      <div class="col"> <img class="img-fluid rounded-circle p-2 mx-auto d-inline-block image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE"></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-3 "><img class="img-fluid rounded-circle  image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE"></div>
      <div class="col-3 "><img class="img-fluid rounded-circle    image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE"></div>
      <div class="col-3"><img class="img-fluid rounded-circle  image" src="https://fastly.picsum.photos/id/452/400/400.jpg?hmac=ERBYjvlNNqVzMZSKK2czOgTP2QRPe8PQiOLvHTsNCsE"></div>
    </div>
  </div>
  <div class="row bg-tetiare-a mx-auto">
    <div class="col-sm-12  col-md-6 prices  p-5 order-1 order-lg-0">
      <h1 class="title">PRICES</h1>
      <p class="m-0">Prices (tour including 1 drink p.p.):
      <ul class="list">
        <li>Regular Participant: € 17,50</li>
        <li>Family ticket (max. 4 participants): € 60, -</li>
      </ul>
      <p> Due to the nature of this tour all participants must be a minimum of 12 years old and strollers are not allowed.</p>
      </p>
      <input type="submit" class="btn btn-primary btn-block insert-button-venue bg-primary-a border-primary-a rounded-0 buyButton" value="BUY TICKETS ">
    </div>
    <div class="col-sm-12  col-md-6 schedule  p-5 order-0 order-lg-1">
      <div class="row">
        <!-- mischien inline doen -->
        <div class="col">
          <h1 class="title">SCHEDULE</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="btn-group btn-group-justified btn-group-lg languagepicker " role="group" aria-label="language picker whit a uk, dutch and chinese flag">
            <input type="radio" class="btn-check" name="btnradio" id="ukflag" autocomplete="off" checked>
            <label class="btn btn-outline-primary p-1 m-1" for="ukflag"><img class="img-fluid" src="https://fastly.picsum.photos/id/202/100/50.jpg?hmac=OSzNl1LnX6DV8nLYYrBuM2A0979qN2dG__jrh88pXdI"></label>

            <input type="radio" class="btn-check" name="btnradio" id="dutchflag" autocomplete="off">
            <label class="btn btn-outline-primary p-1 m-1" for="dutchflag"><img class="img-fluid" src="https://fastly.picsum.photos/id/202/100/50.jpg?hmac=OSzNl1LnX6DV8nLYYrBuM2A0979qN2dG__jrh88pXdI"></label>

            <input type="radio" class="btn-check" name="btnradio" id="chineseflag" autocomplete="off">
            <label class="btn btn-outline-primary p-1 m-1" for="chineseflag"><img class="img-fluid" src="https://fastly.picsum.photos/id/202/100/50.jpg?hmac=OSzNl1LnX6DV8nLYYrBuM2A0979qN2dG__jrh88pXdI"></label>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="table-responsive">
          <table class="table">
            <tbody>
              <?php
              for ($i = 0; $i < 4; $i++) {
                echo "<tr>";
                echo "<td>THUR 26 JULY</td>";
                echo "<td>Otto</td>";
                echo "<td>@mdo</td>";
                echo "<td>@mdo</td>";
                echo "</tr>";
              }

              ?>

            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>



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