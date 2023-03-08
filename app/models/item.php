<?php
class Item {
    private int $id;
    private int $orderId;
    private int $eventId;
    private float $totalPrice;
    private int $VAT;
    private string $QRCode;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get the value of userId
     */ 
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Get the value of totalPrice
     */ 
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Get the value of VAT
     */ 
    public function getVAT()
    {
        return $this->VAT;
    }

    /**
     * Get the value of QRCode
     */ 
    public function getQRCode()
    {
        return $this->QRCode;
    }
}

?>