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
                        <h3 class="panel-title text-center">Sign up as an Applicant</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url()?>Applicant/form_validation">
                            <?php
                            if ($this->uri->segment(2) == 'inserted'){
                                echo '<div class="alert alert-success" role="alert">Data Inserted Successfully</div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
                                <span class="text-danger"><?php echo form_error('username')?></span>
                                <!--<p class="help-block">At least 4 characters, letters or numbers only</p>-->
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                <span class="text-danger"><?php echo form_error('email')?></span>
                                <!--<p class="help-block">A valid email address</p>-->
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
                                <span class="text-danger"><?php echo form_error('password')?></span>
                                <!--<p class="help-block">At least 6 characters</p>-->
                            </div>
                            <div class="form-group">
                                <label for="password_confirm">Confirm password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
                                <span class="text-danger"><?php echo form_error('confirm_password')?></span>
                                <!--<p class="help-block">Must match your password</p>-->
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" class="btn btn-success" value="Register">
                                <br/>
                                Already have an account?<a href="<?php echo base_url(); ?>Applicant/Login">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>