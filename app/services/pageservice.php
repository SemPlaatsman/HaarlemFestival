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

    public function getContent()
    {
        return $this->pageRepository->getContent();
    }

}
?>