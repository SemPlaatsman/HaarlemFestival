<?php 
class JsonHelper
{
    public static function printJson(array $data)
    {
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
    public static function retrieveJson() : object
    {
        $json = file_get_contents('php://input');
        if($json == null){
            return null;
        }
        return json_decode($json);
    }
}