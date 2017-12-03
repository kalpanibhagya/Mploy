<?php
$user_id=$this->session->userdata('company_id');

if(!$user_id){

    redirect('Company/Login');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/AdminLTE/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>Welcome/Company_main" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>M-Ploy</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata('username'); ?>
                                    <small><?php echo $this->session->userdata('email'); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(); ?>Company/profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(); ?>Company/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
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
                    <img src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata('username'); ?></p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="<?php echo base_url(); ?>Company/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Posted Opportunities</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>Company/posted_internships"><i class="fa fa-circle-o"></i> Internships</a></li>
                        <li><a href="<?php echo base_url(); ?>Company/posted_jobs"><i class="fa fa-circle-o"></i> Jobs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Company/employers">
                        <i class="fa fa-dashboard"></i> <span>Other Employers</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Company/notifications">
                        <i class="fa fa-bell-o"></i> <span>Notifications</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section><br/>

        <section class="content">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-success">
                        <div class="box-body box-profile">
                            <a class="glyphicon glyphicon-pencil" role="button"></a>
                            <img class="profile-user-img img-responsive img-square" src="<?php echo $this->session->userdata('logo'); ?>" alt="User profile picture" style="height: 200px;width: 200px">

                            <h3 class="profile-username text-center"><?php echo $this->session->userdata('username'); ?></h3>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Contact Details</h3> <a class="glyphicon glyphicon-pencil" role="button"></a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>" readonly/>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                            <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $this->session->userdata('address'); ?>"/>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Contact Number</strong>

                            <input type="text" name="telephone" class="form-control" placeholder="Contact Number" value="<?php echo $this->session->userdata('username'); ?>"/>

                            <hr>

                            <strong><i class="fa fa-linkedin-square margin-r-5"></i> Linked In</strong>

                            <input type="url" name="linkedin" class="form-control" placeholder="Linkedin" value="<?php echo $this->session->userdata('linkedin'); ?>"/>

                            <hr>

                            <strong><i class="fa fa-internet-explorer margin-r-5"></i> Website</strong>

                            <input type="url" name="website" class="form-control" placeholder="Website" value="<?php echo $this->session->userdata('website'); ?>"/>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-success" style="padding: 20px">
                    <form action="<?php echo base_url()?>Company/profile_validation" method="post">
                        <a class="glyphicon glyphicon-pencil" role="button"></a>
                        <h3 align="center" style="font-weight: bold">Company details</h3>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="<?php echo $this->session->userdata('company_name'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Company Registration Number</label>
                                <input type="text" name="reg_number" class="form-control" placeholder="2 letters followed by 6 numbers" value="<?php echo $this->session->userdata('register_no'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" placeholder="country" value="<?php echo $this->session->userdata('country'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Company Type</label>
                                <input type="text" name="company_type" class="form-control" placeholder="eg: Public Organization" value="<?php echo $this->session->userdata('type'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Company Size</label>
                                <input type="text" name="company_size" class="form-control" placeholder="100-500" value="<?php echo $this->session->userdata('size'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Currently Hiring ?</label>
                                <input type="text" name="hiriing_status" class="form-control" placeholder="eg: yes" value="<?php echo $this->session->userdata('hiring_status'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="form-control" placeholder="About your company"><?php echo $this->session->userdata('about'); ?></textarea>
                            </div>

                            <hr/>

                            <a class="glyphicon glyphicon-pencil" role="button"></a>
                            <h3 align="center" style="font-weight: bold">Contact person's details</h3>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="cname" class="form-control" placeholder="Contact person name" value="<?php echo $this->session->userdata('cname'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="cemail" class="form-control" placeholder="Contact person email address" value="<?php echo $this->session->userdata('cemail'); ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="ctelephone" class="form-control" placeholder="Contact person telephone number" value="<?php echo $this->session->userdata('ctelephone'); ?>"/>
                            </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>&copy; 2017 M-Ploy  &middot; <a href="<?php echo base_url();?>About">About</a> &middot; <a href="<?php echo base_url(); ?>Blog">Blog</a> &middot; <a href="#">Privacy Policy</a> &middot; <a href="#">Terms</a>
        </strong> All rights reserved.

    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/js/demo.js"></script>
</body>
</html>
