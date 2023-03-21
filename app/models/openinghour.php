<?php

class OpeningHour
{
    private int $id;
    // FOREIGN KEY restaurant_id
    private int $restaurant_id;
    // FOREIGN KEY restaurant_id
    private string $restaurant_name;
    private int $day_of_week;
    private DateTime $opening_time;
    private DateTime $closing_time;

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
     * @return int
     */
    public function getRestaurant_id(): int
    {
        return $this->restaurant_id;
    }

    /**
     * @param int $restaurant_id 
     * @return self
     */
    public function setRestaurant_id(int $restaurant_id): self
    {
        $this->restaurant_id = $restaurant_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRestaurant_name(): string
    {
        return $this->restaurant_name;
    }

    /**
     * @param string $restaurant_name 
     * @return self
     */
    public function setRestaurant_name(string $restaurant_name): self
    {
        $this->restaurant_name = $restaurant_name;
        return $this;
    }

    /**
     * @return int
     */
    public function getDay_of_week(): int
    {
        return $this->day_of_week;
    }

    /**
     * @param int $day_of_week 
     * @return self
     */
    public function setDay_of_week(int $day_of_week): self
    {
        $this->day_of_week = $day_of_week;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getOpening_time(): DateTime
    {
        return $this->opening_time;
    }

    /**
     * @param DateTime $opening_closing 
     * @return self
     */
    public function setOpening_time(DateTime $opening_time): self
    {
        $this->opening_time = $opening_time;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getClosing_time(): DateTime
    {
        return $this->closing_time;
    }

    /**
     * @param DateTime $closing_time 
     * @return self
     */
    public function setClosing_time(DateTime $closing_time): self
    {
        $this->closing_time = $closing_time;
        return $this;
    }
}

?>