<?php
//controller class for a rest api

include_once __DIR__ . '/../services/restaurantservice.php';
include_once __DIR__ . '/../helpers/jsonHelper.php';
include_once __DIR__ . '/../helpers/objectHelper.php';

class RestaurantController

{
    private $service;
    private $jsonHelper;
    private $objectHelper;


    public function __construct()
    {
        $this->jsonHelper = new JsonHelper();
        $this->objectHelper = new ObjectHelper();
        $this->service = new RestaurantService();

    }

    public function get(int $id = null): bool
    {



        try {
            if (!is_null($id)) {
                $restaurant = $this->service->getRestaurant($id);


                if ($this->objectHelper->checkEmpty($restaurant)) {
                    http_response_code(404);
                    echo json_encode(array("message" => "Restaurant not found."));
                    return false;
                }
                $this->jsonHelper->printJson([$restaurant]);
                return true;
            } else {

                $restaurants = $this->service->getRestaurants();
                $this->jsonHelper->printJson($restaurants);
                return true;
            }
        } catch (ServiceException $e) {
            http_response_code($e->getHttpCode());
            echo json_encode(array("message" => $e->getMessage()));
            return false;

        }
    }

    public function create(int $id = null, Object $data): bool
    {

        try {
            $restaurant = $this->MakeRestaurant($data, $id);
            $insertedRestaurant = $this->service->createRestaurant($restaurant);
            if (!is_null($insertedRestaurant)) {

                $array = array();    //janky hack to make it work with the jsonHelper 
                $array[0] = $insertedRestaurant; //might need to make different functions for single and multiple

                $this->jsonHelper->printJson($array);

                return true;
            }
            return false;
        } catch (ServiceException $e) {

            http_response_code($e->getHttpCode());
            echo json_encode(array("message" => $e->getMessage()));
            return false;
        }

    }

    public function update(int $id = null, Object $data): bool
    {

        try{
            if(!isset($data->id)||!isset($data->name)||!isset($data->seats) ){
                return false;
            }
            $restaurant = new Restaurant();
            $restaurant->id = $id;
            $restaurant->name = $data->name;
            $restaurant->seats = $data->seats;

            if(is_null($this->service->updateRestaurant($id, $restaurant))){
                return false;
            }

            $this->jsonHelper->printJson([$restaurant]);
            return true;
        }catch(ServiceException $e){
            http_response_code($e->getHttpCode());
            echo json_encode(array("message" => $e->getMessage()));
            return false;
        }


        
    }

    public function delete(int $id = null): bool
    {
        try{
                $this->service->deleteRestaurant($id);
                return false;   
        }
        catch(ServiceException $e){
            http_response_code($e->getHttpCode());
            echo json_encode(array("message" => $e->getMessage()));
            return false;
        }
    }
    private function  MakeRestaurant(Object $data, int $id = null): restaurant
    {
        try{
        $restaurant = new Restaurant();
        $id = $id ?? $data->id;
        $restaurant->name = $data->name;
        $restaurant->seats = $data->seats;
        $restaurant->location = $data->location;
        $restaurant->adult_price = $data->adult_price;
        $restaurant->kids_price = $data->kids_price;
        $restaurant->reservation_fee = $data->reservation_fee;
        return $restaurant;

        }catch(Exception $e){
            throw new ServiceException("Invalid data", 400);
        }


    }
}
