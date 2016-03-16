<section class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php echo $_title; ?></h1>
                <ol class="breadcrumb bc-3">
                    <li>
                        <a href="#"><i class="entypo-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="#">Front</a>
                    </li>
                    <li class="active">
                        <strong>Profile</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>


<section class="content-section">
    <div class="container">
        <div class="row">
            <?php if($_imageDiv == NULL):?>
            <div class="col-sm-12">
                <h3><?php echo $_subTitle; ?></h3>
                <br/>
                <?php echo $_content;?>
            </div>
            <?php else:?>
            <div class="col-sm-7">
                <h3><?php echo $_subTitle; ?></h3>
                <br/>
                <?php echo $_content;?>
            </div>
            <div class="col-sm-5">
                <a href="#">
                    <img src="<?php echo base_url(); ?>assets/images/about-img-1.png" class="img-rounded" />
                </a>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-4">
                <div class="staff-member">
                    <h4>
                        <a href="<?php echo site_url('front/profile');?>">Philosophy</a>
                        <small>Profile Sambu</small>
                    </h4>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="staff-member">
                    <h4>
                        <a href="<?php echo site_url('front/profile/index/1');?>">Our History</a>
                        <small>Profile Sambu</small>
                    </h4>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="staff-member">
                    <h4>
                        <a href="<?php echo site_url('front/profile/index/2');?>">Ethical Trade</a>
                        <small>Profile Sambu</small>
                    </h4>
                </div>
            </div>

        </div>
    </div>
</section>