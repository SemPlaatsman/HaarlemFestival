<?php
class Tour{
    private string $language;

    private DateTime $date;
    private int $employee_id; 
    private string $employee_name;
    private int $capacity;
    private float $price;
    private float $group_price;

    public function __construct(string $language,DateTime $date ,int $employee_id, string $employee_name, int $capacity, float $price, float $group_price){
        $this->language = $language;
        $this->date = $date;
        $this->employee_id = $employee_id;
        $this->employee_name = $employee_name;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->group_price = $group_price;
    }

    public function toObject(){
        return (object) [
            'language' => $this->language,
            'date' => $this->date,
            'employee_id' => $this->employee_id,
            'employee_name' => $this->employee_name,
            'capacity' => $this->capacity,
            'price' => $this->price,
            'group_price' => $this->group_price
        ];
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

    public function getGroupPrice():float{
        return $this->group_price;
    }

    public function getDate():DateTime{
        return $this->date;
    }

    public function setLanguage(string $language):void{
        $this->language = $language;
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