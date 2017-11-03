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
                        ?>
                        <form method="post" action="<?php echo base_url()?>Company/login_validation">
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
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Login</button>
                                <br/>
                                <a href="#">Forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>