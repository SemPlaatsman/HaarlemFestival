<?php

class Venue
{
    private int $id;
    private string $name;
    private string $location;
    private int $seats;

    function __construct(int $id = null, string $name = null, string $location = null, int $seats = null)
    {
        $this->id = $id ?? 0;
        $this->name = $name ?? '';
        $this->location = $location ?? '';
        $this->seats = $seats ?? 0;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeats(): int
    {
        return $this->seats;
    }

    /**
     * @param int $seats 
     * @return self
     */
    public function setSeats(int $seats): self
    {
        $this->seats = $seats;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location 
     * @return self
     */
    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }
}
?>