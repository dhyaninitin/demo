<?php 

session_start();
include_once("models/Login_model.php");
class Login{
    public $model;
    public function __construct(){  
//        constructor....
        $this->model = new Login_model();
    }
    function check_login(){

        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

        $send_details = $this->model->check_login($user_name,$password);
            if($send_details == FALSE){
                $_SESSION['warning'] = "Authentication error. Please check one of the details and try again.";
                header('location:index');
                    
            }else{

                 $_SESSION['id'] = $send_details['id'];
                 $_SESSION['name'] = $send_details['name'];
                 $_SESSION['email'] = $send_details['email'];
                 $_SESSION['remember_token'] = $send_details['remember_token'];
                 $_SESSION['token'] = $send_details['token'];
                 $_SESSION['title'] = $send_details['title'];
                 $_SESSION['dob'] = $send_details['dob'];
                 $_SESSION['state'] = $send_details['state'];
                 $_SESSION['pincode'] = $send_details['pincode'];
                 $_SESSION['t_organization'] = $send_details['t_organization'];
                 $_SESSION['t_bussiness'] = $send_details['t_bussiness'];
                 $_SESSION['mobile'] = $send_details['mobile'];
                 $_SESSION['b_url'] = $send_details['b_url'];
                 $_SESSION['image'] = $send_details['image'];
                 $_SESSION['type'] = $send_details['type'];
                 $_SESSION['status'] = $send_details['status'];
                 $_SESSION['user_type'] = $send_details['user_type'];
                 
                 if( strcasecmp($send_details['user_type'], "super admin") == 0){
                    $_SESSION['success'] = "Welcom Nitin Dhyani";
                    header('location:dashboard');

                 }else{
                    $_SESSION['info'] = "Authentication error.No Permision.";
                    header('location:index');

                 }
            }

    }


  







    

}

?>