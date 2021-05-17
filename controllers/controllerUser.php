<?php
ob_start ();

include_once("models/User_model.php");

class ControllerUser
{
    public $model;

    public function __construct(){  
//        constructor....
        $this->model = new User_Model();
    } 
       public function index()
    {
//        login_page first page....
        include 'views/login.php';
    }


}
?>