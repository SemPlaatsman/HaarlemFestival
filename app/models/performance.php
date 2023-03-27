<?php
require_once __DIR__ . '/artist.php';
require_once __DIR__ . '/venue.php';

class Performance {
    protected int $id;
    protected Artist $artist;
    protected Venue $venue;
    protected Datetime $start_date;
    protected Datetime $end_date;
    protected float $price;

    public function __construct(int $id, Artist $artist, Venue $venue, string $start_date, string $end_date, float $price) 
    {
        $this->id = $id;
        $this->artist = $artist;
        $this->venue = $venue;
        $this->start_date = DateTime::createFromFormat('Y-m-d H:i:s', $start_date);
        $this->end_date = DateTime::createFromFormat('Y-m-d H:i:s', $end_date);
        $this->price = $price;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of artist
     */ 
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Get the value of venue
     */ 
    public function getVenue()
    {
        return $this->venue;
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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    public function getPriceFormatted()
    {
        return "€ " . number_format($this->price, 2);
    }
}
?>