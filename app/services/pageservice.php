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
        try {
            return $this->pageRepository->getContent($url);
        } catch (PDOException) {
            throw new Exception("Error getting content");
        }
    }

    public function getAllPages(): array
    {
        try {
            return $this->pageRepository->getPages();
        } catch (PDOException) {
            throw new Exception("Error getting pages");
        }
    }


    public function addPage(string $url)
    {
        //check if page already exists
        try {
            $pages = $this->pageRepository->getContent($url);
            var_dump($url, $pages);
            if (count($pages) > 0 || is_null($pages)) {
                throw new Exception("Page already exists");
            }
            if (!str_contains($url, "/")) {
                throw new Exception("Invalid url");
            }
            return $this->pageRepository->insertContent($url, "", true);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updatePage(int $id, string $url): bool
    {
        return $this->pageRepository->updatePage($id, $url);
    }
    public function deletePage(string $url)
    {
        return $this->pageRepository->deletePage($url);
    }

}
?>