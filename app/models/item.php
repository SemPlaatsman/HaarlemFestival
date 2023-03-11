<?php
abstract class Item {
    protected int $item_id;
    protected int $order_id;
    protected int $event_id;
    protected string $event_name;
    protected float $total_price;
    protected int $VAT;
    protected string $QR_Code;

    public function __construct(int $item_id, int $order_id, int $event_id, string $event_name, float $total_price, int $VAT, string $QR_Code) {
        $this->item_id = $item_id;
        $this->order_id = $order_id;
        $this->event_id = $event_id;
        $this->event_name = $event_name;
        $this->total_price = $total_price;
        $this->VAT = $VAT;
        $this->QR_Code = $QR_Code;
    }

    /**
     * Get the value of item_id
     */ 
    public function getItemId()
    {
        return $this->item_id;
    }

    /**
     * Get the value of order_id
     */ 
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Get the value of event_id
     */ 
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Get the value of event_name
     */ 
    public function getEventName()
    {
        return $this->event_name;
    }

    /**
     * Get the value of total_price
     */ 
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * Get the value of VAT
     */ 
    public function getVAT()
    {
        return $this->VAT;
    }

    /**
     * Get the value of QR_Code
     */ 
    public function getQRCode()
    {
        return $this->QR_Code;
    }
}

?>