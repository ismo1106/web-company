
<?php
    if($_isMobile == 1){
        $display    = 'none';
    }else{
        $display    = 'table-cell';
    }
?>
<?php if($_getWidgetSlider->active == 1): ?>
<section class="slider-container responsive" style="background-image: url(<?php echo base_url();?>assets/images/slide-img-1-bg-blue.png);">	
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slides">
                    <?php foreach($_selectWidgetSlider as $row): ?>
                    <div class="slide">
                        <?php if($row->thumb_potition): ?>
                        <div class="slide-content">
                            <?php echo $row->description;?>
                        </div>
                        <div class="slide-image" style="display: <?php echo $display;?>;" >
                            <a href="#">
                                <img src="<?php echo base_url();?>assets/upload/img-slider/<?php echo $row->code_widget;?>.png" class="img-responsive" />
                            </a>
                        </div>
                        <?php else :?>
                        <div class="slide-image" style="display: <?php echo $display;?>;" >
                            <a href="#">
                                <img src="<?php echo base_url();?>assets/upload/img-slider/<?php echo $row->code_widget;?>.png" class="img-responsive" />
                            </a>
                        </div>
                        <div class="slide-content text-right">
                            <?php echo $row->description;?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>

                    <div class="slides-nextprev-nav">
                        <a href="#" class="prev">
                            <i class="entypo-left-open-mini"></i>
                        </a>
                        <a href="#" class="next">
                            <i class="entypo-right-open-mini"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>	
</section>
<?php endif; ?>
<?php if($_getWidgetTagLine->active == 1): ?>
<section class="features-blocks">
    <div class="container">

        <div class="row vspace">
            <?php foreach($_selectWidgetTagLine as $row): ?>
            <div class="col-sm-4">
                <div class="feature-block">
                    <h3>
                        <i class="<?php echo $row->icon_tag_line;?>"></i>
                        <?php echo $row->title_widget;?>
                    </h3>
                    <p>
                        <?php echo $row->description;?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr />
            </div>
        </div>

    </div>
</section>
<?php endif; ?>
<section class="portfolio-widget">
    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                <div class="portfolio-info">
                    <h3>
                        <a href="#">What's news</a>
                    </h3>
                    <p>Get the latest news from us ...</p>
                </div>
            </div>
            
            <?php foreach ($_selectLastPost as $row):?>
            <?php
            $idPost     = $row->id_post;
            $encID      = $this->encrypt->encode($idPost);
            $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
            ?>
            <div class="col-sm-3">
                <div class="portfolio-item">
                    <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>" class="image">
                        <?php if($row->thumbnail == 1): ?>
                        <img src="<?php echo base_url();?>assets/upload/thumbnail-post/<?php echo $idPost;?>.png" class="img-rounded" />
                        <?php else: ?>
                        <img src="<?php echo base_url();?>assets/images/portfolio-thumb.png" class="img-rounded" />
                        <?php endif; ?>
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>" class="name"><?php echo $row->title_post;?></a>
                    </h4>
                    <div class="categories">
                        <a href="<?php echo site_url();?>front/blogNews/index/<?php echo $row->id_category;?>"><?php echo $row->name_category;?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<?php if($_getWidgetQuotes->active == 1): ?>
<section class="testimonials-container">
    <div class="container">
        <div class="col-md-12">
            <div class="testimonials carousel slide" data-interval="8000">
                <div class="carousel-inner">

                    <?php 
                    $start = 0;
                    foreach($_selectWidgetQuotes as $row): ?>
                    <div class="item <?php if(++$start == 1){echo "active";}?>">
                        <blockquote>
                            <?php echo $row->description;?>
                            <small>
                                <?php echo $row->quote_by;?>
                            </small>
                        </blockquote>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($_getWidgetProTile->active == 1): ?>
<section class="clients-logos-container">
    <div class="container">
        <div class="row">
            <div class="client-logos carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner">
                    <div class="item active">
                        <?php foreach ($_selectWidgetProTile as $row): ?>
                            <a href="#">
                                <img src="<?php echo base_url();?>assets/upload/img-slider/<?php echo $row->code_widget;?>.png" class="img-rounded" />
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; 