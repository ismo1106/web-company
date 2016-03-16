<section class="portfolio-item-details">
    <div class="container">
        <div class="row item-title">
            <div class="col-sm-12">
                <h1>
                    <a href="#"><?php echo $_title;?></a>
                </h1>
                <div class="categories">
                    <a href="#"><?php echo $_category;?></a>
                </div>
            </div>
        </div>

        <div class="row item-description">
            <?php if($_image != NULL): ?>
            <div class="col-sm-offset-3 col-sm-6">
                <div class="portfolio-item">
                    <center class="image">
                        <img src="<?php echo base_url();?>assets/img/<?php echo $_image;?>.jpg" class="img-rounded" />
                    </center>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-sm-8">
                <?php echo $_content;?>
            </div>

            <div class="col-sm-4">
                <dl>
                    <dt>Client:</dt>
                    <dd><?php echo $_client;?></dd>
                    <dt>Category:</dt>
                    <dd><?php echo $_category;?></dd>
                </dl>
            </div>
        </div>
    </div>

</section>
