<section class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h1>Consumer Products</h1>
                <ol class="breadcrumb bc-3">
                    <li>
                        <a href="<?php echo site_url();?>"><i class="entypo-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url();?>">Front</a>
                    </li>
                    <li class="active">
                        <strong>Product</strong>
                    </li>
                </ol>
            </div>

            <div class="col-sm-5">
                <div class="btn-group alt-select-field" id="category-filter">
                    <button type="button" class="btn btn-label" data-toggle="dropdown">All Product</button>
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <?php foreach ($_selectCategory as $rowCat): ?>
                        <li>
                            <a href="#" data-filter="<?php echo strtolower($rowCat->name_category_product);?>">
                                <?php echo ucwords(strtolower($rowCat->name_category_product));?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="portfolio-container">
    <div class="container">
        <div class="row" id="portfolio-items">
            <?php foreach ($_selectProduct as $row): 
                $idProduct  = $row->id_product;
                $encID      = $this->encrypt->encode($idProduct);
                $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID); ?>
            
            <div class="item col-sm-4 col-xs-6 filter-<?php echo strtolower($row->name_category_product);?>">
                <div class="portfolio-item">
                    <a href="<?php echo site_url();?>front/consumerProduct/detail/<?php echo $encryptID;?>" class="image">
                        <img src="<?php echo base_url();?>assets/upload/thumbnail-product/<?php echo $row->id_product;?>.png" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="<?php echo site_url();?>front/consumerProduct/detail/<?php echo $encryptID;?>" class="name">
                            <?php echo $row->name_product;?>
                        </a>
                    </h4>
                    <div class="categories">
                        <a href="#"><?php echo ucwords(strtolower($row->name_category_product));?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        var $portfolio_items = $("#portfolio-items"),
                $category_filter = $("#category-filter");

        $portfolio_items.isotope({
            itemSelector: '.item',
            columnWidth: 1 / 4
        });

        $category_filter.on('change', function(ev, o)
        {
            var filter = o.el.data('filter');

            $portfolio_items.isotope({
                filter: o.isDefault ? '.item' : '.filter-' + filter
            });
        });

        $(window).on('neon.resize', function()
        {
            $portfolio_items.isotope('reLayout');
        });

        $portfolio_items.isotope('reLayout');
    });
</script>