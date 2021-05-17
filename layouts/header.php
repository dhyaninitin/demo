<!DOCTYPE html>
<html>
<?php
date_default_timezone_set("Asia/kolkata");
 date_default_timezone_get();

include 'toster.php';
include_once('connection.php');
if(!isset($_SESSION['email'])){
  $_SESSION['error']= "PLease Login FIrst";
  header("location:login");    
}

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ebilling Software | Admin Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assest/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assest/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assest/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assest/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assest/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="assest/tosterjs/toster.min.css">
<script type="text/javascript" src="assest/tosterjs/toster.min.js"></script>
<script type="text/javascript" src="assest/tosterjs/tosterjquery.js"></script>
  <link rel="stylesheet" href="assest/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assest/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assest/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="assest/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assest/bower_components/bootstrap-daterangepicker/daterangepicker.css">


  <link rel="stylesheet" href="assest/dist/css/skins/_all-skins.min.css">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<!-- <body class="hold-transition skin-blue fixed sidebar-mini"> -->
<body class="hold-transition  fixed sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <a href="#" class="logo textcolor">
      <span class="logo-mini"><b>E</b>SOFT</span>
      <span class="logo-lg"><b>Ebilling </b>Software</span>
    </a>
   
    <nav class="navbar navbar-static-top">
    
      <a href="#" class="sidebar-toggle textcolor" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
             
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="assest/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> -->
          <!-- Notifications: style can be found in dropdown.less -->
          <!--   -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a> -->
            <!-- <ul class="dropdown-menu"> -->
              <!-- <li class="header">You have 9 tasks</li> -->
              <!-- <li>
               
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                 
                </ul>
              </li> -->
              <!-- <li class="footer">
                <a href="#">View all tasks</a>
              </li> -->
            <!-- </ul> -->
          <!-- </li> -->


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" >
              <img src="assest/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs textcolor" > <?php echo $_SESSION['name']; ?></span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="route.php?param=logout">
              <!-- <img src="assest/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <i class="fa fa-sign-out textcolor" aria-hidden="true"></i>
              <span class="hidden-xs textcolor">Logout</span>
            </a>
            </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears textcolor"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>