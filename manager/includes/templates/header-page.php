<?php require_once 'includes/functions/db_config.php'; ?>

<?php if (!isset($_SESSION['admin_id'])) {
   redirect_to('./');
} ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>EuanchorDispatch — Logistics, Cargo & Courier Website</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="shortcut icon" href="../img/logo-mini.png">

<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link href="assets/plugins/bootstrap-datepicker/css/time.css" rel="stylesheet">

    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- App css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/sweet-alert2/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="css/new.css"> 

<script src="assets/js/modernizr.min.js"></script>

</head>
<style>
    #datatable_wrapper{
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    #datatable_previous{
        margin-left: auto;
    }

    #datatable_filter{
        float: right;
    }
</style>


<body>

<!-- Begin page -->
<div id="wrapper">

<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="Dashboard" class="logo">
            <span>
                <img src="../img/logo-main.png" alt="" style="height: initial; width: 160px;">
            </span>
            <i>
                <img src="../img/logo-mini.png" alt="">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/avatar-1.png" alt="" class="rounded-circle"> <span class="ml-1">Admin <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <a href="logout" class="dropdown-item notify-item">
                        <i class="ti-power-off"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>

    </nav>

</div>
<!-- Top Bar End -->