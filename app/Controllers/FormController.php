<?php 

namespace App\Controllers;

use App\Models\FormModel;

class FormController
{

    private function validate_input($data) {
        $data = trim($data);
        $data = strip_tags($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function create() 
    {
        if (!isset($_COOKIE['token']) && $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
            
            $_POST['buyer'] = $this->validate_input($_POST['buyer']);
            $_POST['buyer_email'] = $this->validate_input($_POST['buyer_email']);
            $_POST['buyer_ip'] = $this->validate_input($_POST['buyer_ip']);
            $_POST['note'] = $this->validate_input($_POST['note']);
            $_POST['city'] = $this->validate_input($_POST['city']);
            $_POST['amount'] = $this->validate_input($_POST['amount']);
            $_POST['items'] = $this->validate_input($_POST['items']);            
            $_POST['entry_by'] = $this->validate_input($_POST['entry_by']);
            
            $receipt_id = $this->validate_input($_POST['receipt_id']);
            $phone = $this->validate_input($_POST['phone']);
            $pattern = '/^880|^88|^0|^/m';
            $_POST['phone'] = preg_replace($pattern, "880", $phone);

            $hashKey = $this->validate_input($_POST['hash_key']);
            $salt = hash("sha512", $hashKey);
            $hash_key = hash('sha512', $salt.$receipt_id);
            $_POST['hash_key'] = $hash_key;

            setcookie("token", $hash_key, time() + 86400);
            
            $model = new FormModel($_POST);
        }

        else {
            echo "<p class='alert alert-danger'>Sorry! you have already submitted this form. Please try again after 24 hours. Thank you!</p>";
        }
        
        
    }
}