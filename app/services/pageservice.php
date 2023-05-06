<?php
require_once __DIR__ . '/../repositories/pagerepository.php';

class PageService
{
    private $pageRepository;

    public function __construct()
    {
        $this->pageRepository = new PageRepository();
    }

    public function insertContent(string $url, string $body_markup)
    {
        return $this->pageRepository->insertContent($url, $body_markup);
    }

    public function updateContent(int $id, string $body_markup)
    {
        return $this->pageRepository->updateContent($id, $body_markup);
    }

    public function getContent(string $url = NULL)
    {
        return $this->pageRepository->getContent($url);
    }

    public function getAllPages() : array
    {
        return $this->pageRepository->getPages();
    }
    
    
    public function addPage(string $url)
    {
        //check if page already exists
        $pages = $this->pageRepository->getContent($url);
        if(count($pages) > 0){
            throw new Exception("Page already exists");
        }
        return $this->pageRepository->insertContent($url, "");
    }

    public function updatePage(int $id, string $url) : bool
    {
        return $this->pageRepository->updatePage($id, $url);
    }
    public function deletePage(string $url)
    {
        return $this->pageRepository->deletePage($url);
    }

}
?>