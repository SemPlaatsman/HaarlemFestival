<?php
include __DIR__ . '/../header.php';
(session_status() == PHP_SESSION_NONE || session_status() == PHP_SESSION_DISABLED) ? session_start() : null;
?>
<!-- temp -->

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>History</title>
</head>
<?php
new imageslidercontroller("A STROLL THROUGH HISTORY");
new breadcrumbcontroller();

?>

<body class="container-fluid">
  <!-- welcome tekst -->
  <div class="row bg-tetiare-a mx-auto">
    <div class="col-4 d-none d-md-block">
      <img class="img-fluid rounded-circle p-2 mx-auto locationimage" src="img/png/history/home/routemap.png">
    </div> <!-- image replace whit actual map image-->
    <div class="col">
      <h1 class="title">WELCOME</h1>
      <?php foreach ($model['pages'] as $page) { ?>
        <?php if ($page->getId() === 8) { ?>
          <p data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>"
            data-body-markup="<?= $page->getBody_markup() ?>">
            <?= $page->getBody_markup(); ?>
          </p>
          <div class="text-center">
            <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
              <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open
                Editor</button>
            <?php } ?>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
  <!-- plaatjes -->
  <div class="row bg-primary-b mx-auto pb-3">
    <div class="row">
      <div class="col-sm-12 col-md-6 p-5">

        <h1 class="title text-tetiare-a">LOCATIONS</h1>
        <?php foreach ($model['pages'] as $page) { ?>
          <?php if ($page->getId() === 9) { ?>
            <p class="text-tetiare-a" data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>"
              data-body-markup="<?= $page->getBody_markup() ?>">
              <?= $page->getBody_markup(); ?>
            </p>
            <div class="text-center">
              <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
                <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open
                  Editor</button>
              <?php } ?>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/StBravo">
          <img class="img-fluid  rounded-circle  mx-auto d-inline-block locationimage"
            src="img/png/history/home/locations/StBravo.png">
          </img>
          <h1 class="caption font-druktext locationNames">CHURCH OF ST. BAVO</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5 ">
        <a class="text-decoration-none" href="history/GroteMarkt">
          <img class="img-fluid rounded-circle mx-auto d-inline-block locationimage"
            src="img/png/history/home/locations/groteMarkt.png">
          </img>
          <h1 class="caption font-druktext locationNames">GROTE MARKT</h1>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/DeHallen">
          <img class="img-fluid rounded-circle  mx-auto d-inline-block locationimage"
            src="img/png/history/home/locations/dehallen.png">
          </img>
          <h1 class="caption font-druktext  locationNames">DE HALLEN</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/ProveniersHof">

          <img class="img-fluid rounded-circle mx-auto d-inline-block  locationimage"
            src="img/png/history/home/locations/proveniershof.png">
          </img>
          <h1 class="caption font-druktext locationNames">PROVENIERSHOF</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/JopenKerk">

          <img class="img-fluid rounded-circle mx-auto d-inline-block  locationimage"
            src="img/png/history/home/locations/jopenkerk.png">
          </img>
          <h1 class="caption font-druktext locationNames">JOPENKERK</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/WaalseKerk">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block  locationimage"
            src="img/png/history/home/locations/waalsekerk.png">
          </img>
          <h1 class="caption font-druktext locationNames">WAALSE KERK HAARLEM</h1>
        </a>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/MolenAdriaan">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block locationimage"
            src="img/png/history/home/locations/molenDeAdriaan.png">
          </img>
          <h1 class="caption font-druktext locationNames">MOLEN DE ADRIAAN</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/AmsterdamPoort">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block  locationimage"
            src="img/png/history/home/locations/amsterdamsePoort.png"">
        </img>
        <h1 class=" caption font-druktext locationNames">AMSTERDAMSE POORT</h1>
        </a>
      </div>
      <div class="col-6 col-md-3 p-5">
        <a class="text-decoration-none" href="history/HofBakenes">

          <img class="img-fluid rounded-circle  mx-auto d-inline-block  locationimage"
            src="img/png/history/home/locations/HofVanBakenes.png"">
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
      <?php foreach ($model['pages'] as $page) { ?>
        <?php if ($page->getId() === 10) { ?>
          <p data-id="<?= $page->getId() ?>" data-url="<?= $page->getUrl() ?>"
            data-body-markup="<?= $page->getBody_markup() ?>">
            <?= $page->getBody_markup(); ?>
          </p>
          <div class="text-center">
            <?php if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) { ?>
              <button type="button" class="btn btn-primary" onclick="openEditorModal(<?= $page->getId() ?>)">Open
                Editor</button>
            <?php } ?>
          </div>
        <?php } ?>
      <?php } ?>
      <input type="submit" data-bs-toggle="modal" data-bs-target="#historyTicketForm"
        class="btn btn-primary btn-block insert-button-venue bg-primary-a border-primary-a rounded-0 buyButton"
        value="BUY TICKETS ">
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
          <div class="btn-group btn-group-justified btn-group-lg languagepicker " role="group"
            aria-label="language picker whit a uk, dutch and chinese flag">
            <input type="radio" class="btn-check" name="btnradio" id="ukflag" autocomplete="off" checked>
            <label class="btn btn-outline-primary p-1 m-1 languagePickerTours" for="ukflag"><img class="img-fluid"
                src="/img/png/flags/BritFlag.png"></label>

            <input type="radio" class="btn-check" name="btnradio" id="dutchflag" autocomplete="off">
            <label class="btn btn-outline-primary p-1 m-1 languagePickerTours" for="dutchflag"><img class="img-fluid "
                src="/img/png/flags/DutcFlag.png"></label>

            <input type="radio" class="btn-check" name="btnradio" id="chineseflag" autocomplete="off">
            <label class="btn btn-outline-primary p-1 m-1 languagePickerTours" for="chineseflag"><img class="img-fluid"
                src="/img/png/flags/ChinFlag.png"></label>
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

  <?php
  include __DIR__ . '/../modalwysiwyg.php';
  ?>


  <div id="historyTicketForm" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-primary-b text-white">
        <div class="modal-header">
          <h5 class="modal-title p-2">Buy tickets</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="modal-body" method="POST" action="/history/addticket">
          <div class="row">

            <fieldset class="form-group p-2 col-md-12 gx-100">
              <label class="text-tetiare-a fs-5  col-form-label" for="tour_select">Tour*</label>
              <select required class="form-control" id="tour_select" name="tour_id">
                <?php foreach($model['tours'] as $tour) { ?>
                  <option value="<?= $tour->getId(); ?>" data-price="<?= $tour->getPriceFormatted(); ?>" data-family-price="<?= $tour->getGroupPriceFormatted(); ?>"><?= $tour->getLanguage(); ?> tour at <?= $tour->getGatheringLocation(); ?> at <?= $tour->getDatetimeFormatted(); ?></option>
                <?php } ?>
              </select>
            </fieldset>

            <fieldset class="form-group row p-2 col-md-12 align-items-center">
              <div class="col-md-4">
                <label class="text-tetiare-a fs-5 col-form-label" for="nr_of_people">Nr of people*</label>

              </div>
              <div class="col-md-4">
                <label class="text-tetiare-a fs-5 col-form-label text-right" for="nr_of_people">
                  <span id="historyFormSingleTicket"></span> per person <br>
                  <span id="historyFormFamilyTicket"></span> per 4 people
                </label>
              </div>
              <div class="col-md-4">
                <input required class="form-control" type="number" id="nr_of_people" name="nr_of_people" min="1" max="12" value="1">
              </div>

            </fieldset>

            <input type="cancel" value="Cancel" class="btn btn-secondary col-md-4" data-bs-dismiss="modal">
            <input type="submit" value="Submit" class="btn btn-primary col-md-8">
          </div>
        </form>

      </div>
    </div>
  </div>


</body>

</html>

<?php
include __DIR__ . '/../footer.php';
?>