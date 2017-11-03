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
                        <h3 class="panel-title text-center">Sign up as an Employer</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url()?>Company/form_validation">
                            <?php
                            if ($this->uri->segment(2) == 'inserted'){
                                echo '<div class="alert alert-success" role="alert">Data Inserted Successfully</div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Userame" required="">
                                <span class="text-danger"><?php echo form_error('username')?></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                                <span class="text-danger"><?php echo form_error('email')?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                                <span class="text-danger"><?php echo form_error('password')?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                <span class="text-danger"><?php echo form_error('confirm_password')?></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Sign up</button>
                                <br/>
                                <a href="<?php echo base_url(); ?>Company/Login">Already have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>