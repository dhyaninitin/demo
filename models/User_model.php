
<?php

session_start();
class User_Model {
    private $conn;
     public function Model()
     {
       error_reporting(E_ALL & ~E_NOTICE);
     }
    public function connect(){
        $connect = mysqli_connect('localhost','root','','soft_ebilling');
        return $connect;
    }
    function __construct(){
        $this->conn = $this->connect();
    }
}
?>