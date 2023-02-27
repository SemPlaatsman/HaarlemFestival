<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($directory); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/<?= strtolower($directory); ?>.css">
  </head>
  <body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg sticky-top bg-primary-a p-0">
      <div class="container-fluid">
        <a class="navbar-brand ms-2" href="/">
          <img src="img/png/haarlem-brand.png" alt="haarlem-brand" width="185" height="54">
        </a>
        <button class="navbar-toggler border-0 p-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fs-1"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
          <ul class="navbar-nav fs-1 w-100 d-flex justify-content-center">
            <section class="w-100 d-flex flex-row justify-content-center">
              <li class="nav-item mx-5">
                <a class="nav-link active" href="#">HOME</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="#">YUMMY!</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="#">DANCE!</a>
              </li>
            </section>
            <li class="nav-item authBtn">
              <a class="nav-link pull-right" href="/">LOGIN <i class="fa-solid fa-arrow-right-from-bracket mx-2"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="container-fluid row align-items-center m-0 p-0 mb-auto h-100">