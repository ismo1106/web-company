<header class="logo-env">
    <div class="logo">
        <a href="<?php echo site_url('back/dashboard'); ?>">
            <img src="<?php echo base_url();?>assets/images/Sambu-LogoNewWhite.png" width="130px" alt="" />
        </a>
    </div>
    <div class="sidebar-collapse">
        <a href="#" class="sidebar-collapse-icon with-animation">
            <i class="entypo-menu"></i>
        </a>
    </div>
    <div class="sidebar-mobile-menu visible-xs">
        <a href="#" class="with-animation">
            <i class="entypo-menu"></i>
        </a>
    </div>
</header>

<div class="sidebar-user-info">
    <div class="sui-normal">
        <a href="#" class="user-link">
            <img src="<?php echo base_url();?>assets/back/images/thumb-1.png" alt="" class="img-circle" />
            <span>Welcome,</span>
            <strong><?php echo $this->session->userdata('nickname');?></strong>
        </a>
    </div>
    <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->				
        <a href="#">
            <i class="entypo-user"></i>
            Profile
        </a>
        <a href="#">
            <i class="entypo-cog"></i>
            Setting
        </a>
        <a href="<?php echo site_url('back/login/logout'); ?>">
            <i class="entypo-lock"></i>
            Log Off
        </a>
        <span class="close-sui-popup">&times;</span><!-- this is mandatory -->			
    </div>
</div>