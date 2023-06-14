<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Job Applications Portal</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="<?php echo base_url() ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="<?php echo base_url() ?>assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/engine1/style.css" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->


    </head>

    <body>

        <!--==========================
          Header
        ============================-->
        <header id="header" style="background: #009926">
            <div class="container">

                <div id="logo" class="pull-left">
                    <h1><a href="#intro" class="scrollto">ADMIN DASHBOARD</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!--a href="#intro"><img src="<?php echo base_url() ?>assets/img/POEALogo.jpg" alt="" title="" width="20%" height="20%"></a-->
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="<?php echo site_url('admin/admin_dashboard'); ?>"><i class="fa fa-briefcase"></i> Job Listings </a></li>
                        <li><a href="<?php echo site_url('admin/job_applications'); ?>"><i class="fa fa-briefcase"></i> Applications </a></li>
                        <li><a href="#"><i class="fa fa-users"></i> Users </a></li>
                        <li><a href="<?php echo site_url('login/logoutUser'); ?>">Sign Out <i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->