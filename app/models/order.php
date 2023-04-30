<?php
class order{
    private int $id;
    private DateTime $paytime;
    private bool $payment_status;
    private float $total_price;
    private float $VAT;
    private string $where_event;
    private string $what_event;
    private DateTime $when_event;

    // create constructor with all parameters and getters and setters for all parameters
    function __construct(int $id, DateTime $paytime, bool $payment_status, float $total_price, float $VAT, string $where_event, string $what_event, DateTime $when_event){
        $this->id = $id;
        $this->paytime = $paytime;
        $this->payment_status = $payment_status;
        $this->total_price = $total_price;
        $this->VAT = $VAT;
        $this->where_event = $where_event;
        $this->what_event = $what_event;
        $this->when_event = $when_event;
    }

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getPaytime(): DateTime
    {
        return $this->paytime;
    }

    /**
     * @param DateTime $paytime 
     */
    public function setPaytime(DateTime $paytime)
    {
        $this->paytime = $paytime;
    }

    /**
     * @return bool
     */
    public function getPayment_status(): bool
    {
        return $this->payment_status;
    }

    /**
     * @param bool $payment_status 
     */
    public function setPayment_status(bool $payment_status)
    {
        $this->payment_status = $payment_status;
    }

    /**
     * @return float
     */

    public function getTotal_price(): float
    {
        return $this->total_price;
    }

    /**
     * @param float $total_price 
     */

    public function setTotal_price(float $total_price)
    {
        $this->total_price = $total_price;
    }

    /**
     * @return float
     */

    public function getVAT(): float
    {
        return $this->VAT;
    }

    /**
     * @param float $VAT 
     */

    public function setVAT(float $VAT)
    {
        $this->VAT = $VAT;
    }

    /**
     * @return string
     */

    public function getWhere_event(): string
    {
        return $this->where_event;
    }

    /**
     * @param string $where_event 
     */

    public function setWhere_event(string $where_event)
    {
        $this->where_event = $where_event;
    }

    /**
     * @return string
     */

    public function getWhat_event(): string
    {
        return $this->what_event;
    }

    /**
     * @param string $what_event 
     */

    public function setWhat_event(string $what_event)
    {
        $this->what_event = $what_event;
    }

    /**
     * @return DateTime
     */

    public function getWhen_event(): DateTime
    {
        return $this->when_event;
    }

    /**
     * @param DateTime $when_event 
     */

    public function setWhen_event(DateTime $when_event)
    {
        $this->when_event = $when_event;
    }

    
}

?>