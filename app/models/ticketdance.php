<?php
require_once __DIR__ . '/item.php';
require_once __DIR__ . '/performance.php';

class TicketDance extends Item {
    private int $id;
    private Performance $performance;
    private int $nr_of_people;

    public function __construct(int $item_id = null, int $order_id = null, int $event_id = null, string $event_name = null, float $total_price = null, int $VAT = null, string $QR_Code = null, 
    int $id = null, Performance $performance = null, int $nr_of_people = null) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        isset($id) ? $this->id = $id : null;
        $this->performance = $performance;
        $this->nr_of_people = $nr_of_people;
    }

    /**
     * Method to get a string with all the variables needed to replicate this object
     */
    public function getLink() : string {
        return $this->getPerformance()->getId() . ";" . $this->getNrOfPeople() . ";" . $this->getEventId();
    }

    /**
     * Set the value of total_price
     *
     * @return  self
     */ 
    public function setTotalPrice($total_price = null) : self
    {
        if (isset($total_price)) {
            $this->total_price = $total_price;
        } else {
            $this->total_price = ($this->nr_of_people * $this->performance->getPrice());
        }
        return $this;
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
    public function setId($id) : self
    {
        $this->id = $id;

        return $this;
    }
    
    /**
     * Get the value of performance
     */ 
    public function getPerformance()
    {
        return $this->performance;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setPerformance($performance) : self
    {
        $this->performance = $performance;

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
     * Set the value of id
     *
     * @return  self
     */ 
    public function setNrOfPeople($nr_of_people) : self
    {
        $this->nr_of_people = $nr_of_people;

        return $this;
    }
}
?>