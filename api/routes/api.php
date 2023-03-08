<?php
require_once __DIR__ . '/../helpers/errorHelper.php';
require_once  __DIR__ . '/../helpers/requestHelper.php';
require_once __DIR__ . '/../helpers/jsonHelper.php';

class api
{

    private $url = array();
    private $errorhelper;
    private $requesthelper;
    private $jsonhelper;
    public function __construct(array $url, errorHelper $errorhelper)
    {
        $this->errorhelper = $errorhelper;
        $this->requesthelper = new requestHelper();
        $this->jsonhelper = new JsonHelper();
        $this->url = $url;
        $this->router();
    }


    private function router()
    {
        
        if ($this->url[0] == 'api') {


            if ($this->url[0] == 'api' && isset($this->url[1])) {

                switch ($this->url[1]) {
                    //artists endpoint
                    case 'artists':
                        require_once  __DIR__ . '/../controllers/artistsController.php';
                      

                        $jsonBody =  $this->jsonhelper->retrieveJson();

                        if (!$this->executeRequest(new artistController(), $this->url[2] ?? null,$jsonBody)){
                            $this->errorhelper->error400();

                        };
                        
                    break;

                    //restourant endpoint
                    case 'restourants':
                        require_once  __DIR__ . '/../controllers/restourantsController.php';
                        $jsonBody =  $this->jsonhelper->retrieveJson();
                        
                        if (!$this->executeRequest(new RestourantController(), $this->url[2] ?? null,$jsonBody)){
                            $this->errorhelper->error404();

                        };
                        break;


                    //users endpoint
                    case 'users':
                        require_once  __DIR__ . '/../controllers/usersController.php';
                        $jsonBody =  $this->jsonhelper->retrieveJson();

                        if (!$this->executeRequest(new UserController(), $this->url[2] ?? null,$jsonBody)){
                            $this->errorhelper->error404();

                        };
                        break;

                    default:
                        $this->errorhelper->error404();
                        break;
                }
            } else {
                $this->errorhelper = new errorHelper();

                $this->errorhelper->error404();
            }
        }
    }

    



    //maybe move this to a helper class
    private function executeRequest(Object $resource,int $id = null ,Object $jsonData=null): bool
    {
        

        $method = $this->requesthelper->getRequestMethod();
        if (!$this->requesthelper->checkMethodExists($resource)) {
            $this->errorhelper->error404();
        }
        return $this->requesthelper->handleRequest($resource,$jsonData,$id);
    }
}
