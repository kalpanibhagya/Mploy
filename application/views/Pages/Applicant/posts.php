<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jobs and Internships</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/crud-assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/crud-assets/bootstrap/css/bootstrap-theme.min.css') ?>">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/crud-assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>Applicant/enter">M-Ploy</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-right">
                    <a class="btn btn-success" href="<?php echo base_url(); ?>Applicant/dashboard" role="button">Dashboard</a>
                    <a class="btn btn-success" href="<?php echo base_url(); ?>Applicant/logout" role="button">Logout</a>
                </form>
            </div>
        </div>
    </nav>
</header>



    <div class="container" align="center" style="margin-top: 70px">
        <br/>
    <div class="input-group">
        <input type="text" class="search form-control" placeholder="Search for..." width="50px">
        <span class="input-group-btn">
            <button class="btn btn-success" type="button">Go!</button>
        </span>
    </div>

        <table class="table table-bordered table-responsive" style="margin-top: 20px;" id="userTbl">
            <thead>
            <tr>
                <td>Job Title</td>
                <td>Location</td>
                <td>Closing Date</td>
                <td>Contract Type</td>
                <td>Salary</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody id="showdata">

            </tbody>
        </table>
    </div>

<script>
    $(function(){
        showAllJobs();

        //function
        function showAllJobs(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>Job_post/showAllJobs',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html +='<tr>'+
                            '<td>'+data[i].job_title+'</td>'+
                            '<td>'+data[i].location+'</td>'+
                            '<td>'+data[i].open_date_to+'</td>'+
                            '<td>'+data[i].contract_type+'</td>'+
                            '<td>'+data[i].salary+'</td>'+
                            '<td>'+
                            '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'"><span class="glyphicon glyphicon-edit"></span> Edit</a>'+
                            '  <a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'"><span class="glyphicon glyphicon-remove-sign"></span> Delete</a>'+
                            '</td>'+
                            '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function(){
                    alert('Could not get Data from Database');
                }
            });
        }
    });

    $(document).ready(function(){
        $('.search').on('keyup',function(){
            var searchTerm = $(this).val().toLowerCase();
            $('#userTbl tbody tr').each(function(){
                var lineStr = $(this).text().toLowerCase();
                if(lineStr.indexOf(searchTerm) === -1){
                    $(this).hide();
                }else{
                    $(this).show();
                }
            });
        });
    });
</script>

</body>
</html>