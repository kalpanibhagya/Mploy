<<<<<<< HEAD
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
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a class="glyphicon glyphicon-pencil" href="javascript:void(0)" role="button" onclick="edit_person()"></a>
                    <img class="profile-user-img img-responsive img-square" src="<?php echo base_url(); ?>assets/images/employee.png" alt="User profile picture" style="height: 200px;width: 200px">

                    <h3  class="profile-username text-center"><b><?php echo $username?></b></h3>

                    <h3 class="profile-username text-center"><?php echo $full_name?></h3>

                    <p class="text-muted text-center">Software Engineer</p>
                    <p class="text-muted text-center"><?php echo $dob ?></p>
                    <p class="text-muted text-center"><?php echo $gender ?></p>


                    <script type="text/javascript">

                        var save_method; //for save method string
                        var table;
                        var save_type;

                        function display_academic()
                        {
                            var table = $('#table_academic').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                           table = $('#table_academic').DataTable({

                               "processing": true, //Feature control the processing indicator.
                               "serverSide": true, //Feature control DataTables' server-side processing mode.

                               // Load data for the table's content from an Ajax source
                               "ajax": {

                                   "url":  "<?php echo site_url('Academic_qualification/ajax_list')?>" ,
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
                        }

                        function display_projects()
                        {
                            var table = $('#table_project').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_project').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Project/ajax_list')?>",
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
                        }

                        function display_work()
                        {
                            var table = $('#table_work').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_work').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Work_experience/ajax_list')?>",
                                        "type": "POST"
                                    },

                                    //Set column definition initialisation properties.
                                    "columnDefs": [
                                        {
                                            "targets": [ -1 ], //last column
                                            "orderable": false //set not orderable
                                        }
                                    ]

                                });
                            });
                        }

                        function display_professional()
                        {
                            var table = $('#table_professional').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_professional').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Professional_qualification/ajax_list')?>",
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
                        }

                        function display_extra_curricular()
                        {
                            var table = $('#table_extra_curricular').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_extra_curricular').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Extra_curricular/ajax_list')?>",
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
                        }

                        function edit_person()
                        {
                            save_method = 'update';
                            save_type = 'personal';
                            $('#form_personal')[0].reset(); // reset form on modals

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

                                    $('#modal_form_personal').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Personal Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function edit_person_contact()
                        {
                            save_method = 'update';
                            save_type = 'contact';
                            $('#form_contact')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Applicant/ajax_edit/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="email"]').val(data.email);
                                    $('[name="address"]').val(data.address);
                                    $('[name="contact"]').val(data.contact);
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

                        function edit_project()
                        {
                            save_method = 'update';
                            save_type = 'project';
                            $('#form_project')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Applicant/ajax_edit/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="name"]').val(data.name);
                                    $('[name="date_from"]').val(data.date_from);
                                    $('[name="date_to"]').val(data.date_to);
                                    $('[name="link"]').val(data.link);
                                    $('[name="description"]').val(data.description);

                                    $('#modal_form_project').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Project Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function edit_academic(name)
                        {
                            save_method = 'update';
                            save_type = 'personal';
                            $('#form_academic')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Academic_qualification/ajax_edit/')?>/" + name,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="degree"]').val(data.degree);
                                    $('[name="university"]').val(data.university);
                                    $('[name="degree_type"]').val(data.degree_type);
                                    $('[name="date_from"]').val(data.date_from);
                                    $('[name="date_to]').val(data.date_to);
                                    $('[name="gpa"]').val(data.gpa);

                                    $('#modal_form_academic').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Academic Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }


                        function add_project()
                        {
                            save_method = 'add';
                            save_type = 'project';
                            $('#form_project')[0].reset(); // reset form on modals
                            $('#modal_form_project').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New project'); // Set Title to Bootstrap modal title
                        }

                        function add_academic()
                        {
                            save_method = 'add';
                            save_type = 'academic';
                            $('#form_academic')[0].reset(); // reset form on modals
                            $('#modal_form_academic').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Educational Qualification'); // Set Title to Bootstrap modal title
                        }

                        function add_work()
                        {
                            save_method = 'add';
                            save_type = 'work';
                            $('#form_work')[0].reset(); // reset form on modals
                            $('#modal_form_work').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Work Experience'); // Set Title to Bootstrap modal title
                        }

                        function add_professional()
                        {
                            save_method = 'add';
                            save_type = 'professional';
                            $('#form_professional')[0].reset(); // reset form on modals
                            $('#modal_form_professional').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Professional Qualification'); // Set Title to Bootstrap modal title
                        }

                        function add_extra_curricular()
                        {
                            save_method = 'add';
                            save_type = 'extra_curricular';
                            $('#form_extra_curricular')[0].reset(); // reset form on modals
                            $('#modal_form_extra_curricular').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Extra Curricular Details'); // Set Title to Bootstrap modal title
                        }

                        function add_skill()
                        {
                            save_method = 'add';
                            save_type = 'skill';
                            $('#form_skill')[0].reset(); // reset form on modals
                            $('#modal_form_skill').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Skill'); // Set Title to Bootstrap modal title
                        }


                        function save()
                        {
                            var url;
                            if (save_type == 'personal')
                            {
                                url = "<?php echo site_url('Applicant/ajax_update_personal_info')?>";
                            }
                            else if (save_type == 'contact')
                            {
                                url = "<?php echo site_url('Applicant/ajax_update_contact_info')?>";
                            }

                            else if(save_type == 'academic')
                            {
                                url = "<?php echo site_url('Academic_qualification/ajax_add')?>";
                            }
                            else if(save_type == 'project')
                            {
                                url = "<?php echo site_url('Project/ajax_add')?>";
                            }
                            else if(save_type == 'work')
                            {
                                url = "<?php echo site_url('Work_experience/ajax_add')?>";
                            }
                            else if(save_type == 'professional')
                            {
                                url = "<?php echo site_url('Professional_qualification/ajax_add')?>";
                            }
                            else if(save_type == 'extra_curricular')
                            {
                                url = "<?php echo site_url('Extra_curricular/ajax_add')?>";
                            }
                            else if(save_type == 'skill')
                            {
                                url = "<?php echo site_url('Skill/ajax_add')?>";
                            }






                            // ajax adding data to database
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: $('#form_'.concat(save_type)).serializeArray(),
                                dataType: "JSON",

                                success: function(data)
                                {
                                    //if success close modal and reload ajax table
                                    $('#modal_form_'.concat(save_type)).modal('hide');
                                    reload_table();
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    <a class="glyphicon glyphicon-pencil" href="javascript:void(0)" role="button" onclick="edit_person_contact()"></a>
                    <h3 class="box-title">Contact Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                    <p class="text-muted">
                        <?php echo $email?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                    <p class="text-muted"><?php echo $address ?></p>

                    <hr>

                    <strong><i class="fa fa-phone margin-r-5"></i> Contact Number</strong>

                    <p class="text-muted">
                        <?php echo $contact?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-linkedin-square margin-r-5"></i> Linked In</strong>

                    <p><?php echo $linkedin ?></p>

                    <hr>

                    <strong><i class="fa fa-internet-explorer margin-r-5"></i> Website</strong>

                    <p><?php echo $website ?></p>

                    <hr>

                    <strong><i class="fa fa-github margin-r-5"></i> Github</strong>

                    <p><?php echo $github ?></p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#sectionA" onclick="display_academic()">Education qualifications</a></li>
                    <li><a data-toggle="tab" href="#sectionB" onclick="display_projects()">Projects</a></li>
                    <li><a data-toggle="tab" href="#sectionC" onclick="display_work()">Work Experiences</a></li>
                    <li><a data-toggle="tab" href="#sectionD" onclick="showPro()">Professional Qualifications</a></li>
                    <li><a data-toggle="tab" href="#sectionE" >Extra Curricular Activities</a></li>
                    <li><a data-toggle="tab" href="#sectionF" >Skills</a></li>
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane active">
                        <br/>
                        <div id = "sectionA" class = "row" >
                            <button class="btn btn-success" onclick="add_academic()"><i class="glyphicon glyphicon-plus"></i> Add New Qualification</button>
                            <br />
                            <br />
                            <table id="table_academic" class="table table-striped table-bordered" cellspacing="0" width="100%" style="overflow: scroll;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>University/Institute</th>
                                    <th>Degree Type</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Grade/GPA</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionB" class="tab-pane fade">
                        <br/>
                        <div id = "sectionB" class = "row">
                            <button class="btn btn-success" onclick="add_project()"><i class="glyphicon glyphicon-plus"></i> Add New Project</button>
                            <br />
                            <br />
                            <table id="table_project" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Github Link</th>
                                    <th>Description</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionC" class="tab-pane fade">
                        <br/>
                        <div id = "sectionC" class = "row">
                            <button class="btn btn-success" onclick="add_work()"><i class="glyphicon glyphicon-plus"></i> Add New Work Experience Details</button>
                            <br />
                            <br />
                            <table id="table_work" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>Contract Type</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Company Country</th>
                                    <th>Company Website</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionD" class="tab-pane fade">
                        <br/>
                        <div id = "sectionD" class = "row">
                            <button class="btn btn-success" onclick="add_professional()"><i class="glyphicon glyphicon-plus"></i> Add New Work Professional Qualification Details</button>
                            <br />
                            <br />
                            <table id="table_professional" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company Name</th>
                                    <th>Licence Number</th>
                                    <th>Valid From</th>
                                    <th>Valid To</th>
                                    <th>Verify Status</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionE" class="tab-pane fade">
                        <br/>
                        <div id = "sectionE" class = "row">
                            <button class="btn btn-success" onclick="add_extra_curricular()"><i class="glyphicon glyphicon-plus"></i> Add New Work Extra Curricular Activities</button>
                            <br />
                            <br />
                            <table id="table_extra_curricular" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div id="sectionF" class="tab-pane fade">
                        <br/>
                        <div id = "sectionF" class = "row">
                            <button class="btn btn-success" onclick="add_skill()"><i class="glyphicon glyphicon-plus"></i> Add New Skill</button>
                            <br />
                            <br />
                            <table id="table_skill" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Skill</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>




<div class="modal fade" id="modal_form_personal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Personal Info Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_personal" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
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
<!-- End Bootstrap modal -->


<div class="modal fade" id="modal_form_contact" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Contact Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_contact" class="form-horizontal" method="post">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" readonly placeholder="Email" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <input name="address" placeholder="Address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Number</label>
                            <div class="col-md-9">
                                <input name="contact" placeholder="Contact Number" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Linked In</label>
                            <div class="col-md-9">
                                <input name="linkedin" placeholder="Linked In" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-9">
                                <input name="website" placeholder="Website" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-md-3">Github</label>
                        <div class="col-md-9">
                            <input name="github" placeholder="Github" class="form-control" type="text">
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSave"  onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<div class="modal fade" id="modal_form_academic" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Academic Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="" id="form_academic" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Degree</label>
                            <div class="col-md-9">
                                <input name="degree"  placeholder="Degree" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">University/Institute</label>
                            <div class="col-md-9">
                                <input name="university" placeholder="Address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Degree Type</label>
                            <div class="col-md-9">
                               <!-- <input name="degree_type" placeholder="Degree Type" class="form-control" type="text"> -->
                                <select class="form-control" id="degree_type" name="degree_type">
                                    <option value=""></option>
                                    <option value="certificate">Certificate</option>
                                    <option value="diploma">Diploma</option>
                                    <option value="degree">Degree</option>
                                    <option value="masters">Masters</option>
                                    <option value="phd">PhD</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label col-md-3">Date From</label>
                             <div class="col-md-9">
                                 <input name="date_from" placeholder="Date From" class="form-control" type="date">
                             </div>
                         </div>
                        <div class="form-group">
                             <label class="control-label col-md-3">Date To</label>
                             <div class="col-md-9">
                                 <input name="date_to" placeholder="Date To" class="form-control" type="date">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">GPA</label>
                             <div class="col-md-9">
                                 <input name="gpa" placeholder="GPA" class="form-control" type="text">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="submit" id="btnSave"  onclick="save()" class="btn btn-primary">Save</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
             </div>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<div class="modal fade" id="modal_form_project" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_project" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">* Name</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Type</label>
                            <div class="col-md-9">
                                <input name="type" placeholder="Type" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">*Date From</label>
                            <div class="col-md-9">
                                <input name="date_from" placeholder="From" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">*Date To</label>
                            <div class="col-md-9">
                                <input name="date_to" placeholder="To" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Github Link</label>
                            <div class="col-md-9">
                                <input name="link" placeholder="Github Link" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control" rows="9" id="" name="description" placeholder="Description and Achievements"></textarea>
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

<div class="modal fade" id="modal_form_work" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_work" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Job Title</label>
                            <div class="col-md-9">
                                <input name="job_title" placeholder="Job Title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Name</label>
                            <div class="col-md-9">
                                <input name="company_name" placeholder="Company Name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contract Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="contract_type" name="contract_type">
                                    <option value=""></option>
                                    <option value="work_full">Job - Full Time</option>
                                    <option value="work_part">Job - Part Time</option>
                                    <option value="intern_full">Intern - Full Time</option>
                                    <option value="intern_part">Intern - Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date From</label>
                            <div class="col-md-9">
                                <input name="date_from" placeholder="Date From" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date To</label>
                            <div class="col-md-9">
                                <input name="date_to" placeholder="Date To" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Website</label>
                            <div class="col-md-9">
                                <input name="company_website" placeholder="Company Website" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Country</label>
                            <div class="col-md-9">
                                <input name="company_country" placeholder="Company country" class="form-control" type="text">
                            </div>"
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

<div class="modal fade" id="modal_form_professional" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_professional" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <select class="form-control" id="qualification" name="title">
                                    <option value=""></option>
                                    <option value="ccna">CCNA</option>
                                    <option value="cima">CIMA</option>
                                    <!--
                                    <option value="intern_full">Intern - Full Time</option>
                                    <option value="intern_part">Intern - Part Time</option>
                                    -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Licence Number</label>
                            <div class="col-md-9">
                                <input name="licence_no" placeholder="Licence Number" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Professional Body</label>
                            <div class="col-md-9">
                                <input name="professional body" placeholder="Professional Body" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Valid From</label>
                            <div class="col-md-9">
                                <input name="valid_from" placeholder="Valid From" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Valid To</label>
                            <div class="col-md-9">
                                <input name="Valid_to" placeholder="Valid To" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-9">
                                <input name="website" placeholder="Website" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Country</label>
                            <div class="col-md-9">
                                <input name="country" placeholder="country" class="form-control" type="text">
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

<div class="modal fade" id="modal_form_extra_curricular" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_extra_curricular" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Activity Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="activity_type" name="activity_type">
                                    <option value=""></option>
                                    <option value="hackathon">Hackathon</option>
                                    <option value="society">Society</option>
                                    <option value="volunteering">Volunteering</option>
                                    <option value="sport">Sports</option>
                                    <option value="aesthetic">Aesthetic</option>
                                    <option value="blogging">Blogging</option>
                                    <!--
                                    <option value="intern_full">Intern - Full Time</option>
                                    <option value="intern_part">Intern - Part Time</option>
                                    -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="Name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="9" id="" name="description" placeholder="Description and Achievements"></textarea>
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

<div class="modal fade" id="modal_form_skill" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Skill Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_skill" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <select name="selection1" class="form-control" onchange="selectIngredient(this);">
                            <option value="None">None</option>
                            <option value="Java">Java</option>
                            <option value="Php">Php</option>
                            <option value="Android">Android</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Scrum">Scrum</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="C#">C#</option>
                            <option value="Front-End">Front-End</option>
                            <option value="Back-End">Back-End</option>
                        </select>
                        <select name="selection2" class="form-control" onchange="selectIngredient(this);">
                            <option value="None">None</option>
                            <option value="Java">Java</option>
                            <option value="Php">Php</option>
                            <option value="Android">Android</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Scrum">Scrum</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="C#">C#</option>
                            <option value="Front-End">Front-End</option>
                            <option value="Back-End">Back-End</option>
                        </select>
                        <select name="selection3" class="form-control" onchange="selectIngredient(this);">
                            <option value="None">None</option>
                            <option value="Java">Java</option>
                            <option value="Php">Php</option>
                            <option value="Android">Android</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Scrum">Scrum</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="C#">C#</option>
                            <option value="Front-End">Front-End</option>
                            <option value="Back-End">Back-End</option>
                        </select>
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

<script>
    $(function(){
        showPro();

        //function
        function showPro(){
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
                            '<td>'+data[i].title+'</td>'+
                            '<td>'+data[i].professional_body+'</td>'+
                            '<td>'+data[i].valid_form+'</td>'+
                            '<td>'+data[i].valid_to+'</td>'+
                            '<td>'+data[i].status+'</td>'+
                            '<td>'+
                            '<a href="javascript:;" onclick="apply_job('+data[i].opportunity_id+')" class="btn btn-info item-edit" data="'+data[i].id+'" ><span class="glyphicon glyphicon-edit"></span> Apply</a>'+
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


=======
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
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a class="glyphicon glyphicon-pencil" href="javascript:void(0)" role="button" onclick="edit_person()"></a>
                    <img class="profile-user-img img-responsive img-square" src="<?php echo base_url(); ?>assets/images/employee.png" alt="User profile picture" style="height: 200px;width: 200px">

                    <h3  class="profile-username text-center"><b><?php echo $username?></b></h3>

                    <h3 class="profile-username text-center"><?php echo $full_name?></h3>

                    <p class="text-muted text-center">Software Engineer</p>
                    <p class="text-muted text-center"><?php echo $dob ?></p>
                    <p class="text-muted text-center"><?php echo $gender ?></p>


                    <script type="text/javascript">

                        var save_method; //for save method string
                        var table;
                        var save_type;

                        function display_academic()
                        {
                            var table = $('#table_academic').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                           table = $('#table_academic').DataTable({

                               "processing": true, //Feature control the processing indicator.
                               "serverSide": true, //Feature control DataTables' server-side processing mode.

                               // Load data for the table's content from an Ajax source
                               "ajax": {

                                   "url":  "<?php echo site_url('Academic_qualification/ajax_list')?>" ,
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
                        }

                        function display_projects()
                        {
                            var table = $('#table_project').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_project').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Project/ajax_list')?>",
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
                        }

                        function display_work()
                        {
                            var table = $('#table_work').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_work').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Work_experience/ajax_list')?>",
                                        "type": "POST"
                                    },

                                    //Set column definition initialisation properties.
                                    "columnDefs": [
                                        {
                                            "targets": [ -1 ], //last column
                                            "orderable": false //set not orderable
                                        }
                                    ]

                                });
                            });
                        }

                        function display_professional()
                        {
                            var table = $('#table_professional').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_professional').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Professional_qualification/ajax_list')?>",
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
                        }

                        function display_extra_curricular()
                        {
                            var table = $('#table_extra_curricular').DataTable();
                            table.destroy();

                            $(document).ready(function() {
                                table = $('#table_extra_curricular').DataTable({

                                    "processing": true, //Feature control the processing indicator.
                                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                                    // Load data for the table's content from an Ajax source
                                    "ajax": {

                                        "url":  "<?php echo site_url('Extra_curricular/ajax_list')?>",
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
                        }

                        function edit_person()
                        {
                            save_method = 'update';
                            save_type = 'personal';
                            $('#form_personal')[0].reset(); // reset form on modals

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

                                    $('#modal_form_personal').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Personal Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function edit_person_contact()
                        {
                            save_method = 'update';
                            save_type = 'contact';
                            $('#form_contact')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Applicant/ajax_edit/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="email"]').val(data.email);
                                    $('[name="address"]').val(data.address);
                                    $('[name="contact"]').val(data.contact);
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

                        function edit_project()
                        {
                            save_method = 'update';
                            save_type = 'project';
                            $('#form_project')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Applicant/ajax_edit/')?>/" ,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="name"]').val(data.name);
                                    $('[name="date_from"]').val(data.date_from);
                                    $('[name="date_to"]').val(data.date_to);
                                    $('[name="link"]').val(data.link);
                                    $('[name="description"]').val(data.description);

                                    $('#modal_form_project').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Project Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function edit_academic(name)
                        {
                            save_method = 'update';
                            save_type = 'personal';
                            $('#form_academic')[0].reset(); // reset form on modals

                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo site_url('Academic_qualification/ajax_edit/')?>/" + name,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="degree"]').val(data.degree);
                                    $('[name="university"]').val(data.university);
                                    $('[name="degree_type"]').val(data.degree_type);
                                    $('[name="date_from"]').val(data.date_from);
                                    $('[name="date_to]').val(data.date_to);
                                    $('[name="gpa"]').val(data.gpa);

                                    $('#modal_form_academic').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Academic Info'); // Set title to Bootstrap modal title

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }


                        function add_project()
                        {
                            save_method = 'add';
                            save_type = 'project';
                            $('#form_project')[0].reset(); // reset form on modals
                            $('#modal_form_project').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New project'); // Set Title to Bootstrap modal title
                        }

                        function add_academic()
                        {
                            save_method = 'add';
                            save_type = 'academic';
                            $('#form_academic')[0].reset(); // reset form on modals
                            $('#modal_form_academic').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Educational Qualification'); // Set Title to Bootstrap modal title
                        }

                        function add_work()
                        {
                            save_method = 'add';
                            save_type = 'work';
                            $('#form_work')[0].reset(); // reset form on modals
                            $('#modal_form_work').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Work Experience'); // Set Title to Bootstrap modal title
                        }

                        function add_professional()
                        {
                            save_method = 'add';
                            save_type = 'professional';
                            $('#form_professional')[0].reset(); // reset form on modals
                            $('#modal_form_professional').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Professional Qualification'); // Set Title to Bootstrap modal title
                        }

                        function add_extra_curricular()
                        {
                            save_method = 'add';
                            save_type = 'extra_curricular';
                            $('#form_extra_curricular')[0].reset(); // reset form on modals
                            $('#modal_form_extra_curricular').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Extra Curricular Details'); // Set Title to Bootstrap modal title
                        }

                        function add_skill()
                        {
                            save_method = 'add';
                            save_type = 'skill';
                            $('#form_skill')[0].reset(); // reset form on modals
                            $('#modal_form_skill').modal('show'); // show bootstrap modal
                            $('.modal-title').text('Add New Skill'); // Set Title to Bootstrap modal title
                        }


                        function save()
                        {
                            var url;
                            if (save_type == 'personal')
                            {
                                url = "<?php echo site_url('Applicant/ajax_update_personal_info')?>";
                            }
                            else if (save_type == 'contact')
                            {
                                url = "<?php echo site_url('Applicant/ajax_update_contact_info')?>";
                            }

                            else if(save_type == 'academic')
                            {
                                url = "<?php echo site_url('Academic_qualification/ajax_add')?>";
                            }
                            else if(save_type == 'project')
                            {
                                url = "<?php echo site_url('Project/ajax_add')?>";
                            }
                            else if(save_type == 'work')
                            {
                                url = "<?php echo site_url('Work_experience/ajax_add')?>";
                            }
                            else if(save_type == 'professional')
                            {
                                url = "<?php echo site_url('Professional_qualification/ajax_add')?>";
                            }
                            else if(save_type == 'extra_curricular')
                            {
                                url = "<?php echo site_url('Extra_curricular/ajax_add')?>";
                            }
                            else if(save_type == 'skill')
                            {
                                url = "<?php echo site_url('Skill/ajax_add')?>";
                            }






                            // ajax adding data to database
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: $('#form_'.concat(save_type)).serializeArray(),
                                dataType: "JSON",

                                success: function(data)
                                {
                                    //if success close modal and reload ajax table
                                    $('#modal_form_'.concat(save_type)).modal('hide');
                                    reload_table();
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    <a class="glyphicon glyphicon-pencil" href="javascript:void(0)" role="button" onclick="edit_person_contact()"></a>
                    <h3 class="box-title">Contact Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                    <p class="text-muted">
                        <?php echo $email?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                    <p class="text-muted"><?php echo $address ?></p>

                    <hr>

                    <strong><i class="fa fa-phone margin-r-5"></i> Contact Number</strong>

                    <p class="text-muted">
                        <?php echo $contact?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-linkedin-square margin-r-5"></i> Linked In</strong>

                    <p><?php echo $linkedin ?></p>

                    <hr>

                    <strong><i class="fa fa-internet-explorer margin-r-5"></i> Website</strong>

                    <p><?php echo $website ?></p>

                    <hr>

                    <strong><i class="fa fa-github margin-r-5"></i> Github</strong>

                    <p><?php echo $github ?></p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#sectionA" onclick="display_academic()">Education qualifications</a></li>
                    <li><a data-toggle="tab" href="#sectionB" onclick="display_projects()">Projects</a></li>
                    <li><a data-toggle="tab" href="#sectionC" onclick="display_work()">Work Experiences</a></li>
                    <li><a data-toggle="tab" href="#sectionD" onclick="showPro()">Professional Qualifications</a></li>
                    <li><a data-toggle="tab" href="#sectionE" >Extra Curricular Activities</a></li>
                    <li><a data-toggle="tab" href="#sectionF" >Skills</a></li>
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane active">
                        <br/>
                        <div id = "sectionA" class = "row" >
                            <button class="btn btn-success" onclick="add_academic()"><i class="glyphicon glyphicon-plus"></i> Add New Qualification</button>
                            <br />
                            <br />
                            <table id="table_academic" class="table table-striped table-bordered" cellspacing="0" width="100%" style="overflow: scroll;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>University/Institute</th>
                                    <th>Degree Type</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Grade/GPA</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionB" class="tab-pane fade">
                        <br/>
                        <div id = "sectionB" class = "row">
                            <button class="btn btn-success" onclick="add_project()"><i class="glyphicon glyphicon-plus"></i> Add New Project</button>
                            <br />
                            <br />
                            <table id="table_project" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Github Link</th>
                                    <th>Description</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionC" class="tab-pane fade">
                        <br/>
                        <div id = "sectionC" class = "row">
                            <button class="btn btn-success" onclick="add_work()"><i class="glyphicon glyphicon-plus"></i> Add New Work Experience Details</button>
                            <br />
                            <br />
                            <table id="table_work" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>Contract Type</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Company Country</th>
                                    <th>Company Website</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionD" class="tab-pane fade">
                        <br/>
                        <div id = "sectionD" class = "row">
                            <button class="btn btn-success" onclick="add_professional()"><i class="glyphicon glyphicon-plus"></i> Add New Work Professional Qualification Details</button>
                            <br />
                            <br />
                            <table id="table_professional" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company Name</th>
                                    <th>Licence Number</th>
                                    <th>Valid From</th>
                                    <th>Valid To</th>
                                    <th>Verify Status</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="sectionE" class="tab-pane fade">
                        <br/>
                        <div id = "sectionE" class = "row">
                            <button class="btn btn-success" onclick="add_extra_curricular()"><i class="glyphicon glyphicon-plus"></i> Add New Work Extra Curricular Activities</button>
                            <br />
                            <br />
                            <table id="table_extra_curricular" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div id="sectionF" class="tab-pane fade">
                        <br/>
                        <div id = "sectionF" class = "row">
                            <button class="btn btn-success" onclick="add_skill()"><i class="glyphicon glyphicon-plus"></i> Add New Skill</button>
                            <br />
                            <br />
                            <table id="table_skill" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Skill</th>
                                    <th style="width:189px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>




<div class="modal fade" id="modal_form_personal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Personal Info Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_personal" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
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
<!-- End Bootstrap modal -->


<div class="modal fade" id="modal_form_contact" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Contact Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_contact" class="form-horizontal" method="post">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" readonly placeholder="Email" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <input name="address" placeholder="Address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Number</label>
                            <div class="col-md-9">
                                <input name="contact" placeholder="Contact Number" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Linked In</label>
                            <div class="col-md-9">
                                <input name="linkedin" placeholder="Linked In" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-9">
                                <input name="website" placeholder="Website" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-md-3">Github</label>
                        <div class="col-md-9">
                            <input name="github" placeholder="Github" class="form-control" type="text">
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSave"  onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<div class="modal fade" id="modal_form_academic" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Academic Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="" id="form_academic" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Degree</label>
                            <div class="col-md-9">
                                <input name="degree"  placeholder="Degree" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">University/Institute</label>
                            <div class="col-md-9">
                                <input name="university" placeholder="Address" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Degree Type</label>
                            <div class="col-md-9">
                               <!-- <input name="degree_type" placeholder="Degree Type" class="form-control" type="text"> -->
                                <select class="form-control" id="degree_type" name="degree_type">
                                    <option value=""></option>
                                    <option value="certificate">Certificate</option>
                                    <option value="diploma">Diploma</option>
                                    <option value="degree">Degree</option>
                                    <option value="masters">Masters</option>
                                    <option value="phd">PhD</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label col-md-3">Date From</label>
                             <div class="col-md-9">
                                 <input name="date_from" placeholder="Date From" class="form-control" type="date">
                             </div>
                         </div>
                        <div class="form-group">
                             <label class="control-label col-md-3">Date To</label>
                             <div class="col-md-9">
                                 <input name="date_to" placeholder="Date To" class="form-control" type="date">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3">GPA</label>
                             <div class="col-md-9">
                                 <input name="gpa" placeholder="GPA" class="form-control" type="text">
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="submit" id="btnSave"  onclick="save()" class="btn btn-primary">Save</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
             </div>
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<div class="modal fade" id="modal_form_project" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_project" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">* Name</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Type</label>
                            <div class="col-md-9">
                                <input name="type" placeholder="Type" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">*Date From</label>
                            <div class="col-md-9">
                                <input name="date_from" placeholder="From" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">*Date To</label>
                            <div class="col-md-9">
                                <input name="date_to" placeholder="To" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Github Link</label>
                            <div class="col-md-9">
                                <input name="link" placeholder="Github Link" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control" rows="9" id="" name="description" placeholder="Description and Achievements"></textarea>
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

<div class="modal fade" id="modal_form_work" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_work" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Job Title</label>
                            <div class="col-md-9">
                                <input name="job_title" placeholder="Job Title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Name</label>
                            <div class="col-md-9">
                                <input name="company_name" placeholder="Company Name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contract Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="contract_type" name="contract_type">
                                    <option value=""></option>
                                    <option value="work_full">Job - Full Time</option>
                                    <option value="work_part">Job - Part Time</option>
                                    <option value="intern_full">Intern - Full Time</option>
                                    <option value="intern_part">Intern - Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date From</label>
                            <div class="col-md-9">
                                <input name="date_from" placeholder="Date From" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date To</label>
                            <div class="col-md-9">
                                <input name="date_to" placeholder="Date To" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Website</label>
                            <div class="col-md-9">
                                <input name="company_website" placeholder="Company Website" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Company Country</label>
                            <div class="col-md-9">
                                <input name="company_country" placeholder="Company country" class="form-control" type="text">
                            </div>"
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

<div class="modal fade" id="modal_form_professional" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_professional" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <select class="form-control" id="qualification" name="title">
                                    <option value=""></option>
                                    <option value="ccna">CCNA</option>
                                    <option value="cima">CIMA</option>
                                    <!--
                                    <option value="intern_full">Intern - Full Time</option>
                                    <option value="intern_part">Intern - Part Time</option>
                                    -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Licence Number</label>
                            <div class="col-md-9">
                                <input name="licence_no" placeholder="Licence Number" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Professional Body</label>
                            <div class="col-md-9">
                                <input name="professional body" placeholder="Professional Body" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Valid From</label>
                            <div class="col-md-9">
                                <input name="valid_from" placeholder="Valid From" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Valid To</label>
                            <div class="col-md-9">
                                <input name="Valid_to" placeholder="Valid To" class="form-control" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-9">
                                <input name="website" placeholder="Website" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Country</label>
                            <div class="col-md-9">
                                <input name="country" placeholder="country" class="form-control" type="text">
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

<div class="modal fade" id="modal_form_extra_curricular" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Projects Details Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_extra_curricular" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Activity Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="activity_type" name="activity_type">
                                    <option value=""></option>
                                    <option value="hackathon">Hackathon</option>
                                    <option value="society">Society</option>
                                    <option value="volunteering">Volunteering</option>
                                    <option value="sport">Sports</option>
                                    <option value="aesthetic">Aesthetic</option>
                                    <option value="blogging">Blogging</option>
                                    <!--
                                    <option value="intern_full">Intern - Full Time</option>
                                    <option value="intern_part">Intern - Part Time</option>
                                    -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="Name" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="9" id="" name="description" placeholder="Description and Achievements"></textarea>
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

<div class="modal fade" id="modal_form_skill" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Skill Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_skill" class="form-horizontal">
                    <input type="hidden" value="<?php echo $applicant_id?>" name="applicant_id""/>
                    <div class="form-body">
                        <select name="selection1" class="form-control" onchange="selectIngredient(this);">
                            <option value="None">None</option>
                            <option value="Java">Java</option>
                            <option value="Php">Php</option>
                            <option value="Android">Android</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Scrum">Scrum</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="C#">C#</option>
                            <option value="Front-End">Front-End</option>
                            <option value="Back-End">Back-End</option>
                        </select>
                        <select name="selection2" class="form-control" onchange="selectIngredient(this);">
                            <option value="None">None</option>
                            <option value="Java">Java</option>
                            <option value="Php">Php</option>
                            <option value="Android">Android</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Scrum">Scrum</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="C#">C#</option>
                            <option value="Front-End">Front-End</option>
                            <option value="Back-End">Back-End</option>
                        </select>
                        <select name="selection3" class="form-control" onchange="selectIngredient(this);">
                            <option value="None">None</option>
                            <option value="Java">Java</option>
                            <option value="Php">Php</option>
                            <option value="Android">Android</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                            <option value="Scrum">Scrum</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="C#">C#</option>
                            <option value="Front-End">Front-End</option>
                            <option value="Back-End">Back-End</option>
                        </select>
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

<script>
    $(function(){
        showPro();

        //function
        function showPro(){
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
                            '<td>'+data[i].title+'</td>'+
                            '<td>'+data[i].professional_body+'</td>'+
                            '<td>'+data[i].valid_form+'</td>'+
                            '<td>'+data[i].valid_to+'</td>'+
                            '<td>'+data[i].status+'</td>'+
                            '<td>'+
                            '<a href="javascript:;" onclick="apply_job('+data[i].opportunity_id+')" class="btn btn-info item-edit" data="'+data[i].id+'" ><span class="glyphicon glyphicon-edit"></span> Apply</a>'+
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


>>>>>>> master
