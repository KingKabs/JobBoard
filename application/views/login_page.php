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
        <header id="header" style="background: #E2E2E2;">
            <div class="container-fluid">

                <div id="logo" class="pull-left">
                    <h1><a href="#intro" class="scrollto">Applications Portal</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">


                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->

        <main id="main" style="margin-top: 90px;">
            <section id="contact" class="section-bg wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4" style="background: #FFF">
                            <h2>Admin Sign In</h2>
                            <p>Please enter your credentials to sign in</p>
                            <form class="form-horizontal" method="POST" action="<?= site_url('login/login/'); ?>">                       
                                <div class="form-group">                            
                                    <div class="col-sm-12">
                                        <input type="text" name="username" class="form-control" id="username" placeholder="username" required="">
                                    </div>
                                </div>
                                <div class="form-group">                            
                                    <div class="col-sm-12">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="password" required="">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-block btn-success">SIGN IN <i class="fa fa-sign-in"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </section>

        </main>

        <!--==========================
          Footer
        ============================-->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-lg-left text-center">
                        <div class="copyright">
                            &copy; Copyright <strong>Job Applications Portal</strong>. All Rights Reserved
                        </div>
                        <div class="credits">
                            Designed & Developed by <a href="#" target="_blank">KingKabs</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                            <a href="#intro" class="scrollto">Home</a>
                            <a href="#about" class="scrollto">About</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Use</a>
                        </nav>
                    </div>
                </div>
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="<?php echo base_url() ?>assets/lib/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/jquery/jquery-migrate.min.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/easing/easing.min.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/wow/wow.min.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/superfish/hoverIntent.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/superfish/superfish.min.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/magnific-popup/magnific-popup.min.js"></script>

        <!-- Contact Form JavaScript File -->
        <script src="<?php echo base_url() ?>assets/contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
        <script src="<?php echo base_url() ?>assets/js/main.js"></script>

    </body>
</html>