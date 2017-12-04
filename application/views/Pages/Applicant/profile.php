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
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url()."assets/AdminLTE/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Alexander Pierce - Web Developer
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
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="<?php echo base_url(); ?>Applicant/dashboard">
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-square" src="#" alt="User profile picture" style="height: 200px;width: 200px">

                        <h3  class="profile-username text-center"><b><?php echo $username?></b></h3>

                        <h3 class="profile-username text-center"><?php echo $full_name?></h3>

                        <p class="text-muted text-center">Software Engineer</p>
                        <p class="text-muted text-center"><?php echo $dob ?></p>
                        <p class="text-muted text-center"><?php echo $gender ?></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Contact Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                        <p class="text-muted">
                            john@gmail.com
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                        <p class="text-muted">Colombo, Sri Lanka</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Contact Number</strong>

                        <p class="text-muted">
                            011-94734221
                        </p>

                        <hr>

                        <strong><i class="fa fa-linkedin-square margin-r-5"></i> Linked In</strong>

                        <p>http://www.linedin.com/in/john</p>

                        <hr>

                        <strong><i class="fa fa-internet-explorer margin-r-5"></i> Website</strong>

                        <p>http://www.computer.com</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Personal Details</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Education qualifications</a></li>
                        <li><a data-toggle="tab" href="#sectionC">Experience</a></li>
                        <li><a data-toggle="tab" href="#sectionD">Other qualifications</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active">
                        <br/>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6"  class="col-sm-6" >
                                    <div class="col10">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label for="sel1">* Applicant Type</label>
                                                <select id="sel1" name="sel1" onchange="java_script_:show(this.options[this.selectedIndex].value)" class="form-control">
                                                    <option selected>job</option>
                                                    <option>intern</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" class="col-sm-6">
                                    <div class="col11">
                                        <fieldset>
                                            <legend><b>Main Facts</b></legend>
                                            <div class="form-group">
                                                <label for="fn"> Full Name</label>
                                                <input type="text" class="form-control" id="fname">
                                            </div>
                                            <div class="form-group"> <!-- Date input -->
                                                <label class="control-label" for="dob"> Date of Birth:</label>
                                                <input class="form-control" id="dob" name="date" type="date"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="age"> Age</label>
                                                <input type="text" class="form-control" id="age">
                                            </div>
                                            <div class="form-group">
                                                <label for="gen"> Gender</label>
                                                <select id="sel1" name="sel1" class="form-control">
                                                    <option selected>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6" class="col-sm-6">
                                    <div class="col12">
                                        <div id="hiddenDiv" style="display:none">
                                            <fieldset>
                                                <legend><b>Preferred area and companies</b></legend>
                                                <div class="form-group">
                                                    <label for="selpa"> Preferred Area</label>
                                                    <select class="form-control" id="selpa">
                                                        <option>Developer</option>
                                                        <option>Business Analyst</option>
                                                        <option>UX/UI</option>
                                                        <option>Networking</option>
                                                        <option>Research</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="selc"> Companies</label>
                                                    <form class="form-inline">
                                                        <input class="form-control" id="sel1" name="company1" type="text"/>
                                                        <input class="form-control" id="sel2" name="company2" type="text"/>
                                                        <input class="form-control" id="sel3" name="company3" type="text"/>
                                                    </form>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <fieldset>
                                            <legend><b>Contacts</b></legend>
                                            <div class="form-group">
                                                <label for="email"> Email</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="cn"> Contact number</label>
                                                <input type="text" class="form-control" id="cn">
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend><b> Address</b></legend>
                                            <div class="form-group">
                                                <input class="form-control" id="address" name="address" type="text"/>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="sectionB" class="tab-pane fade">
                        <br/>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>University/Institute</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col8">
                                                <fieldset>
                                                    <legend><b>Degree Details</b></legend>
                                                    <div class="form-group">
                                                        <label for="n1">* Degree</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="n1">* Degree Level</label>
                                                        <select class="form-control" id="level">
                                                            <option value="1">Certificate</option>
                                                            <option value="2">Diploma</option>
                                                            <option value="3">Bachelor</option>
                                                            <option value="4">Master</option>
                                                            <option value="5">PhD</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                                    <div class="form-group">
                                                        <label for="n1">* Grade/GPA</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sel1">* Class</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>none</option>
                                                            <option>First class</option>
                                                            <option>Second - upper</option>
                                                            <option>Second - lower</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col9">
                                                <fieldset>
                                                    <legend><b>University/Institute details</b></legend>
                                                    <div class="form-group">
                                                        <label for="sel1">* University/Institute</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>University of Colombo</option>
                                                            <option>University of Moratuwa</option>
                                                            <option>University of Peradeniya</option>
                                                            <option>University of Ruhuna</option>
                                                            <option>University of Kelaniya</option>
                                                            <option>University of Wayamba</option>
                                                            <option>SLIIT</option>
                                                            <option>APIIT</option>
                                                            <option>NIBM</option>
                                                            <option>NSBM</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cn1"></label>
                                                        <input type="text" class="form-control" id="cn1" placeholder="Other">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web1">Website</label>
                                                        <input type="url" class="form-control" id="web1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="con1">Country</label>
                                                        <input type="text" class="form-control" id="con1">
                                                    </div>

                                                    <div>
                                                        <ul>
                                                            <li><input type="submit" name="" value="save" class="btn" id="save5"></li>
                                                            <li><input type="submit" name="" value="cancel" class="btn" id="cancel5"></li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="sectionC" class="tab-pane fade">
                        <br/>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Projects</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col4">
                                                <div class="form-group">
                                                    <label for="n2">* Name</label>
                                                    <input type="text" class="form-control" id="n2">
                                                </div>
                                                <div class="form-group"> <!-- Date input -->
                                                    <label class="control-label" for="date">* Date</label>
                                                    <input class="form-control" id="date" name="date" type="date"/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" id="date" name="date" type="date"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="git">Github Link</label>
                                                    <input type="url" class="form-control" id="git">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col5">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="9" id="comment" placeholder="Description and Achievements"></textarea>
                                                </div>
                                                <p id="req">* Required</p>
                                                <div>
                                                    <ul>
                                                        <li><input type="submit" name="" value="save" class="btn" id="save3"></li>
                                                        <li><input type="submit" name="" value="cancel" class="btn" id="cancel3"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Work Experience</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col6">
                                                <fieldset>
                                                    <legend><b>Job/Internship details</b></legend>
                                                    <div class="form-group">
                                                        <label for="jt">* Job Title</label>
                                                        <input type="text" class="form-control" id="jt">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selct">* Contract Type</label>
                                                        <select class="form-control" id="selct">
                                                            <option>Full time</option>
                                                            <option>Part time</option>
                                                            <option>Internship - Full time</option>
                                                            <option>Internship - Part time</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col7">
                                                <fieldset>
                                                    <legend><b>Company details</b></legend>
                                                    <div class="form-group">
                                                        <label for="cn">* Company Name</label>
                                                        <input type="text" class="form-control" id="cn">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web">Website</label>
                                                        <input type="url" class="form-control" id="web">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="con">Country</label>
                                                        <input type="text" class="form-control" id="con">
                                                    </div>

                                                    <div>
                                                        <ul>
                                                            <li><input type="submit" name="" value="save" class="btn" id="save4"></li>
                                                            <li><input type="submit" name="" value="cancel" class="btn" id="cancel4"></li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="sectionD" class="tab-pane fade">
                        <br/>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Professional Qualifications</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col8">
                                                <fieldset>
                                                    <legend><b>Qualification Details</b></legend>
                                                    <div class="form-group">
                                                        <label for="n1">* Title</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="n1">* Licence no.</label>
                                                        <select class="form-control" id="level">
                                                            <option value="1">Certificate</option>
                                                            <option value="2">Diploma</option>
                                                            <option value="3">Bachelor</option>
                                                            <option value="4">Master</option>
                                                            <option value="5">PhD</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                                    <div class="form-group">
                                                        <label for="n1">* Grade/GPA</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sel1">* Class</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>none</option>
                                                            <option>First class</option>
                                                            <option>Second - upper</option>
                                                            <option>Second - lower</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col9">
                                                <fieldset>
                                                    <legend><b>Professional Organization details</b></legend>
                                                    <div class="form-group">
                                                        <label for="sel1">* University/Institute</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>University of Colombo</option>
                                                            <option>University of Moratuwa</option>
                                                            <option>University of Peradeniya</option>
                                                            <option>University of Ruhuna</option>
                                                            <option>University of Kelaniya</option>
                                                            <option>University of Wayamba</option>
                                                            <option>SLIIT</option>
                                                            <option>APIIT</option>
                                                            <option>NIBM</option>
                                                            <option>NSBM</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cn1"></label>
                                                        <input type="text" class="form-control" id="cn1" placeholder="Other">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web1">Website</label>
                                                        <input type="url" class="form-control" id="web1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="con1">Country</label>
                                                        <input type="text" class="form-control" id="con1">
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><input type="submit" name="" value="save" class="btn" id="save5"></li>
                                                            <li><input type="submit" name="" value="cancel" class="btn" id="cancel5"></li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Hackathons/ Societies/ Community works</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col1">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="n1">* Name</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selt">* Type</label>
                                                        <select class="form-control" id="selt">
                                                            <option>Hackthons</option>
                                                            <option>Societies</option>
                                                            <option>Community works</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col2">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="12" id="comment" placeholder="Description and Achievements, any links"></textarea>
                                                </div>

                                                <div>
                                                    <ul>
                                                        <li><input type="submit" name="" value="save" class="btn" id="save1"></li>
                                                        <li><input type="submit" name="" value="cancel" class="btn" id="cancel1"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6" class="col-sm-6">
                                    <div class="col3">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><b>Skill</b></div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="name">* Add your Skills</label>
                                                    <ul>
                                                        <li onclick="this.parentNode.removeChild(this);">
                                                            <input type="hidden" name="ingredients[]" value="None" />
                                                            None
                                                        </li>
                                                    </ul>
                                                    <select class="form-control" onchange="selectIngredient(this);">
                                                        <option value="1">Java</option>
                                                        <option value="2">Php</option>
                                                        <option value="3">Android</option>
                                                        <option value="4">C</option>
                                                        <option value="5">C++</option>
                                                        <option value="6">Scrum</option>
                                                        <option value="7">Firebase</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--div id="dropdown1" class="tab-pane fade">

                            <p>Dropdown 1 content…</p>

                        </div>

                        <div id="dropdown2" class="tab-pane fade">

                            <p>Dropdown 2 content…</p>

                        </div-->

                    </div>

                    <script>
                        function show(aval) {
                            if (aval == "intern") {
                                hiddenDiv.style.display='block';
                                Form.fileURL.focus();
                            }
                            else{
                                hiddenDiv.style.display='none';
                            }
                        }
                    </script>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>&copy; 2017 M-Ploy  &middot; <a href="<?php echo base_url();?>About">About</a> &middot; <a href="<?php echo base_url(); ?>Blog">Blog</a> &middot; <a href="#">Privacy Policy</a> &middot; <a href="#">Terms</a>
        </strong> All rights reserved.

    </footer>
</div>
<!-- ./wrapper -->
<script>
    function selectIngredient(select)
    {
        var option = select.options[select.selectedIndex];
        var ul = select.parentNode.getElementsByTagName('ul')[0];

        var choices = ul.getElementsByTagName('input');
        for (var i = 0; i < choices.length; i++)
            if (choices[i].value == option.value)
                return;

        var li = document.createElement('li');
        var input = document.createElement('input');
        var text = document.createTextNode(option.firstChild.data);

        input.type = 'hidden';
        input.name = 'ingredients[]';
        input.value = option.value;

        li.appendChild(input);
        li.appendChild(text);
        li.setAttribute('onclick', 'this.parentNode.removeChild(this);');

        ul.appendChild(li);
    }
</script>
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
