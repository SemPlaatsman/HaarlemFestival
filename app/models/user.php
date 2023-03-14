<?php 
class User {
    private int $id;
    private string $email;
    private bool $isAdmin = false;
    private string $username;

    function __construct(int $id = null, string $email = null, bool $isAdmin = null, string $username = null) {
        $this->id = $id;
        $this->email = $email;
        $this->isAdmin = $isAdmin;
        $this->username = $username;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the value of isAdmin
     *
     * @return bool
     */
    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * Get the value of username
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}
?>