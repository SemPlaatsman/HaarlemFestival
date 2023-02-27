<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';

class HomeController extends Controller {
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

    public function updateContent()
    {
        try {
            $id = htmlspecialchars($_POST['id']);
            $new_body_markup = htmlspecialchars($_POST['body_markup']);

            $result = $this->pageService->updateContent($id, $new_body_markup);

            if ($result) {
                // return succes response 
                echo 'Update complete';
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'An error occurred: ' . $e->getMessage();
        }
    }

}
?>