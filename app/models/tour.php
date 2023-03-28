<?php
class Tour {
    private int $id;
    private string $language;
    private DateTime $datetime;
    private string $gathering_location;
    private int $employee_id; 
    private string $employee_name;
    private int $capacity;
    private float $price;
    private float $group_price;

    public function __construct(int $id, string $language, string $datetime, string $gathering_location, int $employee_id, string $employee_name, int $capacity, float $price, float $group_price) {
        $this->id = $id;
        $this->language = $language;
        $this->datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
        $this->gathering_location = $gathering_location;
        $this->employee_id = $employee_id;
        $this->employee_name = $employee_name;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->group_price = $group_price;
    }

    public function toObject(){
        return (object) [
            'language' => $this->language,
            '$datetime' => $this->datetime,
            'employee_id' => $this->employee_id,
            'employee_name' => $this->employee_name,
            'capacity' => $this->capacity,
            'price' => $this->price,
            'group_price' => $this->group_price
        ];
    }
    
    public function getId() : int {
        return $this->id;
    }

    public function getLanguage():string{
        return $this->language;
    }

    public function getEmployeeId():int{
        return $this->employee_id;
    }

    public function getEmployeeName():string{
        return $this->employee_name;
    }

    public function getCapacity():int{
        return $this->capacity;
    }

    public function getPrice():float{
        return $this->price;
    }
    public function getPriceFormatted() : string {
        return "€ " . number_format($this->price, 2);
    }

    public function getGroupPrice():float{
        return $this->group_price;
    }
    public function getGroupPriceFormatted() : string {
        return "€ " . number_format($this->group_price, 2);
    }

    public function getDateTime():DateTime{
        return $this->datetime;
    }
    public function getDatetimeFormatted() : string {
        return date_format($this->datetime, 'd-m-Y H:i');
    }

    public function getGatheringLocation() : string {
        return $this->gathering_location;
    }

    public function setLanguage(string $language):void{
        $this->language = $language;
    }

    public function setGatheringLocation($gathering_location) : void {
        $this->gathering_location = $gathering_location;
    }

    public function setEmployeeId(int $employee_id):void{
        $this->employee_id = $employee_id;
    }

    public function setEmployeeName(string $employee_name):void{
        $this->employee_name = $employee_name;
    }

    public function setCapacity(int $capacity):void{
        $this->capacity = $capacity;
    }

    public function setPrice(float $price):void{
        $this->price = $price;
    }

    public function setGroupPrice(float $group_price):void{
        $this->group_price = $group_price;
    }
}

?>