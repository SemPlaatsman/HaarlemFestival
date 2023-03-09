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
        try {
            if (!is_null($id)) {
                $artist = $this->service->getArtist($id);
                if ($this->objectHelper->checkEmpty($artist)) {
                    http_response_code(404);
                    echo json_encode(array("message" => "Artist not found."));
                    return false;
                }
                $this->jsonHelper->printJson([$artist]);
            } else {
                $artists = $this->service->getArtists();
                $this->jsonHelper->printJson($artists);
            }
            return true;
        } catch (ServiceException $e) {
            http_response_code($e->getHttpCode());
            echo json_encode(array("message" => $e->getMessage()));
            return false;
        }
    }

    public function create(int $id = null, Object $data): bool
    {
        try {
            $artist = $this->MakeArtist($data, $id);
            $insertedArtist = $this->service->createArtist($artist);
            if (!is_null($insertedArtist)) {

                $array = array();    //janky hack to make it work with the jsonHelper 
                $array[0] = $insertedArtist; //might need to make different functions for single and multiple

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
        try {
            if (!isset($data->id) || !isset($data->name)) {
                return false;
            }


            $artist = new Artist();
            $artist->id = $data->id;
            $artist->name = $data->name;

            if (is_null($this->service->updateArtist($id, $artist))) {
                return false;
            }

            $this->jsonHelper->printJsonSingle($artist);
            return true;
        } catch (ServiceException $e) {
            http_response_code($e->getHttpCode());
            echo json_encode(array("message" => $e->getMessage()));
            return false;
        }
    }

    public function delete()
    {
        echo "delete";
    }



    // maybe put this in the artist model
    private function  MakeArtist(Object $data, int $id = null): Artist
    {
        $artist = new Artist();
        $id = $id ?? $data->id;
        $artist->id = $id;
        $artist->name = $data->name;
        return $artist;
    }
}
