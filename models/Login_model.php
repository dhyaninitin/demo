<?php
class Login_model {
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

    function check_login($user_name,$password){
        $user_name = mysqli_real_escape_string($this->conn,$user_name);
        $password = mysqli_real_escape_string($this->conn,$password);
        $login_query = mysqli_query($this->conn,"SELECT * FROM `users` WHERE `email` = '$user_name' and `password` = '$password'");
        if(mysqli_num_rows($login_query) == 1){
            $result = mysqli_fetch_array($login_query);
            return $result;               
        }
        else{
            return FALSE;            
        }
    	
    }

}
?>