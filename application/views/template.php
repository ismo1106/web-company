<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Ismo Broto" />
    <meta name="description" content="Home Personal Page Sambu Group" />
    <meta name="author" content="" />

    <title><?php echo $this->config->item('app_name');?></title>
    <link rel='shortcut icon' type='image icon' href="<?php echo base_url(); ?>assets/img/rsup-logo2.png"/>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/neon.css">

    <script src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js"></script>

    <!--[if lt IE 9]><script src="<?php echo base_url();?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->		
</head>
<style>
    body {
        background-image: url('<?php echo base_url();?>assets/images/background-z1.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: top right;
        background-size: 35% auto;
    }
    
    @media screen and (max-width: 767px) {
        body{
            background-image: none;
        }
    }        
</style>
<body>

<div class="wrap">	
    <div class="site-header-container container">
	<div class="row">
            <div class="col-md-12">			
                <?php echo $_navbar;?>
            </div>		
	</div>
    </div>
    <?php echo $_content;?>
    
    <?php echo $_footer;?>
</div>
    <!-- Bottom Scripts -->
    <script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/joinable.js"></script>
    <script src="<?php echo base_url();?>assets/js/resizeable.js"></script>
    <script src="<?php echo base_url();?>assets/js/isotope/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/neon-slider.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.cycle2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/neon-custom.js"></script>
</body>
</html>