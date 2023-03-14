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

    public function create(int $id = null,Object $data): bool
    {
       
        $artist = $this->MakeArtist($data,$id);

        $insertedArtist = $this -> service -> createArtist($artist);
        if (!is_null($insertedArtist)){

            $array = array();    //janky hack to make it work with the jsonHelper 
            $array[0] = $insertedArtist; //might need to make different functions for single and multiple

            $this->jsonHelper->printJson($array);

            return true;
        }
        return false;
        
        
    }

    public function update(int $id = null,Object $data): bool
    {
       if(!isset($data->id) || !isset($data->name)){
        return false;

       }

        // if($id<1){
        //     return false;
        // }

        $artist = new Artist();
        $artist->id = $data->id;
        $artist->name = $data->name;    
        
      if( is_null($this->service->updateArtist($id,$artist))){
        return false;

      }
      return true;

     
    }

    public function delete()
    {
        echo "delete";
    }



    //maybe put this in the artist model
    private function  MakeArtist(Object $data,int $id = null):Artist {
        $artist = new Artist();
        $id = $id ?? $data -> id;
        $artist->id = $id;
        $artist->name = $data->name;
        return $artist;
    }

}
