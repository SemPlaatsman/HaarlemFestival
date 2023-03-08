<?php
require_once __DIR__ . '/../repository/artistrepository.php';


class ArtistService
{
    private $repository;

    function __construct()
    {
        $this->repository = new ArtistRepository();
    }
 
    function getArtist(int $id) : ?Artist
    {        
        try {
            $artist = $this->repository->get($id);
        } catch (Exception $e) {
            throw new ServiceException('Error getting artist: ' . $e->getMessage(), 404);
        } 
        return $artist;
    }
    
    function getArtists() : array 
    {
       
        try {
            $artists = $this->repository->getAll();
            return $artists ?? [];
        } catch (Exception $e) {
            throw new ServiceException("An error occurred while retrieving the list of artists.".$e->getMessage(), 500);
        }
    }

    function createArtist(Artist $artist) : Artist
    {
        $id = $this->repository->insert($artist->name);
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
        return $this->repository->delete($id);
    }
    


}
