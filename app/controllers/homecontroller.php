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
        $pages = $this->pageService->getContent();

        //$this->displayView(['pages' => $pages]);
        require_once __DIR__ . '/../views/home/index.php';
    }

    public function updateContent()
    {
        $id = $_POST['id'];
        $new_body_markup = $_POST['body_markup'];

        $result = $this->pageService->updateContent($id, $new_body_markup);

        if ($result) {
            // return succes response 
            echo 'Update succesfull';
        } else {
            // return failed response
            echo 'Something went wrong with the update';
        }
    }
}
?>