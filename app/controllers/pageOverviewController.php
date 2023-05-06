<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageservice.php';
class pageOverviewController extends Controller {
    public function index()
    {
        $pageService = new PageService();

        try{
             if(isset($_POST['id']) && isset($_POST['url']) && isset($_POST['_editMethod']) ){

                switch($_POST['_editMethod']){
                    case 'PUT':
                        $pageService->updatePage($_POST['id'], $_POST['url']);
                        break;
                    case 'DELETE':
                    // $pageService->deletePage($_POST['url']);
                    var_dump($_POST['url']);
                        echo "delete";
                        break;
                    case 'POST':
                        $pageService->addPage($_POST['url']);
                        break;
                }
            }
            $_POST= null;

        }catch(Exception $e){
            echo 'Error: ' . $e->getMessage();
        }
          

        

    


        try{
            $model = [
                'pages' => $pageService->getAllPages()
            ];
            $this->displayView($model);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

}
?>

