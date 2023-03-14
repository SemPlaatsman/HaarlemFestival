<?php
require_once __DIR__ . '/../repository/artistrepository.php';

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
            
            return array();
        }
   

        return $repository->getAll();
    }

    function createArtist(Artist $artist) : Artist
    {
        $repository = new ArtistRepository();
        $id = $repository->insert($artist->name);
        return $this->getArtist($id);
    }

    function updateArtist(int $id, Artist $updatedArtist) : Artist
    {
        $repository = new ArtistRepository();
         $returnedID = $repository->update($id, $updatedArtist->name);
        $retrievedArtist = $this->getArtist($id);
        if($updatedArtist->name == $retrievedArtist->name){
            return $retrievedArtist;
        }

        return null;
    }

    function deleteArtist(int $id) : bool
    {
        $repository = new ArtistRepository();
        return $repository->delete($id);
    }
    


}
