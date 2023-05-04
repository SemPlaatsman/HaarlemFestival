<?php
require_once __DIR__ . '/controller.php';



class breadcrumbcontroller extends Controller {
    public string  $crumbs ="/";
    function __construct() {
        $this->index();
    }


    public function index() {

        $uri = $_SERVER['REQUEST_URI'];
        $parsed =parse_url($uri, PHP_URL_PATH);
        $explodedurl =explode("/", $parsed);
        $path ="/";


        foreach($explodedurl as $crumb){
            
            $seperator ='';

            if($crumb == ""){
                continue;
            }
            if($explodedurl[count($explodedurl)-1] != $crumb){
                $seperator = ' <i class="text-tetiare-a  fa-solid " style="font-size: 0.5em;">></i> ';
                $path .= $crumb;

            }
            else{
                $path .= "/".$crumb;
            }
            $path =str_replace("//", "/", $path);
            $this->crumbs .='<a class="text-decoration-none" href='.$path.'><p class="text-tetiare-a font-druk bread-crumb d-inline align-text-bottom">'.$crumb.$seperator.'</p></a>';

        }


        $this->displayView();

       



       
    }
}

  
?>