<?php 

namespace App\Models;

use App\DB\Database;

class FormModel 
{
    protected $id;
    protected $amount;
    protected $buyer;
    protected $receipt_id;
    protected $items;
    protected $buyer_email;
    protected $buyer_ip;
    protected $note;
    protected $city;
    protected $phone;
    protected $hash_key;
    protected $entry_at;
    protected $entry_by;
    protected array $arr;

    public function __construct(array $arr) {
        
        $this->amount = $arr['amount'];
        $this->buyer = $arr['buyer'];
        $this->receipt_id = $arr['receipt_id'];        
        $this->items = $arr['items'];
        $this->buyer_email = $arr['buyer_email'];
        $this->buyer_ip = $arr['buyer_ip'];
        $this->note = $arr['note'];
        $this->city = $arr['city'];
        $this->phone = $arr['phone'];
        $this->hash_key = $arr['hash_key'];
        $this->entry_by = $arr['entry_by'];
        
        $this->save($arr);
        
    }

    public static function read() {
        
    
        $db = new Database();
        $results = $db->select("form_entry");
        return $results;
        
    }

    protected function save(array $data) {
        
        $db = new Database();

        $res = $db->insert("form_entry", $data);

    }
}