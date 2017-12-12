
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>M-Ploy</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

<body style="background-image: url('<?php echo base_url(); ?>assets/images/company.png')">
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>home" style="color: forestgreen; font-size: 200%; font-weight: bolder">M-Ploy</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
</header>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-center" style="background-color: black; color: white">
                    <h2>M-Ploy</h2>
                    <p>Web Portal to meet Job and Internship applicants with IT Industry</p>
                    <form><a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>Welcome/Company_main" role="button" data-toggle="tooltip" data-placement="left" title="Click here to get started as an Employer">For Companies</a>  <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>Welcome/Applicant_main" role="button" data-toggle="tooltip" data-placement="right" title="Click here to get started as an Employee">For Job Seekers</a></form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row" style="margin: 50px">
        <h2 class="header text-center" style="color: saddlebrown; font-weight: bold">How M-Ploy helps you to find your new Job?</h2>
        <img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/group.jpg" alt="Generic placeholder image"><br/>
        <p class="lead" style="font-size: 130%">Want to find an Internship or a new Job in IT Industry?
            <br/><br/>
            M-ploy is a web portal for you to find recent, well paid and reliable job opportunities which give values to the qualifications and skills that your have. This website will evaluate your profiles and matches with the opportunities posted by the companies.
            <br/><br/>
            As a Internship Applicant, you can find any IT related internship oppertunity. M-Ploy is the best place for the interns to find their internship and lead them to access the best IT companies.
            You would be able to find your passionate job according to your qualifications.
            <br/><br/>
            The IT job applicant can achieve their dream job with the leading IT companies in Sri Lanka. You will recieve the best job which suite you with your experience and qualification. M-Ploy will help your dream job to be a reality</p>
    </div>
    <div class="row" style="margin: 50px">
        <h2 class="header text-center" style="color: saddlebrown; font-weight: bold">How M-Ploy helps you to find best employees?</h2>
        <img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/images/selection.png" alt="Generic placeholder image"><br/>
        <p class="lead" style="font-size: 130%">Want to recruit the best professional for higher productivity?
            <br/><br/>
            Since IT industry is a service related industry, high competition to recruit the best energetic employees in the industry. M-Ploy is the best place to identify the reliable and talented individuals for the betterment of the company.

            <br/><br/>
            M-Ploy saves your time and cost to recruit employees. You will be able to identify the employees who eager to have a job.

            Your Selection Cycle time will be lower and you able to compare the employees and to select the best one for yoour company.
            <br/><br/>

            It's the time to select the best in a newer way with M-Ploy.</p>

    </div>
</section>

