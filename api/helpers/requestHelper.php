<?php
class RequestHelper{

    public function getRequestMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
    public function checkMethodExists($controller){
        $requestMethod = $this->getRequestMethod();

        switch ($requestMethod) {
            case 'GET':
                return method_exists($controller, 'get');
                break;
    
            case 'POST':

                return method_exists($controller, 'create');
                break;
    
            case 'PUT':

                return method_exists($controller, 'update');
                break;
    
            case 'DELETE':
                return method_exists($controller, 'delete');
                break;
    
            default:
                return false;
            break;
        }
    }
    public function handleRequest($controller,  Object $jsonData=null, $id = null): bool {
        $requestMethod = $this->getRequestMethod();
    
        switch ($requestMethod) {
            case 'GET':
                return $controller->get($id);
                break;
    
            case 'POST':
                if($jsonData !=null){
                    return $controller->create($id, $jsonData);
                }
                return false;
                break;
    
            case 'PUT':

                if($jsonData !=null){

                return $controller->update($id, $jsonData);
                }
                return false;
                break;
    
            case 'DELETE':
                return $controller->delete($id);
                break;
    
            default:
                return false;
            break;
        }
    }


}
