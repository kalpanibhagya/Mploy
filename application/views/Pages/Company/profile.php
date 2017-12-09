<link href="<?php echo base_url('assets/crud-assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/crud-assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/crud-assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/crud-assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/crud-assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.js"></script>

<div class="row">
    <div class="row">

        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-success">
                <div class="box-body box-profile">

                    <a class="glyphicon glyphicon-pencil" role="button" href="javascript:void(0)" role="button" onclick="edit_company()"></a>
                    <img class="profile-user-img img-responsive img-square" src="<?php echo base_url(); ?>assets/images/company.png" alt="User profile picture" style="height: 200px;width: 200px">

                    <h3 class="profile-username text-center"><?php echo $username ?></h3>

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

                                    $('[name="company_name"]').val(data.company_name);
                                    $('[name="register_no"]').val(data.register_no);
                                    $('[name="country"]').val(data.country);
                                    $('[name="type"]').val(data.type);
                                    $('[name="size"]').val(data.size);
                                    $('[name="hiring_status"]').val(data.hiring_status);
                                    $('[name="about"]').val(data.about);


                                    $('#modal_form_details').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Company Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function edit_contact_person()
                        {
                            save_method = 'update';
                            save_type = 'person';
                            $('#form_person')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Company/ajax_edit_profile/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="cname"]').val(data.cname);
                                    $('[name="cemail"]').val(data.cemail);
                                    $('[name="ctelephone"]').val(data.ctelephone);

                                    $('#modal_form_person').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Contact Person Info'); // Set title to Bootstrap modal title

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
                            else if (save_type == 'details')
                            {
                                url = "<?php echo site_url('Company/ajax_update_company_details')?>";
                            }
                            else if (save_type == 'person')
                            {
                                url = "<?php echo site_url('Company/ajax_update_contact_person')?>";
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

                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email ?>" readonly/>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                    <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address ?>"/>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Contact Number</strong>

                    <input type="text" name="contact_no" class="form-control" placeholder="Contact Number" value="<?php echo $contact_no ?>"/>

                    <hr>

                    <strong><i class="fa fa-linkedin-square margin-r-5"></i> Linked In</strong>

                    <input type="url" name="linkedin" class="form-control" placeholder="Linkedin" value="<?php echo $linkedin ?>"/>

                    <hr>

                    <strong><i class="fa fa-internet-explorer margin-r-5"></i> Website</strong>

                    <input type="url" name="website" class="form-control" placeholder="Website" value="<?php echo $website; ?>"/>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="box box-success" style="padding: 20px">
                    <a class="glyphicon glyphicon-pencil" role="button" href="javascript:void(0)" onclick="edit_company_details()"></a>
                    <h3 align="center" style="font-weight: bold">Company details</h3>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="<?php echo $company_name ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Company Registration Number</label>
                        <input type="text" name="reg_number" class="form-control" placeholder="2 letters followed by 6 numbers" value="<?php echo $register_no ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" placeholder="country" value="<?php echo $country ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Company Type</label>
                        <input type="text" name="company_type" class="form-control" placeholder="eg: Public Organization" value="<?php echo $type ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Company Size</label>
                        <input type="text" name="company_size" class="form-control" placeholder="100-500" value="<?php echo $size ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Currently Hiring ?</label>
                        <input type="text" name="hiring_status" class="form-control" placeholder="eg: yes" value="<?php echo $hiring_status ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="5" class="form-control" placeholder="About your company"><?php echo $about ?></textarea>
                    </div>

                    <hr/>

                    <a class="glyphicon glyphicon-pencil" role="button" href="javascript:void(0)" onclick="edit_contact_person()"></a>
                    <h3 align="center" style="font-weight: bold">Contact person's details</h3>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="cname" class="form-control" placeholder="Contact person name" value="<?php echo $cname ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="cemail" class="form-control" placeholder="Contact person email address" value="<?php echo $cemail ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="ctelephone" class="form-control" placeholder="Contact person telephone number" value="<?php echo $ctelephone ?>"/>
                    </div>
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
                                <input name="address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Number</label>
                            <div class="col-md-9">
                                <input name="contact_no"  class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Linked In</label>
                            <div class="col-md-9">
                                <input name="linkedin"  class="form-control" type="url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-9">
                                <input name="website"  class="form-control" type="url">
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
<div class="modal fade" id="modal_form_details" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Company Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_details" class="form-horizontal">
                    <input type="hidden" value="" name="company_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Name</label>
                            <div class="col-md-9">
                                <input name="company_name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Registration No.</label>
                            <div class="col-md-9">
                                <input name="register_no" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Country</label>
                            <div class="col-md-9">
                                <input name="country" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Type</label>
                            <div class="col-md-9">
                                <input name="type" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Size</label>
                            <div class="col-md-9">
                                <input name="size" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Currently Hiring?</label>
                            <div class="col-md-9">
                                <input name="hiring_status" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="about" required="" rows="5"></textarea>
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
<div class="modal fade" id="modal_form_person" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Contact Person Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_person" class="form-horizontal">
                    <input type="hidden" value="" name="company_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input name="cname" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Number</label>
                            <div class="col-md-9">
                                <input name="ctelephone" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="cemail" class="form-control" type="email">
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


