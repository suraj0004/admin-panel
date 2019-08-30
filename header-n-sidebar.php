<?php
$siteUrl = "http://".$_SERVER['HTTP_HOST'];
session_start();
if (!isset( $_SESSION["admin_email"])) {
   header("location: /login.html");
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jallwa Admin panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" >
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=$siteUrl ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
th,td{
  padding:2px;
}
#overlay {
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 999;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    display: none;
    
   
}
.loader{
  width: 100px;
  height: 100px;
  border-radius: 100%;
  position: fixed;
  top: 40%;
  left:45%;
}
#new_category{
  display: none;
}
/* LOADER 1 */

#loader-1:before, #loader-1:after{
  content: "";
  position: absolute;
  top: -10px;
  left: -10px;
  width: 100%;
  height: 100%;
  border-radius: 100%;
  border: 10px solid transparent;
  border-top-color: #3498db;
}

#loader-1:before{
  z-index: 100;
  animation: spin 1s infinite;
}

#loader-1:after{
  border: 10px solid #ccc;
}

@keyframes spin{
  0%{
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  100%{
    -webkit-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.new_category_form{
  background:white;
  padding:15px;
  border-radius:10px;
  box-shadow:4px 4px lightgrey;
}
/* LOADER 2 */
</style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=$siteUrl ?>/index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ja</b>DU</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="<?=$siteUrl ?>#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="http://jallwa.in/images-jallwa/logo-trans.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Jallwa</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="http://jallwa.in/images-jallwa/logo-trans.png" class="img-circle" alt="User Image">

                <p>
                  Jallwa
                  <small>Member since Nov. 2018</small>
                </p>
              </li>
  
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/pages/profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/controllers/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="http://jallwa.in/images-jallwa/logo-trans.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Jallwa</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($page == "index")?"active":"" ?>" >
          <a href="<?=$siteUrl ?>/index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      
          </a>
         
        </li>
         <li class="<?= ($page == "user")?"active":"" ?>" >
          <a href="<?=$siteUrl ?>/pages/user.php">
            <i class="fa fa-user"></i> <span>Users</span>
      
          </a>
         
        </li>
        <li class="<?= ($page == "posts")?"active":"" ?>" >
          <a href="<?=$siteUrl ?>/pages/posts.php">
            <i class="fa fa-file"></i> <span>Posts</span>
      
          </a>
         
        </li>
        <li class="<?= ($page == "Category Lvl 1")?"active":"" ?>" >
          <a href="<?=$siteUrl ?>/pages/category-Lvl-1.php">
            <i class="fa fa-list"></i> <span>Category (Lvl 1)</span>
      
          </a>
         
        </li>
        <li class="<?= ($page == "Category Lvl 2")?"active":"" ?>" >
          <a href="<?=$siteUrl ?>/pages/category-Lvl-2.php">
            <i class="fa fa-list"></i> <span>Sub-Category (Lvl 2)</span>
      
          </a>
         
        </li>
        <li class="<?= ($page == "Category Lvl 3")?"active":"" ?>" >
          <a href="<?=$siteUrl ?>/pages/category-Lvl-3.php">
            <i class="fa fa-list"></i> <span>Sub-Category (Lvl 3)</span>
      
          </a>
         
        </li>


        <!-- <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li> -->
 

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>