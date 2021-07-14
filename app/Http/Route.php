<?php 

namespace App\Http;
use App\Controllers\FormController;

class Route 
{
    private static array $routes;

    public static function get ($path, $callback)
    {
        
        self::$routes[] = $path;

        if($_GET['url'] == $path)
        {
            $callback->__invoke();
        } 
        else if($_GET['url'] == "") {
            require_once APP_ROOT . "/views/welcome.php";
        }
        
    }

}