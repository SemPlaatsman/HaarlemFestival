
<header class="d-flex justify-content-center py-3 bg-primary-b fs-5">
    <ul class="nav nav-pills fw-bold">


    <?php 
    require_once __DIR__ . '/../models/subPageHeaderButton.php';

        $adminpages = array(
            new subPageHeaderButton('OVERVIEW', '/adminoverview'),
            new subPageHeaderButton('VENUES', '/venue'),
            new subPageHeaderButton('EVENTS', '/event'),
            new subPageHeaderButton('ARTISTS', '/artist'),
            new subPageHeaderButton('USERS', '/user'),
            new subPageHeaderButton('OPENING HOURS', '/openinghour'),
            new subPageHeaderButton('RESTAURANTS', '/restaurant'),
            new subPageHeaderButton('RESERVATIONS', '/reservation'),
            new subPageHeaderButton('ORDERS', '/paymentOveview'),
            new subPageHeaderButton('PAGEOVERVIEW', '/pagesOverview')

        );

   foreach ($adminpages as  $page){
        if($_SERVER['REQUEST_URI']==$page->getLink()){
            echo '<li><a href="'.$page->getLink().'" class="bg-light nav-item nav-link text-primary-b mx-0 mx-xxl-5" aria-current="page">'.$page->getName().'</a></li>';
            $page->setActiveState(true);
        }
        else{
          echo '<li><a href="'.$page->getLink().'" class="second-header nav-item nav-link text-tetiare-a mx-0 mx-xxl-5">'.$page->getName().'</a></li>';
         }
    }
    

    ?>
      
    </ul>
</header>