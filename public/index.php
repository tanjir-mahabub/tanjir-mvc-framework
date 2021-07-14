<?php
require __DIR__ . '/../vendor/autoload.php';

require_once '../app/Config/config.php';
require_once '../app/Http/web.php';


use App\Controllers\DBController;

use App\Controllers\FormController;


use App\Config\FormKey;

$hashKey = new FormKey();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    if(!isset($_POST['hash_key']) || !$hashKey->validate())
    {
        $form = new FormController();
        $form->create();
    }
}
