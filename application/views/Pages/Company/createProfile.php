<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sign Up</title>
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/png">
    <link href="<?php echo base_url()."assets/form-wizard/"; ?>css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()."assets/form-wizard/"; ?>css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()."assets/form-wizard/"; ?>style.css" rel="stylesheet"/>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

        <form action="<?php echo base_url()?>Company/profile_validation" method="post" id="form1">
            <div class="wizards">
                <div class="progressbar">
                    <div class="progress-line" data-now-value="12.11" data-number-of-steps="5" style="width: 12.11%;"></div> <!-- 19.66% -->
                </div>
                <div class="form-wizard active">
                    <div class="wizard-icon"><i class="fa fa-key"></i></div>
                    <p>Account</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-building"></i></div>
                    <p>Company Details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-fax"></i></div>
                    <p>Contact Details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-user-secret"></i></div>
                    <p>Contact Person</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="fa fa-check-circle"></i></div>
                    <p>Finish</p>
                </div>
            </div>


            <fieldset id="account">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
                    <span class="text-danger"><?php echo form_error('username')?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Use Company Email" required="">
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
                    Already registered?<a href="<?php echo base_url(); ?>Company/Login"> Login</a><br/>
                    By continuing you agree to our<a href="<?php echo base_url(); ?>Company/Login"> Terms and Privacy Policy</a>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-next" id="next">Next</button>
                </div>
            </fieldset>

            <fieldset id="company_details">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Company Name"/>
                </div>
                <div class="form-group">
                    <label>Company Registration Number</label>
                    <input type="text" name="reg_number" class="form-control" placeholder="2 letters followed by 6 numbers"/>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select class="form-control" name= "country" style="height: 50px">
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaçao">Curaçao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard Island and McDonald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="India">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran, Islamic Republic of</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macao</option>
                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Réunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="BL">Saint Barthélemy</option>
                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="MF">Saint Martin (French part)</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SX">Sint Maarten (Dutch part)</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="SS">South Sudan</option>
                        <option value="ES">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="TL">Timor-Leste</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Company Type</label>
                    <select class="form-control" name= "company_type" style="height: 50px">
                        <option>Public organization</option>
                        <option>Private organization</option>
                        <option>Non profit organization</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Company Size</label>
                    <select class="form-control" name="company_size">
                        <option>10-100</option>
                        <option>100-500</option>
                        <option>500-1000</option>
                        <option>1000+</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Specialized Area</label>
                    <select class="form-control" name="area" style="height: 50px">
                        <option>General</option>
                        <option>Android</option>
                        <option>Web</option>
                        <option>Web and Android</option>
                        <option>Desktop</option>
                        <option>CMS</option>
                        <option>Networking</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Logo</label><br/>
                    <input type="file" class="btn btn-success" name="logo" value="#">   Select a file to upload.
                </div>
                <div class="form-group">
                    <label>Hiring Status (Currently Hiring or Not)</label>
                    <select class="form-control" name="hiring_status" style="height: 50px">
                        <option value="Yes">Currently Hiring</option>
                        <option value="No">Currently Not Hiring</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="10" class="form-control" placeholder="About your company"></textarea>
                </div>
                <div class="text-center">
                    Already registered?<a href="<?php echo base_url(); ?>Company/Login"> Login</a><br/>
                    By continuing you agree to our<a href="<?php echo base_url(); ?>Company/Login"> Terms and Privacy Policy</a>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>

            <fieldset id="contact_details">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="telephone" class="form-control" placeholder="eg: 011-4323521"/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="eg: Colombo,Sri Lanka"/>
                </div>
                <div class="form-group">
                    <label>Linked In</label>
                    <input type="url" name="linkedin" class="form-control" placeholder="linked in profile url"/>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="url" name="website" class="form-control" placeholder="web site url"/>
                </div>
                <div class="text-center">
                    Already registered?<a href="<?php echo base_url(); ?>Company/Login"> Login</a><br/>
                    By continuing you agree to our<a href="<?php echo base_url(); ?>Company/Login"> Terms and Privacy Policy</a>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>

            <fieldset id="contact_person">
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="cname" class="form-control" placeholder="Contact person name"/>
                </div>
                    <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="cemail" class="form-control" placeholder="Contact person email address"/>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="ctelephone" class="form-control" placeholder="Contact person telephone number"/>
                </div>
                <div class="text-center">
                    Already registered?<a href="<?php echo base_url(); ?>Company/Login"> Login</a><br/>
                    By continuing you agree to our<a href="<?php echo base_url(); ?>Company/Login"> Terms and Privacy Policy</a>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next">Next</button>
                </div>
            </fieldset>

            <fieldset id="finish">
                <div class="jumbotron text-center">
                <h1>Please click submit button to save your data</h1>
                </div>
                <div class="text-center">
                    Already registered?<a href="<?php echo base_url(); ?>Company/Login"> Login</a><br/>
                    By continuing you agree to our<a href="<?php echo base_url(); ?>Company/Login"> Terms and Privacy Policy</a>
                </div>
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </fieldset>
            </form>



            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>js/popper.min.js"></script>
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()."assets/form-wizard/"; ?>script.js"></script>

<!--<script>-->
<!--    $("#next").click(function(){-->
<!--        var form = $("#myform");-->
<!--        form.validate({-->
<!--                rules: {-->
<!--                    username: {-->
<!--                        required: true,-->
<!--                        minlength: 6,-->
<!--                    },-->
<!--                    ........-->
<!--                },-->
<!--                messages: {-->
<!--                    username: {-->
<!--                        required: "Username required",-->
<!--                    },-->
<!--        ........-->
<!--                }-->
<!--        });-->
<!--        if (form.valid() == true){-->
<!--            current_fs = $('#account');-->
<!--            next_fs = $('#company_details');-->
<!--            next_fs.show();-->
<!--            current_fs.hide();-->
<!--        }else {-->
<!--            next_fs.hide();-->
<!--            current_fs.show();-->
<!--        }-->
<!--    });-->
<!--</script>-->


</body>
</html>