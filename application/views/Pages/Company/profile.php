<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<div class="container">

    <div class="row">
        <div class="col-md-10">
                    <form method="post" action="#">
                            <legend class="text-center">Main Facts</legend>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('username'); ?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $this->session->userdata('company_name'); ?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Company Register Certificate No.</label>
                                <input type="text" class="form-control" name="register_no" value="<?php echo $this->session->userdata('register_no'); ?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Company Type</label>
                                <input type="text" class="form-control" name="type" value="<?php echo $this->session->userdata('type'); ?>" required="">

                            </div>
                            <div class="form-group">
                                <label>Company size</label>
                                <input type="texr" class="form-control" id="size" name="size"  value="<?php echo $this->session->userdata('size'); ?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Currently hiring ?</label>
                                <input type="text" class="form-control" name="hiring_status" value="<?php echo $this->session->userdata('hiring_status'); ?>">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="form-control" placeholder="About your company"><?php echo $this->session->userdata('about'); ?></textarea>
                            </div>

                            <legend class="text-center">Company Contact Details</legend>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('email'); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Contact Number</label>
                                <input type="tel" class="form-control" name="contact_no" value="<?php echo $this->session->userdata('contact_no'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linked In</label>
                                <input type="url" class="form-control" name="linkedin" value="<?php echo $this->session->userdata('linkedin'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="website">Website URL</label>
                                <input type="url" class="form-control" name="website" value="<?php echo $this->session->userdata('website'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country" value="<?php echo $this->session->userdata('country'); ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="city">Address</label>
                                <input type="text" class="form-control" name="address" value="<?php echo $this->session->userdata('address'); ?>" required="">
                            </div>

                            <legend class="text-center">Contact Person Details</legend>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="<?php echo $this->session->userdata('cname'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="tel" class="form-control" name="ctelephone" value="<?php echo $this->session->userdata('ctelephone'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="url" class="form-control" name="cemail" value="<?php echo $this->session->userdata('cemail'); ?>">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" type="submit" value="Submit">Update</button>
                                <a href="<?php echo base_url(); ?>Company/enter" class="btn btn-default" role="button">Cancel</a>
                                <br/>
                            </div>
                            <br/>
                    </form>
        </div>
                </div>
            </div>




</body>
</html>


