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
            <li class="active">
                <a href="<?php echo base_url(); ?>Applicant/notifications">
                    <i class="fa fa-bell-o"></i> <span>Notifications</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>