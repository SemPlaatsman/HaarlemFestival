<?php
 class Item {
    protected int $item_id;
    protected int $order_id;
    protected int $event_id;
    protected string $event_name;
    protected float $total_price;
    protected int $VAT;
    protected string $QR_Code;

    public function __construct(int $item_id = null, int $order_id = null, int $event_id = null, string $event_name = null, float $total_price = null, int $VAT = null, string $QR_Code = null) {
        if($item_id!=null){
            $this->item_id = $item_id;
            $this->order_id = $order_id;
            $this->event_id = $event_id;
            $this->event_name = $event_name;
            $this->total_price = $total_price;
            $this->VAT = $VAT;
            $this->QR_Code = $QR_Code;
        }
        
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

    public function getTotalPriceFormatted()
    {
        return "€ " . number_format($this->total_price, 2);
    }

    /**
     * Set the value of total_price
     *
     * @return  self
     */ 
    public function setTotalPrice($total_price) : self
    {
        $this->total_price = $total_price;
        return $this;
    }

    /**
     * Get the value of VAT
     */ 
    public function getVAT()
    {
        return $this->VAT;
    }

    public function getVATFormatted()
    {
        return $this->VAT . "%";
    }

    /**
     * Get the value of QR_Code
     */ 
    public function getQRCode()
    {
        return $this->QR_Code;
    }

    /**
     * Set the value of item_id
     *
     * @return  self
     */ 
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;

        return $this;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */ 
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Set the value of event_id
     *
     * @return  self
     */ 
    public function setEvent_id($event_id)
    {
        $this->event_id = $event_id;

        return $this;
    }

    /**
     * Set the value of event_name
     *
     * @return  self
     */ 
    public function setEvent_name($event_name)
    {
        $this->event_name = $event_name;

        return $this;
    }

    /**
     * Set the value of total_price
     *
     * @return  self
     */ 
    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;

        return $this;
    }

    /**
     * Set the value of VAT
     *
     * @return  self
     */ 
    public function setVAT($VAT)
    {
        $this->VAT = $VAT;

        return $this;
    }

    /**
     * Set the value of QR_Code
     *
     * @return  self
     */ 
    public function setQR_Code($QR_Code)
    {
        $this->QR_Code = $QR_Code;

        return $this;
    }
}

?>