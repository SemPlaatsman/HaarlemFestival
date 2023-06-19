<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';

class HomeController extends Controller
{
    private $pageService;

    function __construct()
    {
        $this->pageService = new PageService();
    }

    public function index()
    {
        try {
            $pages = $this->pageService->getContent();
            foreach ($pages as &$encodedPage) {
                $encodedPage->setBody_markup(htmlspecialchars_decode($encodedPage->getBody_markup()));
            }
            $this->displayView($pages);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateContent()
    {
        try {
            $id = intval($_POST['id']);
            $new_body_markup = htmlspecialchars($_POST['body_markup']);

            $result = $this->pageService->updateContent($id, $new_body_markup);
            if (!$result) {
                throw new Exception('Something went wrong while trying to update the content!');
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            echo 'An error occurred: ' . $e->getMessage();
        }
    }
}
?>