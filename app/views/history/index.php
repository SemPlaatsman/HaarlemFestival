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

<body class="container-fluid">
  <!-- welcome tekst -->
  <div class="row bg-tetiare-a mx-auto">
    <div class="col-4 d-none d-md-block">
      <img class="img-fluid rounded-circle p-2 mx-auto locationimage" src="img/png/history/home/routemap.png">
    </div> <!-- image replace whit actual map image-->
    <div class="col">
      <h1 class="title">WELCOME</h1>
      <p>Welcome to A Stroll through History. This is an event where you will be taken on a guided tour through Haarlem. On this tour you will visit places that are important in the history of Haarlem.</p>
      <p> On this page you will find more information about the tour. You can check out information about the venues that are visited in the tour, when the tours are and what the prices are to get a ticket for the tour.</p>
    </div>
  </div>
  <!-- plaatjes -->
  <div class="row bg-primary-b mx-auto pb-3">
    <div class="row">
      <div class="col-sm-12 col-md-6 p-5">

        <h1 class="title text-tetiare-a">LOCATIONS</h1>
        <p class="text-tetiare-a">During the tour you will get visit to visit nine amazing locations in Haarlem. Each of these locations has a great story behind them and an important contribution to the history of Haarlem. If you want to find out more details about a location or what the importance of a location was in the history of Haarlem you can find out more by clicking on it.</p>

      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/StBravo">
          <img class="img-fluid  rounded-circle  mx-auto d-inline-block locationimage" src="img/png/history/home/locations/StBravo.png">
          </img>
          <h1 class="caption font-druktext locationNames">CHURCH OF ST. BAVO</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5 ">
        <a class="text-decoration-none" href="history/GroteMarkt">
          <img class="img-fluid rounded-circle mx-auto d-inline-block locationimage" src="img/png/history/home/locations/groteMarkt.png">
          </img>
          <h1 class="caption font-druktext locationNames">GROTE MARKT</h1>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/DeHallen">
          <img class="img-fluid rounded-circle  mx-auto d-inline-block locationimage" src="img/png/history/home/locations/dehallen.png">
          </img>
          <h1 class="caption font-druktext  locationNames">DE HALLEN</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/ProveniersHof">

          <img class="img-fluid rounded-circle mx-auto d-inline-block  locationimage" src="img/png/history/home/locations/proveniershof.png">
          </img>
          <h1 class="caption font-druktext locationNames">PROVENIERSHOF</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/JopenKerk">

          <img class="img-fluid rounded-circle mx-auto d-inline-block  locationimage" src="img/png/history/home/locations/jopenkerk.png">
          </img>
          <h1 class="caption font-druktext locationNames">JOPENKERK</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/WaalseKerk">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block  locationimage" src="img/png/history/home/locations/waalsekerk.png">
          </img>
          <h1 class="caption font-druktext locationNames">WAALSE KERK HAARLEM</h1>
        </a>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/MolenAdriaan">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block locationimage" src="img/png/history/home/locations/molenDeAdriaan.png">
          </img>
          <h1 class="caption font-druktext locationNames">MOLEN DE ADRIAAN</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/AmsterdamPoort">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block  locationimage" src="img/png/history/home/locations/amsterdamsePoort.png"">
        </img>
        <h1 class=" caption font-druktext locationNames">AMSTERDAMSE POORT</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/HofBakenes">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block  locationimage" src="img/png/history/home/locations/HofVanBakenes.png"">
          </img>
        <h1 class=" caption font-druktext locationNames">HOF VAN BAKENES</h1>
        </a>
      </div>
    </div>
  </div>
  <!--schedule-->
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
            <label class="btn btn-outline-primary p-1 m-1 languagePickerTours" for="ukflag"><img class="img-fluid " src="/img/png/flags/BritFlag.png"></label>

            <input type="radio" class="btn-check" name="btnradio" id="dutchflag" autocomplete="off">
            <label class="btn btn-outline-primary p-1 m-1 languagePickerTours" for="dutchflag"><img class="img-fluid " src="/img/png/flags/DutcFlag.png"></label>

            <input type="radio" class="btn-check" name="btnradio" id="chineseflag" autocomplete="off">
            <label class="btn btn-outline-primary p-1 m-1 languagePickerTours" for="chineseflag"><img class="img-fluid" src="/img/png/flags/ChinFlag.png"></label>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="table-responsive">
          <table class="table borderless font-druk">
            <tbody id="tourschedule">
              

            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>


</body>

</html>

<?php
include __DIR__ . '/../footer.php';
?>