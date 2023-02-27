<?php
include_once __DIR__ . '/../services/artistservice.php';
include_once __DIR__ . '/../models/artist.php';

include_once __DIR__ . '/../helpers/jsonHelper.php';

class ArtistController
{
    private $service;
    private $jsonHelper;

    public function __construct()
    {
        $this->service = new ArtistService();
        $this->jsonHelper = new JsonHelper();
    }

    public function get(int $id = null): bool
    {
        if (!is_null($id)) {
            $artist = $this->service->getArtist($id);
            $aray = array();    //janky hack to make it work with the jsonHelper 
            $aray[0] = $artist; //might need to make different functions for single and multiple
            $this->jsonHelper->printJson($aray); 
            return true;
        } else {

            $artists = $this->service->getArtists();
            $this->jsonHelper->printJson($artists);
            return true;
        }
    }

    public function create()
    {
        echo "create";
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
