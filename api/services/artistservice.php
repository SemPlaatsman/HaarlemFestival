<?php
require_once __DIR__ . '/../repositorie/artistrepository.php';

class ArtistService
{
 
    function getArtist(int $id) : Artist
    {
        $repository = new ArtistRepository();
        try {
            $artist = $repository->get($id);
        } catch (Exception $e) {
            $artist = new Artist();
        } 
        return $artist;
    }
    
    function getArtists() : array 
    {
        $repository = new ArtistRepository();
        if(!$repository->getAll()){
            echo "null";
        }
   

        return $repository->getAll();
    }

    function createArtist(Artist $artist) : bool
    {
        $repository = new ArtistRepository();
        return $repository->insert($artist->name);
    }

    function updateArtist(Artist $artist) : bool
    {
        $repository = new ArtistRepository();
        return $repository->update($artist->id, $artist->name);
    }

    function deleteArtist(int $id) : bool
    {
        $repository = new ArtistRepository();
        return $repository->delete($id);
    }
    


}
