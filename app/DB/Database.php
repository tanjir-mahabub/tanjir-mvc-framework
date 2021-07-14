<?php 
namespace App\DB;

class Database
{
    private $host;
    private $dbName;    
    private $username;
    private $password;
    private $result = array(); 
    public $mysqli;

    public function __construct () 
    {
        $this->connect();        
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }
    }

    private function connect()
    {
        $this->host = HOST;
        $this->dbName = DBNAME;    
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->mysqli = new \mysqli($this->host,$this->username,$this->password, $this->dbName); 
        return $this->mysqli;       
    }    

    public function select($table, $rows = '*', $where = null, $order = null)
    {
        $sql = 'SELECT '.$rows.' FROM '.$table;
        if($where != null) {
            $sql .= ' WHERE '.$where;
        }            
        if($order != null) {
            $sql .= ' ORDER BY '.$order;
        }
        
        $result = $this->mysqli->query($sql);
        
        if($result) 
        {            
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function insert($table, $para=array()){
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);
        
        $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->mysqli->query($sql);

        if ($result === TRUE && !isset($_COOKIE['token'])) {
            echo "<p class='alert alert-success'>New record created successfully</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $result->error;
          }
    }

    public function __destruct(){
        $this->mysqli->close();
    }
}