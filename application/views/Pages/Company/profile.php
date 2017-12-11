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

                    <a class="glyphicon glyphicon-pencil" role="button" href="javascript:void(0)" role="button" onclick="edit_company()"></a>
                    <img class="profile-user-img img-responsive img-square" src="<?php echo $this->session->userdata('logo'); ?>" alt="User profile picture" style="height: 200px;width: 200px">

                    <h3 class="profile-username text-center"><?php echo $this->session->userdata('username'); ?></h3>

                    <script type="text/javascript">

                        var save_method; //for save method string
                        var table;
                        var save_type;
                        $(document).ready(function() {
                            table = $('#table').DataTable({

                                "processing": true, //Feature control the processing indicator.
                                "serverSide": true, //Feature control DataTables' server-side processing mode.

                                // Load data for the table's content from an Ajax source
                                "ajax": {
                                    "url": "<?php echo site_url('Company/ajax_list')?>",
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

                        function edit_company()
                        {
                            save_method = 'update';
                            save_type = 'company';
                            $('#form_company')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Company/ajax_edit_profile/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="username"]').val(data.username);
                                    //$('[name="logo"]').val(data.logo);

                                    $('#modal_form_company').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Username'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function edit_company_contact()
                        {
                            save_method = 'update';
                            save_type = 'contact';
                            $('#form_contact')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Company/ajax_edit_profile/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="email"]').val(data.email);
                                    $('[name="address"]').val(data.address);
                                    $('[name="contact_no"]').val(data.contact_no);
                                    $('[name="linkedin"]').val(data.linkedin);
                                    $('[name="website"]').val(data.website);

                                    $('#modal_form_contact').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Contact Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function edit_company_details()
                        {
                            save_method = 'update';
                            save_type = 'details';
                            $('#form_details')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Company/ajax_edit_profile/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="company_name"]').val(data.email);
                                    $('[name="register_no"]').val(data.address);
                                    $('[name="country"]').val(data.contact);
                                    $('[name="company_type"]').val(data.linkedin);
                                    $('[name="company_size"]').val(data.website);
                                    $('[name="company_size"]').val(data.website);
                                    $('[name="company_size"]').val(data.website);

                                    $('#modal_form_contact').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Contact Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function save()
                        {
                            var url;
                            if (save_type == 'company')
                            {
                                url = "<?php echo site_url('Company/ajax_update_company_info')?>";
                            }
                            else if (save_type == 'contact')
                            {
                                url = "<?php echo site_url('Company/ajax_update_contact_info')?>";
                            }


                            // ajax adding data to database
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: $('#form_'.concat(save_type)).serialize(),
                                dataType: "JSON",
                                success: function(data)
                                {
                                    //if success close modal and reload ajax table
                                    $('#modal_form_'.concat(save_type)).modal('hide');
                                    //reload_table();
                                    swal(
                                        'Good job!',
                                        'Data has been save!',
                                        'success'
                                    )
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error adding / update data');
                                }
                            });
                        }




                    </script>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Contact Details</h3> <a class="glyphicon glyphicon-pencil" role="button" href="javascript:void(0)" role="button" onclick="edit_company_contact()"></a>
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

                    <input type="text" name="telephone" class="form-control" placeholder="Contact Number" value="<?php echo $this->session->userdata('contact_no'); ?>"/>

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


<div class="modal fade" id="modal_form_company" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Company Info Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_company" class="form-horizontal">
                    <input type="hidden" value="" name="company_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="full name" class="form-control" type="text">
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
<!-- End Bootstrap modal -->
<div class="modal fade" id="modal_form_contact" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Contact Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_contact" class="form-horizontal">
                    <input type="hidden" value="" name="company_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <input name="address" placeholder="Address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Number</label>
                            <div class="col-md-9">
                                <input name="contact_no" placeholder="Contact Number" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Linked In</label>
                            <div class="col-md-9">
                                <input name="linkedin" placeholder="Contact Number" class="form-control" type="url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-9">
                                <input name="website" placeholder="Contact Number" class="form-control" type="url">
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
<!-- End Bootstrap modal -->

</body>
</html>


