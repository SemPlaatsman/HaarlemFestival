<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/page.php';

class PageRepository extends Repository
{
    public function getContent(string $url = NULL) 
    {
        try {
            $pages = array();
            $stmt = $this->connection->prepare("SELECT `id`, `url`, `body_markup`, `container_id` FROM `pages`" . (isset($url) ? " WHERE `url`=:url" : ""));
            if(isset($url)){
                $stmt->bindParam(":url", $url, PDO::PARAM_STR);
            }
            $stmt->execute();
            

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $page = new Page();
                $page->setId($row['id']);
                $page->setUrl($row['url']);
                $page->setBody_markup($row['body_markup']);
                $page->setContainerId($row['container_id'] ?: "");
                array_push($pages, $page);
            }

            return $pages;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getPages() : array
    {
        try {
            $pages = array();
            $stmt = $this->connection->prepare("SELECT `id`, `url`, `body_markup`, `container_id` FROM `pages` WHERE `url` !='' AND `url` IS NOT NULL");
            $stmt->execute();
            

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $page = new Page();
                $page->setId($row['id']);
                $page->setUrl($row['url']);
                $page->setBody_markup($row['body_markup']);
                $page->setContainerId($row['container_id'] ?: "");
                array_push($pages, $page);

            }

            return $pages;
        } catch (PDOException $e) {
            return $pages;
        }
    }


    public function insertContent(string $url, string $body_markup)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `pages` (`url`, `body_markup`) VALUES ( :url, :body_markup)");

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
            $stmt = $this->connection->prepare("UPDATE `pages` SET `body_markup` = :body_markup WHERE id = :id");

            // Bind the parameters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':body_markup', $body_markup, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updatePage(int $id, string $url = NULL) : bool
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `pages` SET `url` = :url WHERE id = :id");

            // Bind the parameters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':url', $url, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deletePage(string $url)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `pages` WHERE `url` = :url");

            // Bind the parameters
            $stmt->bindParam(':url', $url, PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
  
    
}
?>