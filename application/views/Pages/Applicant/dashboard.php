<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>


<html>
<head>

    <title>M-ploy</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/png">
    <style type="text/css">

        .un {text-decoration: none; }


    </style>


    <script src="<?php echo base_url();?>assets/crud-assets/js/jquery-1.11.2.min.js"></script>

    <script type = "text/javascript" src="<?php echo base_url('assets/crud-assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/crud-assets/datatables/js/dataTables.bootstrap.js')?>"></script>


    <link href="<?php echo base_url('assets/crud-assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/AdminLTE.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/skin-green.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crud-assets/css/bootstrap.min.css" />

    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



</head>

<body class="skin-green">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">


        <!-- Logo -->
        <a href="" style="text-decoration:none"class="un logo"><b>M-ploy</b></a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
<<<<<<< HEAD
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $full_name ?> - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(); ?>Applicant/profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(); ?>Applicant/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
=======


                    <!-- User Account Menu -->
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="<?php echo site_url('Applicant/logout') ?>"> <i class="fa fa-sign-out"></i>
                            Log out </a>

>>>>>>> master
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<<<<<<< HEAD
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $username ?></p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="active">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Applicant/interviewRequests">
                        <i class="fa fa-folder"></i> <span>Interview Requests</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Applicant/employers">
                        <i class="fa fa-dashboard"></i> <span>Companies</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Applicant/notifications">
                        <i class="fa fa-bell-o"></i> <span>Notifications</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
=======
>>>>>>> master


    <?php $this->load->view('Pages/Applicant/navigation_bar');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <!--     <h3 class="box-title">Data Contractor</h3>-->
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <!-- Main content -->
                            <section class="content">

                                <!-- Your Page Content Here -->

                                <?php $this->load->view('Pages/Applicant/content');?>



                            </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->



                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">

        </div>
        <!-- Default to the left -->
        <strong>&copy; 2017 M-Ploy  &middot; <a href="<?php echo base_url();?>About">About</a> &middot; <a href="<?php echo base_url(); ?>Blog">Blog</a> &middot; <a href="#">Privacy Policy</a> &middot; <a href="#">Terms</a>
        </strong> All rights reserved.
    </footer>

</div><!-- ./wrapper -->



<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/crud-assets/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/js/adminlte.min.js"></script>

</body>
</html>