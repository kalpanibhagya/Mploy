
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/images/employee.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="font-weight: 100"><?php echo $username ?></p>
                <a data-original-title="Tooltip" rel="tooltip"  href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="">
                    <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
            </li>
            <li>
                <a class="ayam" href="<?php echo base_url(); ?>Applicant/profile">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
            </li>
            <li>
                <a class="ayam" href="<?php echo base_url(); ?>Applicant/interviewRequests">
                    <i class="fa fa-user"></i> <span>Interview Requests</span>
                </a>
            </li>
            <li>
                <a class="ayam" href="<?php echo base_url(); ?>Applicant/employers">
                    <i class="fa fa-building"></i> <span>Companies</span>
                </a>
            </li>
            <li>
                <a class="ayam" href="<?php echo base_url(); ?>Applicant/notifications">
                    <i class="fa fa-bell"></i> <span>Notifications</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<script type="text/javascript">


    $(document).on('click','.ayam',function(){

        var href = $(this).attr('href');
        $('#haha').empty().load(href).fadeIn('slow');
        return false;

    });


</script>






<script type="text/javascript">

    $('.ayam').removeClass('active');

</script>


<script>


    $(document).ready(function(){

        $( "body" ).on( "click", ".ayam", function() {

            $('.ayam').each(function(a){
                $( this ).removeClass('selectedclass')
            });
            $( this ).addClass('selectedclass');
        });

    })


</script>

<script>
    $('[rel="tooltip"]').tooltip();
</script>

<style type="text/css">


    li a.selectedclass
    {
        color: forestgreen !important;
        font-weight: bold;
    }


</style>