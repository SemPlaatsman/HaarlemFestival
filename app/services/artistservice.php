<?php
require_once __DIR__ . '/../repositories/artistrepository.php';

class ArtistService
{

    private $repository;

    function __construct()
    {
        $this->repository = new ArtistRepository();
    }

    function getArtist(int $id): Artist
    {
        return $this->repository->get($id);
    }

    /*function getArtists(): array
    {
    $repository = new ArtistRepository();
    if (!$repository->getAll()) {
    //echo "null";
    return [];
    }
    return $repository->getAll();
    }*/

    function getArtists(): array
    {
        try {
            $artists = $this->repository->getAll();
            return $artists ?? [];
        } catch (Exception $e) {
            throw new Exception('Failed to retrieve artists: ' . $e->getMessage());
        }
    }


    function createArtist(string $name): bool
    {
        return $this->repository->insert($name);
    }

    function updateArtist(int $id, string $name): bool
    {
        return $this->repository->update($id, $name);
    }

    function deleteArtist(int $id): bool
    {
        return $this->repository->delete($id);
    }

}