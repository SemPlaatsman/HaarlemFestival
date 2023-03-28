<?php
class ObjectHelper{
    public function checkEmpty(Object $obj): bool{
        $arr = (array)$obj;
        if (count($arr) == 0) {
            return true;
        
        }
        return false;
    }
}
?>