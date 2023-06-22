<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';

class custompagecontroller extends Controller
{
    private $pageService;
    public $markup = "test";
    public $id;

    public function index(string $url)
    {
        if ($this->CheckPage($url)) {
            $this->id = $this->getPage($url)[0]->getId();
            $this->markup = $this->DisplayCustom($url);
            $this->displayView();
        } else {
            throw new Exception("404 Not Found");
        }
    }
    public function CheckPage(string $url)
    {
        $this->pageService = new PageService();
        //maybe make a separate service method to check if a page exists
        $content = $this->pageService->getContent($url);
        if ($content != null) {
            return true;
        }
        return false;
    }


    public function DisplayCustom($uri): string
    {
        $page = "";
        $this->pageService = new PageService();
        $pages = $this->pageService->getContent($uri);
        foreach ($pages as &$encodedPage) {
            $page = htmlspecialchars_decode($encodedPage->getBody_markup());
        }
        return $page;
    }


    public function setPage(): PageService
    {
        $this->pageService = new PageService();
        return $this->pageService;
    }

    public function getAllPages()
    {
        try {
            $this->pageService = new PageService();
            $pages = $this->pageService->getAllPages();
            return $pages;
        } catch (Exception $e) {
            throw new Exception("404 Not Found");
        }
    }

    public function getPage($url)
    {
        $this->pageService = new PageService();
        $page = $this->pageService->getContent($url);
        return $page;
    }
}