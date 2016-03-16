<section class="portfolio-item-details">
    <div class="container">
        <?php foreach ($_getProduct as $row): 
            if($row->type_product == 1):
                $client = 'Consumer';
                $url    = site_url('front/consumerProduct');
            else:
                $client = 'Industrial';
                $url    = site_url('front/industrialProduct');
            endif;?>
        <div class="row item-title">
            <div class="col-sm-12">
                <h1>
                    <a href="#"><?php echo $row->name_product;?></a>
                </h1>
                <div class="categories">
                    <a href="<?php echo $url;?>"><?php echo $row->name_category_product;?></a>
                </div>
            </div>
        </div>

        <div class="row item-description">
            <?php if($row->banner_product != 0): ?>
            <div class="col-sm-offset-3 col-sm-6">
                <div class="portfolio-item">
                    <center class="image">
                        <img src="<?php echo base_url();?>assets/upload/header-product/<?php echo $row->id_product;?>.png" class="img-rounded" style="width: auto;height: auto;" />
                    </center>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-sm-8">
                <?php echo $row->descript_product;?>
            </div>

            <div class="col-sm-4">
                <dl>
                    <dt>Client:</dt>
                    <dd><?php echo $client;?></dd>
                    <dt>Category:</dt>
                    <dd><?php echo $row->name_category_product;?></dd>
                </dl>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
