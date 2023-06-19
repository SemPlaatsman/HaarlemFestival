<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/page.php';

class PageRepository extends Repository
{
    public function getContent()
    {
        try {
            $pages = array();
            $stmt = $this->connection->prepare("SELECT * FROM`pages`");

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $page = new Page();
                $page->setId($row['id']);
                $page->setUrl($row['url']);
                $page->setBody_markup($row['body_markup']);
                array_push($pages, $page);
            }
            return $pages;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function insertContent(int $id, string $url, string $body_markup)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO`pages` (url, body_markup) VALUES ( :url, :body_markup)");

            // Bind the parameters
            $stmt->bindParam(':url', $url, PDO::PARAM_STR);
            $stmt->bindParam(':body_markup', $body_markup, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateContent(int $id, string $body_markup)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE`pages` SET body_markup = :body_markup WHERE id = :id");

            // Bind the parameters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':body_markup', $body_markup, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>