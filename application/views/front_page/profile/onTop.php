<?php foreach ($_selectContentProfile as $row): ?>
<section class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php echo $row->title_profile; ?></h1>
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

<section class="portfolio-item-details">
    <div class="container">
        <div class="row item-description">
            <div class="col-sm-offset-3 col-sm-6">
                <div class="portfolio-item">
                    <center class="image">
                        <img src="<?php echo base_url();?>assets/img/<?php echo $row->kode_profile;?>.png" class="img-rounded" />
                    </center>
                </div>
            </div>
            <div class="col-sm-12">
                <?php echo $row->post_profile;?>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>

<section class="content-section">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-4">
                <div class="staff-member">
                    <a class="image" href="<?php echo site_url('front/profile/of/psg');?>">
                        <img src="<?php echo base_url(); ?>assets/images/staff-member.png" class="img-circle" />
                    </a>
                    <h4>
                        <a href="<?php echo site_url('front/profile/of/psg');?>">Pulau Sambu - Guntung</a>
                        <small>Guntung</small>
                    </h4>
                    <ul class="social-networks">
                        <li>
                            <a href="#">
                                <i class="entypo-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="staff-member">
                    <a class="image" href="<?php echo site_url('front/profile/of/pske');?>">
                        <img src="<?php echo base_url(); ?>assets/images/staff-member.png" class="img-circle" />
                    </a>
                    <h4>
                        <a href="<?php echo site_url('front/profile/of/pske');?>">Pulau Sambu - Kuala Enok</a>
                        <small>Kuala Enok</small>
                    </h4>
                    <ul class="social-networks">
                        <li>
                            <a href="#">
                                <i class="entypo-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="staff-member">
                    <a class="image" href="<?php echo site_url('front/profile/of/rsup');?>">
                        <img src="<?php echo base_url(); ?>assets/images/staff-member.png" class="img-circle" />
                    </a>
                    <h4>
                        <a href="<?php echo site_url('front/profile/of/rsup');?>">Riau Sakti United Plantation</a>
                        <small>Pulau Burung</small>
                    </h4>
                    <ul class="social-networks">
                        <li>
                            <a href="#">
                                <i class="entypo-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>