
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>



    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <a class="glyphicon glyphicon-pencil" href="javascript:void(0)" role="button" onclick="edit_person()"></a>
                    <img class="profile-user-img img-responsive img-square" src="#" alt="User profile picture" style="height: 200px;width: 200px">

                    <h3  class="profile-username text-center"><b><?php echo $username?></b></h3>

                    <h3 class="profile-username text-center"><?php echo $full_name?></h3>

                    <p class="text-muted text-center">Software Engineer</p>
                    <p class="text-muted text-center"><?php echo $dob ?></p>
                    <p class="text-muted text-center"><?php echo $gender ?></p>



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


                        function save()
                        {
                            var url;
                            if(save_method == 'add')
                            {
                                url = "<?php echo site_url('Applicant/ajax_add')?>";
                            }
                            else
                            {
                                url = "<?php echo site_url('Applicant/ajax_update')?>";
                            }

                            // ajax adding data to database
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: $('#form').serialize(),
                                dataType: "JSON",
                                success: function(data)
                                {
                                    //if success close modal and reload ajax table
                                    $('#modal_form').modal('hide');
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
                    <h3 class="box-title">Contact Details</h3>  <a class="glyphicon glyphicon-pencil" role="button"></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                    <p class="text-muted">
                        john@gmail.com
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                    <p class="text-muted">Colombo, Sri Lanka</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Contact Number</strong>

                    <p class="text-muted">
                        011-94734221
                    </p>

                    <hr>

                    <strong><i class="fa fa-linkedin-square margin-r-5"></i> Linked In</strong>

                    <p>http://www.linedin.com/in/john</p>

                    <hr>

                    <strong><i class="fa fa-internet-explorer margin-r-5"></i> Website</strong>

                    <p>http://www.computer.com</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#sectionA">Personal Details</a></li>
                    <li><a data-toggle="tab" href="#sectionB">Education qualifications</a></li>
                    <li><a data-toggle="tab" href="#sectionC">Experience</a></li>
                    <li><a data-toggle="tab" href="#sectionD">Other qualifications</a></li>
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane fade in active">
                        <br/>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6"  class="col-sm-6" >
                                    <div class="col10">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label for="sel1">* Applicant Type</label>
                                                <select id="sel1" name="sel1" onchange="java_script_:show(this.options[this.selectedIndex].value)" class="form-control">
                                                    <option selected>job</option>
                                                    <option>intern</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" class="col-sm-6">
                                    <div class="col11">
                                        <fieldset>
                                            <legend><b>Main Facts</b></legend>
                                            <div class="form-group">
                                                <label for="fn"> Full Name</label>
                                                <input type="text" class="form-control" id="fname">
                                            </div>
                                            <div class="form-group"> <!-- Date input -->
                                                <label class="control-label" for="dob"> Date of Birth:</label>
                                                <input class="form-control" id="dob" name="date" type="date"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="age"> Age</label>
                                                <input type="text" class="form-control" id="age">
                                            </div>
                                            <div class="form-group">
                                                <label for="gen"> Gender</label>
                                                <select id="sel1" name="sel1" class="form-control">
                                                    <option selected>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6" class="col-sm-6">
                                    <div class="col12">
                                        <div id="hiddenDiv" style="display:none">
                                            <fieldset>
                                                <legend><b>Preferred area and companies</b></legend>
                                                <div class="form-group">
                                                    <label for="selpa"> Preferred Area</label>
                                                    <select class="form-control" id="selpa">
                                                        <option>Developer</option>
                                                        <option>Business Analyst</option>
                                                        <option>UX/UI</option>
                                                        <option>Networking</option>
                                                        <option>Research</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="selc"> Companies</label>
                                                    <form class="form-inline">
                                                        <input class="form-control" id="sel1" name="company1" type="text"/>
                                                        <input class="form-control" id="sel2" name="company2" type="text"/>
                                                        <input class="form-control" id="sel3" name="company3" type="text"/>
                                                    </form>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <fieldset>
                                            <legend><b>Contacts</b></legend>
                                            <div class="form-group">
                                                <label for="email"> Email</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="cn"> Contact number</label>
                                                <input type="text" class="form-control" id="cn">
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend><b> Address</b></legend>
                                            <div class="form-group">
                                                <input class="form-control" id="address" name="address" type="text"/>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="sectionB" class="tab-pane fade">
                        <br/>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>University/Institute</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col8">
                                                <fieldset>
                                                    <legend><b>Degree Details</b></legend>
                                                    <div class="form-group">
                                                        <label for="n1">* Degree</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="n1">* Degree Level</label>
                                                        <select class="form-control" id="level">
                                                            <option value="1">Certificate</option>
                                                            <option value="2">Diploma</option>
                                                            <option value="3">Bachelor</option>
                                                            <option value="4">Master</option>
                                                            <option value="5">PhD</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                                    <div class="form-group">
                                                        <label for="n1">* Grade/GPA</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sel1">* Class</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>none</option>
                                                            <option>First class</option>
                                                            <option>Second - upper</option>
                                                            <option>Second - lower</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col9">
                                                <fieldset>
                                                    <legend><b>University/Institute details</b></legend>
                                                    <div class="form-group">
                                                        <label for="sel1">* University/Institute</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>University of Colombo</option>
                                                            <option>University of Moratuwa</option>
                                                            <option>University of Peradeniya</option>
                                                            <option>University of Ruhuna</option>
                                                            <option>University of Kelaniya</option>
                                                            <option>University of Wayamba</option>
                                                            <option>SLIIT</option>
                                                            <option>APIIT</option>
                                                            <option>NIBM</option>
                                                            <option>NSBM</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cn1"></label>
                                                        <input type="text" class="form-control" id="cn1" placeholder="Other">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web1">Website</label>
                                                        <input type="url" class="form-control" id="web1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="con1">Country</label>
                                                        <input type="text" class="form-control" id="con1">
                                                    </div>

                                                    <div>
                                                        <ul>
                                                            <li><input type="submit" name="" value="save" class="btn" id="save5"></li>
                                                            <li><input type="submit" name="" value="cancel" class="btn" id="cancel5"></li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="sectionC" class="tab-pane fade">
                        <br/>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Projects</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col4">
                                                <div class="form-group">
                                                    <label for="n2">* Name</label>
                                                    <input type="text" class="form-control" id="n2">
                                                </div>
                                                <div class="form-group"> <!-- Date input -->
                                                    <label class="control-label" for="date">* Date</label>
                                                    <input class="form-control" id="date" name="date" type="date"/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" id="date" name="date" type="date"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="git">Github Link</label>
                                                    <input type="url" class="form-control" id="git">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col5">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="9" id="comment" placeholder="Description and Achievements"></textarea>
                                                </div>
                                                <p id="req">* Required</p>
                                                <div>
                                                    <ul>
                                                        <li><input type="submit" name="" value="save" class="btn" id="save3"></li>
                                                        <li><input type="submit" name="" value="cancel" class="btn" id="cancel3"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Work Experience</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col6">
                                                <fieldset>
                                                    <legend><b>Job/Internship details</b></legend>
                                                    <div class="form-group">
                                                        <label for="jt">* Job Title</label>
                                                        <input type="text" class="form-control" id="jt">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selct">* Contract Type</label>
                                                        <select class="form-control" id="selct">
                                                            <option>Full time</option>
                                                            <option>Part time</option>
                                                            <option>Internship - Full time</option>
                                                            <option>Internship - Part time</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col7">
                                                <fieldset>
                                                    <legend><b>Company details</b></legend>
                                                    <div class="form-group">
                                                        <label for="cn">* Company Name</label>
                                                        <input type="text" class="form-control" id="cn">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web">Website</label>
                                                        <input type="url" class="form-control" id="web">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="con">Country</label>
                                                        <input type="text" class="form-control" id="con">
                                                    </div>

                                                    <div>
                                                        <ul>
                                                            <li><input type="submit" name="" value="save" class="btn" id="save4"></li>
                                                            <li><input type="submit" name="" value="cancel" class="btn" id="cancel4"></li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="sectionD" class="tab-pane fade">
                        <br/>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Professional Qualifications</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col8">
                                                <fieldset>
                                                    <legend><b>Qualification Details</b></legend>
                                                    <div class="form-group">
                                                        <label for="n1">* Title</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="n1">* Licence no.</label>
                                                        <select class="form-control" id="level">
                                                            <option value="1">Certificate</option>
                                                            <option value="2">Diploma</option>
                                                            <option value="3">Bachelor</option>
                                                            <option value="4">Master</option>
                                                            <option value="5">PhD</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                                    <div class="form-group">
                                                        <label for="n1">* Grade/GPA</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sel1">* Class</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>none</option>
                                                            <option>First class</option>
                                                            <option>Second - upper</option>
                                                            <option>Second - lower</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col9">
                                                <fieldset>
                                                    <legend><b>Professional Organization details</b></legend>
                                                    <div class="form-group">
                                                        <label for="sel1">* University/Institute</label>
                                                        <select class="form-control" id="sel1">
                                                            <option>University of Colombo</option>
                                                            <option>University of Moratuwa</option>
                                                            <option>University of Peradeniya</option>
                                                            <option>University of Ruhuna</option>
                                                            <option>University of Kelaniya</option>
                                                            <option>University of Wayamba</option>
                                                            <option>SLIIT</option>
                                                            <option>APIIT</option>
                                                            <option>NIBM</option>
                                                            <option>NSBM</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cn1"></label>
                                                        <input type="text" class="form-control" id="cn1" placeholder="Other">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="web1">Website</label>
                                                        <input type="url" class="form-control" id="web1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="con1">Country</label>
                                                        <input type="text" class="form-control" id="con1">
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><input type="submit" name="" value="save" class="btn" id="save5"></li>
                                                            <li><input type="submit" name="" value="cancel" class="btn" id="cancel5"></li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Hackathons/ Societies/ Community works</b></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col1">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="n1">* Name</label>
                                                        <input type="text" class="form-control" id="n1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selt">* Type</label>
                                                        <select class="form-control" id="selt">
                                                            <option>Hackthons</option>
                                                            <option>Societies</option>
                                                            <option>Community works</option>
                                                        </select>
                                                    </div>
                                                    <form method="post">
                                                        <div class="form-group"> <!-- Date input -->
                                                            <label class="control-label" for="date">* Date</label>
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" id="date" name="date" type="date"/>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" class="col-md-6">
                                            <div class="col2">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="12" id="comment" placeholder="Description and Achievements, any links"></textarea>
                                                </div>

                                                <div>
                                                    <ul>
                                                        <li><input type="submit" name="" value="save" class="btn" id="save1"></li>
                                                        <li><input type="submit" name="" value="cancel" class="btn" id="cancel1"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6" class="col-sm-6">
                                    <div class="col3">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><b>Skill</b></div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="name">* Add your Skills</label>
                                                    <ul>
                                                        <li onclick="this.parentNode.removeChild(this);">
                                                            <input type="hidden" name="ingredients[]" value="None" />
                                                            None
                                                        </li>
                                                    </ul>
                                                    <select class="form-control" onchange="selectIngredient(this);">
                                                        <option value="1">Java</option>
                                                        <option value="2">Php</option>
                                                        <option value="3">Android</option>
                                                        <option value="4">C</option>
                                                        <option value="5">C++</option>
                                                        <option value="6">Scrum</option>
                                                        <option value="7">Firebase</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--div id="dropdown1" class="tab-pane fade">

                            <p>Dropdown 1 content…</p>

                        </div>

                        <div id="dropdown2" class="tab-pane fade">

                            <p>Dropdown 2 content…</p>

                        </div-->

                    </div>

                    <script>
                        function show(aval) {
                            if (aval == "intern") {
                                hiddenDiv.style.display='block';
                                Form.fileURL.focus();
                            }
                            else{
                                hiddenDiv.style.display='none';
                            }
                        }
                    </script>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>


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
<!-- End Bootstrap modal -->


</body>
</html>


