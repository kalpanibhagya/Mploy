<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<div class="row">
    <h4 style="text-align: center;font-weight: bolder">My Job Posts</h4>
    <div class="input-group">
        <input type="text" class="search form-control" placeholder="Search posted Jobs" width="50px">
        <span class="input-group-btn">
                    <button class="btn btn-success" type="button">Go!</button>
                </span>
    </div>
    <br/>
    <div align="center">
        <a class="btn btn-success" href="<?php echo base_url(); ?>Company/post_a_job"><span class="glyphicon glyphicon-plus-sign"></span> Post a new Job</a>
    </div>
    <br/>

</div>


</body>
</html>


