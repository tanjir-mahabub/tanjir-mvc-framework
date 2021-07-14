<?php 
namespace App\Controllers;

class Controller
{
    public static function view($viewName) 
    {                
        require_once APP_ROOT . "/views/$viewName.php";
    }


    
}