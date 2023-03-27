<?php
require_once __DIR__ . '/tour.php';

class TicketHistory extends Item {
    protected int $id;
    protected Tour $tour;
    protected int $nr_of_people;

    public function __construct(int $item_id = null, int $order_id = null, int $event_id = null, string $event_name = null, float $total_price = null, int $VAT = null, string $QR_Code = null, 
    int $id = null, Tour $tour, int $nr_of_people = null) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        if($id != null){
            $this->id = $id;
            $this->tour = $tour;
            $this->nr_of_people = $nr_of_people;
        }
    }

    /**
     * Method to get a string with all the variables needed to replicate this object
     */
    public function getLink() : string {
        return $this->getTour()->getId() . ";" . $this->getNrOfPeople() . ";" . $this->getEventId();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tour
     */ 
    public function getTour()
    {
        return $this->tour;
    }

    /**
     * Set the value of tour
     *
     * @return  self
     */ 
    public function setTour(Tour $tour) : self
    {
        $this->tour = $tour;

        return $this;
    }

    /**
     * Get the value of nr_of_people
     */ 
    public function getNrOfPeople()
    {
        return $this->nr_of_people;
    }

    /**
     * Set the value of nr_of_people
     *
     * @return  self
     */ 
    public function setNrOfPeople(int $nr_of_people) : self
    {
        $this->nr_of_people = $nr_of_people;

        return $this;
    }
}
?>