<?php
class errorHelper{
  

    public function error404(){
        http_response_code(404);
        echo '404';
        die();
    }

    public function error500(){
        http_response_code(500);
        echo '500';

    }

    public function error400(){
        http_response_code(400);
        echo '400';

    }
}
