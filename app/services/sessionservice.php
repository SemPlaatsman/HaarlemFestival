<?php
require_once __DIR__ . '/../repositories/sessionrepository.php';

class SessionService
{

    private $sessionRepository;

    public function __construct()
    {
        $this->sessionRepository = new SessionRepository();
    }

    public function getSession()
    {
        return $this->sessionRepository->getSession();
    }

    public function deleteSession(int $id)
    {
        return $this->sessionRepository->deleteSession($id);
    }
}
?>