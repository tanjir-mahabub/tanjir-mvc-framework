<?php

namespace App\Config;

class FormKey
{
    private $formKey;
    private $old_formKey;

    public function __construct()
    {
        //We need the previous key so we store it
        if(isset($_SESSION['hash_key']))
        {
            $this->old_formKey = $_SESSION['hash_key'];
        }
    }

    private function generateKey()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $uniqid = uniqid(mt_rand(), true);
        $salt = hash("sha512", microtime(true).mt_rand(10000,90000));
        
        return hash('sha512', $salt.$ip.$uniqid);
    }

    public function outputKey() 
    {
        $this->formKey = $this->generateKey();
        
        $_SESSION['hash_key'] = $this->formKey;
        
        echo "<input type='hidden' name='hash_key' id='hash_key' value='".$this->formKey."' />";
        
    }

    public function validate() 
    {
        if ($_POST['hash_key'] == $this->old_formKey)
        {            
            return true;
        }
        else 
        {
            return false;
        }
    }
    
}