<div id = "haha">
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
    <div class = "row">
        <h4 style="text-align: center;font-weight: bolder">Verify Companies</h4><br/>

        <br/>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Company Name</th>
                <th>Company Registration No.</th>
                <th>Verified status</th>
                <th style="width:189px;">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>


        </table>
        <br/>
        <h4 style="text-align: center;font-weight: bolder">Verified Qualifications</h4><br/>

        <br/>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Professional Qualification</th>
                <th>Certificate No.</th>
                <th>Verified Status</th>
            </tr>
            </thead>
            <tbody>
            </tbody>


        </table>
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
                    "url": "<?php echo site_url('Company/ajax_list_min')?>",
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


        function edit_company(company_id)
        {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('Company/ajax_edit/')?>/" + company_id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {

                    $('[name="company_id"]').val(data.company_id);
                    $('[name="company_name"]').val(data.company_name);
                    $('[name="register_no"]').val(data.register_no);
                    $('[name="verified_status"]').val(data.verified_status);

                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Company'); // Set title to Bootstrap modal title

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax
        }

        function save()
        {
            var url;
            url = "<?php echo site_url('Company/ajax_update_min')?>";
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


        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });


    </script>

    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Company Form</h3>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                        <input type="hidden" value="" name="company_id"/>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Company Name</label>
                                <div class="col-md-9">
                                    <input name="company_name" placeholder="Company Name" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Company Registration No.</label>
                                <div class="col-md-9">
                                    <input name="register_no" placeholder="Company Registration Number" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Verified Status</label>
                                <div class="col-md-9">
                                    <input type="text" name="verified_status" placeholder="Verified Status" class="form-control">
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

</div>



