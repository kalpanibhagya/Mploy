<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Profile</title>
    <link href="<?php echo base_url()."assets/form-wizard/"; ?>css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()."assets/form-wizard/"; ?>css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()."assets/form-wizard/"; ?>style.css" rel="stylesheet"/>
</head>
<body>
    <a href="<?php echo base_url(); ?>Applicant/logout">Logout</a>
    <div class="container">
        <?php
            echo $this->session->flashdata('error');
            if ($this->uri->segment(2) == 'inserted'){
                echo '<div class="alert alert-success" role="alert">Data Inserted Successfully</div>';
            }
        ?>
        <form action="save.php" method="post">
            <div class="wizards">
                <div class="progressbar">
                    <div class="progress-line" data-now-value="12.11" data-number-of-steps="5" style="width: 12.11%;"></div> <!-- 19.66% -->
                </div>
                <div class="form-wizard active">
                    <div class="wizard-icon"><i class="fa fa-question"></i></div>
                    <p>Who are you?</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-user"></i></div>
                    <p>Personal Details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-graduation-cap"></i></div>
                    <p>Eductional Qualifications</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-suitcase"></i></div>
                    <p>Experience</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-paint-brush"></i></div>
                    <p>Other Skills</p>
                </div>
            </div>
            <fieldset>
                <h4>Who are you? </h4>
                <div class="form-group">
                    <select id="sel1" name="sel1" onchange="java_script_:show(this.options[this.selectedIndex].value)" class="form-control">
                        <option selected>Job Applicant</option>
                        <option>Internship Applicant</option>
                    </select>
                </div>
                <div id="hiddenDiv" style="display:none">
                                
                    <h4><b>Preferred area and companies</b></h4>
                    <div class="form-group">
                        <label for="selpa">Preferred Area</label>
                        <select class="form-control" id="selpa">
                            <option>none</option>
                            <option>a</option>
                            <option>b</option>
                        </select>
                    </div>
                    <div class="form-group form-inline">
                        <label for="selc">Companies</label>
                            <select class="form-control" id="sel1">
                                <option>none</option>
                                <option>ajkhhhhhhhhhhh</option>
                                <option>b</option>
                            </select>
                            <select class="form-control" id="sel2">
                                <option>none</option>
                                <option>ajkhhhhhhhhhhh</option>
                                <option>b</option>
                            </select>
                            <select class="form-control" id="sel3">
                                <option>none</option>
                                <option>ajkhhhhhhhhhhh</option>
                                <option>b</option>
                            </select>
                    </div>       
                </div>
                <iframe src="<?php echo base_url()."assets/form-wizard/"; ?>license.txt"></iframe>
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="yes"> I agree with this license
                </label>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                <h4>Input personal data</h4>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama anda"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Surel anda"/>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" class="form-control" placeholder="Nomor telpon anda"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" placeholder="Alamat anda"></textarea>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                <h4>Input account info</h4>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Nama pengguna"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Kata sandi"/>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                    <h4>Input website info</h4>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul website"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="Deskripsi website"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Website URL</label>
                        <input type="text" name="sites" class="form-control" placeholder="Alamat website"/>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Category website"/>
                    </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>
            <fieldset>
                <div class="jumbotron text-center">
                <h1>Please click submit button to save your data</h1>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </fieldset>
        </form>
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
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>js/popper.min.js"></script>
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>script.js"></script>
</body>
</html>