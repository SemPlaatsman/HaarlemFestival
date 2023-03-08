<?php

class Event
{
    private int $id;
    private string $name;
    private DateTime $start_date;
    private DateTime $end_date;

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
     * @return DateTime
     */
    public function getStart_date(): DateTime
    {
        return $this->start_date;
    }

    /**
     * @param DateTime $start_date 
     * @return self
     */
    public function setStart_date(DateTime $start_date): self
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getEnd_date(): DateTime
    {
        return $this->end_date;
    }

    /**
     * @param DateTime $end_date 
     * @return self
     */
    public function setEnd_date(DateTime $end_date): self
    {
        $this->end_date = $end_date;
        return $this;
    }
}
?>