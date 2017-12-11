<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>M-Ploy</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>Welcome/Company_main">M-Ploy</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-right">
                    <a class="btn btn-success" href="<?php echo base_url(); ?>Company/post_an_internship" role="button">Post an new Internship</a>
                    <a class="btn btn-success" href="<?php echo base_url(); ?>Company/dashboard" role="button">Dashboard</a>
                    <a class="btn btn-success" href="<?php echo base_url(); ?>Company/logout" role="button">Logout</a>
                </form>
            </div>
        </div>
    </nav>

</header>

<section style="margin-top: 50px;background-color: lightgrey">
    <div class="alert alert-success text-center" role="alert">Post your job opportunity here.</div>

    <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#sectionA">Job Details</a></li>
                <li><a data-toggle="tab" href="#sectionB">Evaluation Criteria</a></li>
            </ul>

            <div class="tab-content">
                <div id="sectionA" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="floating-box">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Job title</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       placeholder="Eg:- Software Engineer" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="salary">Contract Type</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option value="full-time">Full Time</option>
                                                    <option value="part-time">Part Time</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="registerNo">Location</label>
                                                <textarea class="form-control" id="location" rows="3" required=""></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="number">Required no. of Employees</label>
                                                <input type="number" class="form-control" id="number" name="number" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="from">Application Duration</label>
                                                <input type="date" class="form-control" id="from" name="from" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" id="to" name="to" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="floating-box">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="salary">Salary</label>
                                                <input type="text" class="form-control" id="salary" name="salary" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" required="" rows="10"></textarea>
                                            </div>
                                            <div class="form-group" align="right">
                                                <a href="#sectionB" class="btn btn-success" role="button">Save</a>
                                                <a href="createOpportunity.php" class="btn btn-default" role="button">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sectionB" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="floating-box">
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Academic Qualifications</div>
                                                <div class="panel-body">
                                                    <div class="inline">
                                                        <label>Total Percentage:</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="number" name="academic_percentage"><br/>
                                                            <span class="input-group-addon">%</span>
                                                        </div></div>
                                                    <div class="form-group">
                                                        <table>
                                                            <tr>
                                                                <th>Degree Type</th>
                                                                <th>Marks</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Certificate</td>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diploma</td>
                                                                <td>
                                                                    <input class="form-control" id="marks2" name="marks2" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bachelors</td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Masters</td>
                                                                <td>
                                                                    <input class="form-control" id="marks4" name="marks4" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>PhD</td>
                                                                <td>
                                                                    <input class="form-control" id="marks5" name="marks5" type="number" required="">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="floating-box">
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Experiences</div>
                                                <div class="panel-body">
                                                    <div class="inline">
                                                        <label>Total Percentage:</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="number" name="experience_percentage"><br/>
                                                            <span class="input-group-addon">%</span>
                                                        </div></div>
                                                    <div class="form-group">
                                                        <table>
                                                            <tr>
                                                                <th>Experience</th>
                                                                <th>Contract type</th>
                                                                <th>Marks</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Work Experience</td>
                                                                <td>Full time</td>
                                                                <td>
                                                                    <input class="form-control" id="marks6" name="marks6" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Work Experience</td>
                                                                <td>Part time</td>
                                                                <td>
                                                                    <input class="form-control" id="marks7" name="marks7" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Work Experience</td>
                                                                <td>Internship - Full time</td>
                                                                <td>
                                                                    <input class="form-control" id="marks8" name="marks8" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Work Experience</td>
                                                                <td>Internship - Part time</td>
                                                                <td>
                                                                    <input class="form-control" id="marks9" name="marks9" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Project</td>
                                                                <td>--</td>
                                                                <td>
                                                                    <input class="form-control" id="marks10" name="marks10" type="number" required="">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="floating-box">
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Professional Qualifications</div>
                                                <div class="panel-body">
                                                    <div class="inline">
                                                        <label>Total Percentage:</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="number" name="pqualification_percentage"><br/>
                                                            <span class="input-group-addon">%</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <table>
                                                            <tr>
                                                                <th>Qualification type</th>
                                                                <th>Marks</th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="text" required="">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="text" required="">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="marks2" name="marks2" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="text" required="">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="text" required="">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="text" required="">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="floating-box">
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Extra Curricular Activities</div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="inline">
                                                            <label>Total Percentage:</label>
                                                            <div class="input-group">
                                                                <input class="form-control" type="number" name="extra_percentage"><br/>
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </div>
                                                        <table>
                                                            <tr>
                                                                <td>Hackathons</td>
                                                                <td>
                                                                    <input class="form-control" id="marks1" name="marks1" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Societies</td>
                                                                <td>
                                                                    <input class="form-control" id="marks2" name="marks2" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Volunteering</td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sports</td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Aesthetic</td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Blogging</td>
                                                                <td>
                                                                    <input class="form-control" id="marks3" name="marks3" type="number" required="">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="floating-box">
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Required Skills</div>
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
                                                            <option value="Java">Java</option>
                                                            <option value="Php">Php</option>
                                                            <option value="Android">Android</option>
                                                            <option value="C">C</option>
                                                            <option value="C++">C++</option>
                                                            <option value="Scrum">Scrum</option>
                                                            <option value="JavaScript">JavaScript</option>
                                                            <option value="C#">C#</option>
                                                            <option value="Front-End">Front-End</option>
                                                            <option value="Back-End">Back-End</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" align="right">
                                        <a href="#sectionB" class="btn btn-success" role="button">Save</a>
                                        <a href="createOpportunity.php" class="btn btn-default" role="button">Reset</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <form>
</section>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>