<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/artistservice.php';
require_once __DIR__ . '/../models/artist.php';


class ArtistManagementController extends Controller
{
    function __construct()
    {
        $ArtistService = new ArtistService();
        $artists = $ArtistService->getArtists();
        foreach($artists as  $artist){
        print_r( $artist);  
        }
    }
}