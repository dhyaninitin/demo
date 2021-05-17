<?php
ob_start ();
session_start();
include_once("models/Admin_model.php");

class Controller
{
    public $model;

    public function __construct(){  
//        constructor....
        $this->model = new Admin_Model();
        
    } 
   
    function Clients(){
        include 'layouts/header.php';
        include 'layouts/sidebar.php';
        include 'views/Clients.php';
        include 'layouts/footer.php';
    }

    function Addclient(){
        $company_name =$_POST['company_name']; $client_name =$_POST['client_name']; $phone_number = $_POST['phone_number']; $emial_address = $_POST['emial_address'];
        $gst_number = $_POST['gst_number']; $country = $_POST['country'];  $State = $_POST['State']; $city= $_POST['city'];

        $shipping_country = $_POST['shipping_country']; $sjipping_state = $_POST['sjipping_state']; $shipping_city = $_POST['shipping_city']; 
        $sipping_zip_code = $_POST['sipping_zip_code']; $shipping_address = $_POST['shipping_address']; $lst_cst_number = $_POST['lst_cst_number'];

         $Addclient = $this->model->Addclient($company_name,$client_name,$phone_number,$emial_address,$gst_number,$country,$State,$city,$shipping_country,$sjipping_state,$shipping_city,$sipping_zip_code,$shipping_address,$lst_cst_number);
         if($Addclient == false){
             $_SESSION['warning'] = "Something Wrong,Please Check";
            
         }elseif($Addclient == 'duplicate'){
              $_SESSION['error'] = "This Client Already Exists";

         }else{
            $_SESSION['success'] = "Client Add Successfully";
            
         }
         header('location:Clients');

 
    }

   

  
    










}
    ?>