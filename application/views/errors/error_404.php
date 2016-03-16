<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 

<html class="no-js"> <!--<![endif]-->
    <head>

        <title>Page not found</title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        
        <!-- stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/error/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/error/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/error/css/style.css">


    </head>

    <body>
        <div id="error-page">
            <!-- fix the height of the whole content -->
            <div id="height-fix" class="text-center">

                <!--   header section begin   -->
                <section class="header bg-light-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="row">

                                    <div class="logo">
                                        <img class="img-responsive center-block" src="<?php echo base_url();?>assets/error/img/PS-logo.png">
                                    </div> <!-- /.logo -->

                                    <div class="page-title">
                                        <p>oops! page not found</p>
                                    </div> <!-- /.error-description -->
                                    
                                </div>
                            </div> <!-- /.col-md-6 col-md-offset-3 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </section> <!--   header section end   -->
                

                <!--   main-content section begin   -->
                <section class="main-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <h1 class="error-nmbr">404</h1>  <!-- showing error number -->
                            </div>
                        </div> <!-- .row -->
                    </div> <!-- /.container -->
                </section> <!--   header section end   -->
                

                <!--   footer section begin   -->
                <section class="footer bg-light-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="row">
                                    <div class="error-page-btn">
                                        <div class="col-md-6">
                                            <a href="javascript: history.back();" class="btn btn-black">
                                                go back
                                            </a> <!-- /go-back button -->
                                        </div> <!-- /.col-md-6 -->
                                    </div><!-- /.error-page-btn -->
                                </div>
                            </div> <!-- .col-md-6 col-md-offset-3 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </section> <!--   footer section end   -->


            </div> <!-- /#height fix -->
        </div> <!-- /#error-page  -->

        <script type="text/javascript" src="<?php echo base_url();?>assets/error/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/error/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/error/js/wow.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/error/js/script.js"></script>


        <!-- wow initialization -->
        <script>
            new WOW().init();
        </script>
    
    </body>
</html>