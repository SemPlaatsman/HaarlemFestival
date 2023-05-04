<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';

class CustomPageController extends Controller{
    private  $pageService;
    public $page ="test";
    public function index(string $url) 
    {
        if($this->CheckPage($url)){
            $this->page = $this->DisplayCustom($url);
            $this->displayView();

        }
        else{
            throw new Exception("404 Not Found");
        }
     
        
    }
    public function CheckPage(String $url){
        $this->pageService = new PageService();
        //maybe make a separate service method to check if a page exists
        $content =$this->pageService->getContent($url);
        if($content != null){
            return true;
        }
        return false;
        
    }
 
    
    public function DisplayCustom($uri):string
    {   $page ="";
        $this->pageService = new PageService();
        $pages = $this->pageService->getContent($uri);
        foreach ($pages as &$encodedPage) {
           $page = htmlspecialchars_decode($encodedPage->getBody_markup());
        }
        return $page;
    }
}
