<?php
require_once __DIR__ . '/../repositories/pagerepository.php';

class PageService
{
    public function insertContent(int $id, string $url, string $body_markup)
    {
        $repository = new PageRepository();

        return $repository->insertContent($id, $url, $body_markup);
    }

    public function updateContent(int $id, string $body_markup)
    {
        $repository = new PageRepository();

        return $repository->updateContent($id, $body_markup);
    }

    public function getContent()
    {
        $repository = new PageRepository();

        return $repository->getContent();
    }
}
?>