<link href="<?php echo base_url('assets/crud-assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/crud-assets/datatables/css/dataTables.bootstrap.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/crud-assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>"
      rel="stylesheet">

<script src="<?php echo base_url('assets/crud-assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/crud-assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/crud-assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/crud-assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/crud-assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.js"></script>


<div class="row">
    <div class="inline">
        <a class="btn btn-success" href="<?php echo base_url(); ?>Company/post_a_job"><i class="glyphicon glyphicon-send"></i> Post a Job</a>
    </div>
    <br/>
    <br/>
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Opportunity ID</th>
            <th>Job Title</th>
            <!--th>Job Category</th-->
            <th>Location</th>
            <th>Salary</th>
            <th>Deadline</th>
            <th style="width:189px;">Action</th>
            <th style="width:189px;">Action</th>
        </tr>
        </thead>
        <tbody>
        <td>
            <?php
            foreach ($jobs as $job){
            echo "<tr>";
            echo "<td>";
            echo $job->opportunity_id;
            echo "</td>";
            echo "<td>";
            echo $job->job_title;
            echo "</td>";
            /*echo "<td>";
            echo $job->job_category;
            echo "</td>";*/
            echo "<td>";
            echo $job->location;
            echo "</td>";
            echo "<td>";
            echo $job->salary;
            echo "</td>";
            echo "<td>";
            echo $job->open_date_to;
            echo "</td>";
            echo "<td>"; ?>

            <a href="<?php echo base_url() ?>JobController/deleteJob/<?php echo $job->opportunity_id ?>" title="Delete"
               data-confirm="Are you sure?" data-method="post">
                <!--span class="glyphicon glyphicon-remove"></span--><button type="submit" class="btn btn-danger">DELETE</button></a>

                    <?php echo "</td>";

                echo "<td>"; ?>

                <a href="<?php echo base_url() ?>JobController/deleteJob/<?php echo $job->opportunity_id ?>" title="Delete"
                   data-confirm="Are you sure?" data-method="post">
                    <button type="submit" class="btn btn-success">SELECTION</button></a>

                <?php echo "</td>";
                echo "</tr>";




        </td>
        </tbody>


    </table>

</div>


<!--<script type="text/javascript">-->
<!---->
<!--    var save_method; //for save method string-->
<!--    var table;-->
<!---->
<!---->
<!--    function reload_table()-->
<!--    {-->
<!--        table.ajax.reload(null,false); //reload datatable ajax-->
<!--    }-->
<!---->
<!--   /* function view_internships(company_id)-->
<!--    {-->
<!--        $.ajax({-->
<!--            url : "<!--?php echo site_url('Company/list_by_id_company')?>/" + company_id,-->
<!--            type: "GET",-->
<!--            success: function(result)-->
<!--            {-->
<!--                $('#haha').empty().html(result).fadeIn('slow');-->
<!--            },-->
<!--            error: function (jqXHR, textStatus, errorThrown)-->
<!--            {-->
<!---->
<!--            }-->
<!--        });-->
<!--    }*/-->
<!---->
<!---->
<!--    //datepicker-->
<!--    $('.datepicker').datepicker({-->
<!--        autoclose: true,-->
<!--        format: "yyyy-mm-dd",-->
<!--        todayHighlight: true,-->
<!--        orientation: "top auto",-->
<!--        todayBtn: true,-->
<!--        todayHighlight: true,-->
<!--    });-->
<!---->
<!---->
<!--</script>-->

</body>
</html>


