<?php
require_once __DIR__ . '/../exceptions/serviceexeption.php';
class errorHelper
{
    
    public function error404()
    {
        throw new ServiceException('Not found', 404);
    }

    public function error500()
    {
        throw new ServiceException('Internal server error', 500);
    }

    public function error400()
    {
        throw new ServiceException('Bad request', 400);
    }
}

