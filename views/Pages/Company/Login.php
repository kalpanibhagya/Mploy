<section style="margin-top: 80px">
    <div class="container" align="center">
        <img src='<?php echo base_url();?>assets/images/logo.png' width="100px" height="100px"><br/>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Login as an Employer</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo $this->session->flashdata('error');
                        if ($this->uri->segment(2) == 'inserted'){
                            echo '<div class="alert alert-success" role="alert">Data Inserted Successfully</div>';
                        }
                        ?>
                        <form method="post" action="<?php echo base_url()?>Company/login_validation">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="" autofocus="autofocus">
                                <span class="text-danger"><?php echo form_error('email')?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                                <span class="text-danger"><?php echo form_error('password')?></span>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Login</button>
                                <br/>
                                <a href="<?php echo base_url(); ?>Common/forget_password2">Forget password?</a><br/>
                                Not a member?<a href="<?php echo base_url(); ?>Company/Signup">Join Now</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>