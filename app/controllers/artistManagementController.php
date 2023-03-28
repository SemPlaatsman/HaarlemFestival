<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/artistservice.php';
require_once __DIR__ . '/../models/artist.php';


class ArtistManagementController extends Controller
{
    function __construct()
    {
        if (isset($_POST['name']) || isset($_POST['id'])) {
            $artist = new Artist();
            $artist->name = $_POST['name'];
            $artist->id = $_POST['id'];
            print_r($artist);
            $ArtistService = new ArtistService();
            // if ($artist->id == 0) {
            //     $ArtistService->createArtist($artist);
            // } else {
            //     $ArtistService->updateArtist($artist);
            // }
        }
    }




    function index()
    {
        require_once __DIR__ . '/../views/header/index.php';

        $ArtistService = new ArtistService();
        $artists = $ArtistService->getArtists();

        ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($artists as $artist) {
                        echo '<form action="/test" method="post">
                        <input type="hidden"  name="id" value="' . $artist->id . '">
                        <input type="hidden"  name="name" value="' . $artist->name . '">';
                        echo '<tr>';
                        echo '<th scope="row">' . $artist->id . '</th>';
                        echo '<td>' . $artist->name . '</td>';
                        echo '<td>
                        <button type="submit" value="test" class="btn btn-primary"> edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>';



                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <?php

        require_once __DIR__ . '/../views/footer/index.php';
    }
}