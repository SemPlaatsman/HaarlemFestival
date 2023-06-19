<?php
require_once __DIR__ . '/artist.php';
require_once __DIR__ . '/venue.php';

class Performance {
    private int $id;
    private Artist $artist;
    private Venue $venue;
    private Datetime $start_date;
    private Datetime $end_date;
    private float $price;

    public function __construct(int $id = null, Artist $artist, Venue $venue, string $start_date = null, string $end_date = null, float $price = null) 
    {
        $this->id = $id ?? 0;
        $this->artist = $artist;
        $this->venue = $venue;
        if (isset($start_date)) $this->start_date = (DateTime::createFromFormat('Y-m-d H:i:s', $start_date) == false) ? DateTime::createFromFormat('Y-m-d H:i', $start_date) : DateTime::createFromFormat('Y-m-d H:i:s', $start_date);
        if (isset($end_date)) $this->end_date = (DateTime::createFromFormat('Y-m-d H:i:s', $end_date) == false) ? DateTime::createFromFormat('Y-m-d H:i', $end_date) : DateTime::createFromFormat('Y-m-d H:i:s', $end_date);
        $this->price = $price ?? 0;
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