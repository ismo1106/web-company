<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Sambu Page Admin Panel" />
        <meta name="author" content="Ismo Broto" />

        <title>Dashboard</title>


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/font-icons/entypo/css/entypo.css">
        <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/neon-core.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/neon-theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/neon-forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/custom.css">
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/skins/black.css">-->

        <script src="<?php echo base_url(); ?>assets/back/js/jquery-1.11.0.min.js"></script>

    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/back/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <script language="javascript">
//        document.onmousedown    = disableclick;
//        status="Right Click Disabled";
//        function disableclick(event){
//          if(event.button===2)
//           {
//             alert(status);
//             return false;    
//           }
//        }
        //oncontextmenu="return false;"
    </script>
    <body class="page-body page-fade" >

        <div class="page-container">
            <div class="sidebar-menu">	
                <?php echo $_header; ?>
                <?php echo $_sidebar; ?>		
            </div>	


            <!--            <div class="row">
                            <div class="col-md-6 col-sm-8 clearfix">
                            </div>
                            <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                                <ul class="list-inline links-list pull-right">
                                    <li>
                                        <a href="#" data-toggle="chat" data-animate="1" data-collapse-sidebar="1">
                                            <i class="entypo-chat"></i>
                                            Chat
                                            <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
                                        </a>
                                    </li>
                                    <li class="sep"></li>
                                    <li>
                                        <a href="<?php //echo site_url('back/login/logout');  ?>">
                                            Log Out <i class="entypo-logout right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
            <!--<hr />-->
            <?php echo $_content; ?>
            
            <?php echo $_footer; ?>
        </div>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/datatables/responsive/css/datatables.responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/select2/select2.css">
        
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/icheck/skins/polaris/polaris.css">
        
        
	<script src="<?php echo base_url(); ?>assets/back/js/icheck/icheck.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/back/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/datatables/TableTools.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/datatables/jquery.dataTables.columnFilter.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/datatables/lodash.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/datatables/responsive/js/datatables.responsive.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/select2/select2.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/back/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/additional-methods.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/bootbox.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/font-icons/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/rickshaw/rickshaw.min.css">

        <!-- Bottom Scripts -->
        <script src="<?php echo base_url(); ?>assets/back/js/gsap/main-gsap.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/joinable.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/resizeable.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/neon-api.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/rickshaw/vendor/d3.v3.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/rickshaw/rickshaw.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/toastr.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/neon-chat.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/neon-custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/neon-demo.js"></script>

    </body>
</html>