<?php
require_once __DIR__ . '/../repositories/artistrepository.php';

class ArtistService
{
 
    function getArtist(int $id) : Artist
    {
        $repository = new ArtistRepository();
    
        return $repository->get($id);
    }
    
    function getArtists() : array 
    {
        $repository = new ArtistRepository();
        if($repository->getAll()){
            echo "null";
        }
        else{
            echo "not null";
        }

        return $repository->getAll();
    }
    


}
