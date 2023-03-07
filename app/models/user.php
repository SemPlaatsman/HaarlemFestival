<?php 
class User {
    private int $id;
    private string $email;
    private bool $isAdmin = false;
    private string $name;

    function __construct(int $id = null, string $email = null, bool $isAdmin = null, string $name = null) {
        $this->id = $id;
        $this->email = $email;
        $this->isAdmin = $isAdmin;
        $this->name = $name;
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
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
?>