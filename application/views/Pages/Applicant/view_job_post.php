<style type="text/css">

    #buangLine{
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
    }

</style>

<?php foreach ($output as $data): ?>
<!-- Horizontal Form -->
<div class="box-header with-border">
    <div class="col-md-6">
        <h3 class="box-title">Details</h3>
    </div>

    <div class="col-md-6">
      <span class="pull-right">

        <button class="btn btn-default" id = "butangBack"><i class="fa fa-arrow-left"> </i> Back</button>

      </span>
    </div>
</div>
<!-- /.box-header -->
<!-- form start -->


<form class="form-horizontal" id="dataCryo" method="post" enctype="multipart/form-data">

    <div class="box-body">

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Job Title : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->job_title; ?></h5>
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Location : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->location; ?></h5>
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Closing Date : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->open_date_to; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Contract Type : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->contract_type; ?></h5>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Salary : </label>

            <div class="col-sm-6">
                <h5 class="col-sm-6 "><?php echo $data->salary; ?></h5>
            </div>
        </div>


        <?php endforeach; ?>


    </div>
</form>
<!-- /.box -->



<script>
    $(document).ready(function () {

        $('#butangBack').unbind('click').click(function () {
            $.ajax({
                url : "<?php echo base_url();?>Applicant/posts",
                success: function (result) {
                    $('#haha').empty().html(result).fadeIn('slow');
                }});
        })
    })
</script>

