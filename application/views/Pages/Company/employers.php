<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<div class = "row">
    <h4 style="text-align: center;font-weight: bolder">Other Companies</h4><br/>
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Company Name</th>
            <th>Company Registration No.</th>
            <th>Country</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact Number</th>
        </tr>

        </thead>

        <tbody id="showdata">

        </tbody>


    </table>
</div>



<script>
    $(function(){
        showAllEmployers();

        //function
        function showAllEmployers(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>Company/showAllEmployers',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html +='<tr>'+
                            //'<td>'+data[i].id+'</td>'+
                            '<td>'+data[i].company_name+'</td>'+
                            '<td>'+data[i].register_no+'</td>'+
                            '<td>'+data[i].country+'</td>'+
                            '<td>'+data[i].email+'</td>'+
                            '<td>'+data[i].address+'</td>'+
                            '<td>'+data[i].contact_no+'</td>'+
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
</script>



</body>
</html>


