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
    public function handleRequest($controller, $id = null) {
        $requestMethod = $this->getRequestMethod();
    
        switch ($requestMethod) {
            case 'GET':
                $controller->get($id);
                break;
    
            case 'POST':
                $controller->create($id);
                break;
    
            case 'PUT':
                $controller->update($id);
                break;
    
            case 'DELETE':
                $controller->delete($id);
                break;
    
            default:

            break;
        }
    }


}
