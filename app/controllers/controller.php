<?php
/**
 * function to display view
 * 
 * @param array $model
 */
abstract class Controller
{
    protected function displayView($model = [])
    {
        $directory = strtolower(substr(get_class($this), 0, -10));
        $view = strtolower(debug_backtrace()[1]['function']);
        require_once __DIR__ . "/../views/$directory/$view.php";
    }
}