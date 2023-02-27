<?php
include_once __DIR__ . '/../services/artistservice.php';
include_once __DIR__ . '/../models/artist.php';

include_once __DIR__ . '/../helpers/jsonHelper.php';
include_once __DIR__ . '/../helpers/objectHelper.php';


class ArtistController
{
    private $service;
    private $jsonHelper;
    private $objectHelper;

    public function __construct()
    {
        $this->service = new ArtistService();
        $this->jsonHelper = new JsonHelper();
        $this->objectHelper = new ObjectHelper();

    }

    public function get(int $id = null): bool
    {
        if (!is_null($id)) {
            $artist = $this->service->getArtist($id);
            $array = array();    //janky hack to make it work with the jsonHelper 
            $array[0] = $artist; //might need to make different functions for single and multiple
           
            if ($this->objectHelper->checkEmpty($artist)) {

                return false;
            }

            $this->jsonHelper->printJson($array); 
            return true;
        } else {

            $artists = $this->service->getArtists();
            $this->jsonHelper->printJson($artists);
            return true;
        }
    }

    public function create($id,Artist $data)
    {
        echo "create";
        $artist = new Artist();
        $artist->name = "test";

        echo $data;
        // return $this -> service -> createArtist($artist);
    }

    public function update()
    {
        echo "update";
    }

    public function delete()
    {
        echo "delete";
    }

    public function print($id)
    {
        echo "getArtist";
    }

  

}
