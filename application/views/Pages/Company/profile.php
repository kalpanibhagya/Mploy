<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<div class="row">
    <div class="row">
        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-body box-profile">
                    <a class="glyphicon glyphicon-pencil" role="button" href="javascript:void(0)" onclick="edit_person()"></a>
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
        <div class="col-md-8">
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

<script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Applicant/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                },
            ],

        });
    });

    function edit_person()
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('Applicant/ajax_edit/')?>/" ,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="full_name"]').val(data.full_name);
                $('[name="username"]').val(data.username);
                $('[name="dob"]').val(data.dob);
                $('[name="gender"]').val(data.gender);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Personal Info'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }



</script>


<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Personal Info Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="company_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">full Name</label>
                            <div class="col-md-9">
                                <input name="full_name" placeholder="full name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">User Name</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="User name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="dob" placeholder="Date of Birth" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select class="form-control" name= "gender" style="height: 50px">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>


