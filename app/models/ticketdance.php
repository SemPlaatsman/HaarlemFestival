<?php

class TicketDance extends Item {
    private int $id;
    private int $performance_id;
    private int $artist_id;
    private string $artist_name;
    private int $venue_id;
    private string $venue_name;
    private DateTime $start_date;
    private DateTime $end_date;
    private int $nr_of_people;

    public function __construct(int $item_id = null, int $order_id = null, int $event_id = null, string $event_name = null, float $total_price = null, int $VAT = null, string $QR_Code = null, 
    int $id = null, int $performance_id = null, int $artist_id = null, string $artist_name = null, int $venue_id = null, string $venue_name = null, string $start_date = null, string $end_date = null, int $nr_of_people = null) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        if($id != null){
            $this->id = $id;
            $this->performance_id = $performance_id;
            $this->artist_id = $artist_id;
            $this->artist_name = $artist_name;
            $this->venue_id = $venue_id;
            $this->venue_name = $venue_name;
            $this->start_date = DateTime::createFromFormat('Y-m-d H:i:s', $start_date);
            $this->end_date = DateTime::createFromFormat('Y-m-d H:i:s', $end_date);
            $this->nr_of_people = $nr_of_people;
        }
        
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of performance_id
     */ 
    public function getPerformanceId()
    {
        return $this->performance_id;
    }

    /**
     * Get the value of artist_id
     */ 
    public function getArtistId()
    {
        return $this->artist_id;
    }

    /**
     * Get the value of artist_name
     */ 
    public function getArtistName()
    {
        return $this->artist_name;
    }

    /**
     * Get the value of venue_id
     */ 
    public function getVenueId()
    {
        return $this->venue_id;
    }

    /**
     * Get the value of venue_name
     */ 
    public function getVenueName()
    {
        return $this->venue_name;
    }

    /**
     * Get the value of start_date
     */ 
    public function getStartDate()
    {
        return $this->start_date;
    }

    public function getStartDateFormatted()
    {
        return date_format($this->start_date, 'd-m-Y H:i');
    }

    /**
     * Get the value of end_date
     */ 
    public function getEndDate()
    {
        return $this->end_date;
    }

    public function getEndDateFormatted()
    {
        return date_format($this->end_date, 'd-m-Y H:i');
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of performance_id
     *
     * @return  self
     */ 
    public function setPerformance_id($performance_id)
    {
        $this->performance_id = $performance_id;

        return $this;
    }

    /**
     * Set the value of artist_id
     *
     * @return  self
     */ 
    public function setArtist_id($artist_id)
    {
        $this->artist_id = $artist_id;

        return $this;
    }

    /**
     * Set the value of artist_name
     *
     * @return  self
     */ 
    public function setArtist_name($artist_name)
    {
        $this->artist_name = $artist_name;

        return $this;
    }

    /**
     * Set the value of venue_id
     *
     * @return  self
     */ 
    public function setVenue_id($venue_id)
    {
        $this->venue_id = $venue_id;

        return $this;
    }

    /**
     * Set the value of venue_name
     *
     * @return  self
     */ 
    public function setVenue_name($venue_name)
    {
        $this->venue_name = $venue_name;

        return $this;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */ 
    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */ 
    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Set the value of nr_of_people
     *
     * @return  self
     */ 
    public function setNr_of_people($nr_of_people)
    {
        $this->nr_of_people = $nr_of_people;

        return $this;
    }
}
?>