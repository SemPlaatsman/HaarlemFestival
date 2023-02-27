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
    public function handleRequest($controller, $id = null, $jsonData): bool {
        $requestMethod = $this->getRequestMethod();
    
        switch ($requestMethod) {
            case 'GET':
                return $controller->get($id);
                break;
    
            case 'POST':
               return $controller->create($id, $jsonData);
                break;
    
            case 'PUT':
                return $controller->update($id, $jsonData);
                break;
    
            case 'DELETE':
                return $controller->delete($id);
                break;
    
            default:

            break;
        }
    }


}
