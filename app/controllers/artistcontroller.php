<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/artistservice.php';

class ArtistController extends Controller
{
    private $artistservice;

    function __construct()
    {
        $this->artistservice = new ArtistService();
    }

    public function index()
    {
        try {
            $artist = $this->artistservice->getArtists();
            $data = [
                'artist' => $artist,
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertArtist()
    {
        try {
            //$name = htmlspecialchars($_POST['name']);
            $artist = new Artist();
            $artist->name = htmlspecialchars($_POST['name']);

            $result = $this->artistservice->createArtist($artist);

            if ($result) {
                // return success response
                header("Location: /artist");
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateArtist()
    {
        try {
            $artist = new Artist();
            $artist->id = intval($_POST['id']);
            $artist->name = htmlspecialchars($_POST['name']);

            $result = $this->artistservice->updateArtist($artist);

            if ($result) {
                // return succes response
                header("Location: /artist");
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteArtist()
    {
        try {
            $id = htmlspecialchars($_POST['id']);

            $result = $this->artistservice->deleteArtist($id);
            if ($result) {
                // return success response
                header("Location: /artist");
            } else {
                // return failed response
                echo 'Something went wrong with the deletion';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>