<?php

class Page
{
    private int $id;
    private string $name;
    private DateTime $date;
    private string $address;
    private int $seats;

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
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date 
     * @return self
     */
    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address 
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
?>