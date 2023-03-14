<?php
require_once __DIR__ . '/../repositories/artistrepository.php';


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

    function updateArtist(int $id, Artist $updatedArtist) : ?Artist
    {
        
        $retrievedArtist = $this->repository->get($id);
        if ($retrievedArtist->name === $updatedArtist->name) {
            return $retrievedArtist;
        }
    
        $this->repository->update($id, $updatedArtist->name);
        $updatedArtist = $this->repository->get($id);
        return $updatedArtist;
    }

    function deleteArtist(int $id) : bool
    {
        return $this->repository->delete($id);
    }
    


}
