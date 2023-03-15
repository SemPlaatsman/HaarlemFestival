<?php

class TicketDance extends Item {
    private int $id;
    private int $performance_id;
    private int $artist_id;
    private string $artist_name;
    private int $venue_id;
    private string $venue_name;
    private string $venue_location;
    private DateTime $start_date;
    private DateTime $end_date;
    private float $ticket_price;
    private int $nr_of_people;

    public function __construct(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code, 
    int $id, int $performance_id, int $artist_id, string $artist_name, int $venue_id, string $venue_name, string $venue_location, string $start_date, string $end_date, float $ticket_price, int $nr_of_people) {
        parent::__construct($item_id, $order_id, $event_id, $event_name, $total_price, $VAT, $QR_Code);
        $this->id = $id;
        $this->performance_id = $performance_id;
        $this->artist_id = $artist_id;
        $this->artist_name = $artist_name;
        $this->venue_id = $venue_id;
        $this->venue_name = $venue_name;
        $this->venue_location = $venue_location;
        $this->start_date = DateTime::createFromFormat('Y-m-d H:i:s', $start_date);
        $this->end_date = DateTime::createFromFormat('Y-m-d H:i:s', $end_date);
        $this->ticket_price = $ticket_price;
        $this->nr_of_people = $nr_of_people;
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
     * Get the value of venue_location
     */ 
    public function getVenue_location()
    {
        return $this->venue_location;
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
     * Get the value of ticket_price
     */ 
    public function getTicketPrice()
    {
        return $this->ticket_price;
    }

    public function getTicketPriceFormatted()
    {
        return "€ " . number_format($this->ticket_price, 2);
    }

    /**
     * Get the value of nr_of_people
     */ 
    public function getNrOfPeople()
    {
        return $this->nr_of_people;
    }
}
?>