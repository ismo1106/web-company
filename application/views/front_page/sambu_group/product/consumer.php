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
                    <button type="button" class="btn btn-label" data-toggle="dropdown">Category</button>
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#" data-filter="food">Food</a>
                        </li>
                        <li>
                            <a href="#" data-filter="beverage">Beverage</a>
                        </li>
                        <li>
                            <a href="#" data-filter="organic">Organic</a>
                        </li>
                        <li>
                            <a href="#" data-filter="personal">Personal Care</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="portfolio-container">
    <div class="container">
        <div class="row" id="portfolio-items">
            <div class="item col-sm-4 col-xs-6 filter-food">
                <div class="portfolio-item">
                    <a href="<?php echo site_url('front/product/consumer/1');?>" class="image">
                        <img src="<?php echo base_url();?>assets/img/cp-kara.jpg" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="#" class="like">
                            <i class="entypo-heart"></i>
                        </a>
                        <a href="<?php echo site_url('front/product/consumer/1');?>" class="name">Kara - Coconut Cream</a>
                    </h4>
                    <div class="categories">
                        <a href="#">Food</a>
                    </div>
                </div>
            </div>

            <div class="item col-sm-4 col-xs-6 filter-food">
                <div class="portfolio-item">
                    <a href="<?php echo site_url('front/product/consumer/2');?>" class="image">
                        <img src="<?php echo base_url();?>assets/img/cp-SinInd.jpg" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="#" class="like liked">
                            <i class="entypo-heart"></i>
                        </a>
                        <a href="<?php echo site_url('front/product/consumer/2');?>" class="name">SinInd - Coconut Cream</a>
                    </h4>
                    <div class="categories">
                        <a href="#">Food</a>
                    </div>
                </div>
            </div>

            <div class="item col-sm-4 col-xs-6 filter-food">
                <div class="portfolio-item">
                    <a href="<?php echo site_url('front/product/consumer/3');?>" class="image">
                        <img src="<?php echo base_url();?>assets/img/cp-fruitland.jpg" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="#" class="like">
                            <i class="entypo-heart"></i>
                        </a>
                        <a href="<?php echo site_url('front/product/consumer/3');?>" class="name">Fruitland</a>
                    </h4>
                    <div class="categories">
                        <a href="#">Food</a>
                    </div>
                </div>
            </div>

            <div class="item col-sm-4 col-xs-6 filter-beverage">
                <div class="portfolio-item">
                    <a href="<?php echo site_url('front/product/consumer/4');?>" class="image">
                        <img src="<?php echo base_url();?>assets/img/cp-smooze.jpg" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="#" class="like liked">
                            <i class="entypo-heart"></i>
                        </a>
                        <a href="<?php echo site_url('front/product/consumer/4');?>" class="name">Smooze - Fruit Ice</a>
                    </h4>
                    <div class="categories">
                        <a href="#">Beverage</a>
                    </div>
                </div>
            </div>

            <div class="item col-sm-4 col-xs-6 filter-beverage">
                <div class="portfolio-item">
                    <a href="<?php echo site_url('front/product/consumer/5');?>" class="image">
                        <img src="<?php echo base_url();?>assets/img/cp-TropiColada.jpg" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="#" class="like">
                            <i class="entypo-heart"></i>
                        </a>
                        <a href="<?php echo site_url('front/product/consumer/5');?>" class="name">TropiColada</a>
                    </h4>
                    <div class="categories">
                        <a href="#">Beverage</a>
                    </div>
                </div>
            </div>

            <div class="item col-sm-4 col-xs-6 filter-organic">
                <div class="portfolio-item">
                    <a href="<?php echo site_url('front/product/consumer/6');?>" class="image">
                        <img src="<?php echo base_url();?>assets/img/cp-CVO.jpg" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="#" class="like">
                            <i class="entypo-heart"></i>
                        </a>
                        <a href="<?php echo site_url('front/product/consumer/6');?>" class="name">True Coconut</a>
                    </h4>
                    <div class="categories">
                        <a href="#">Organic</a>
                    </div>
                </div>
            </div>
            
            <div class="item col-sm-4 col-xs-6 filter-personal">
                <div class="portfolio-item">
                    <a href="<?php echo site_url('front/product/consumer/7');?>" class="image">
                        <img src="<?php echo base_url();?>assets/img/cp-adara.jpg" class="img-rounded" />
                        <span class="hover-zoom"></span>
                    </a>
                    <h4>
                        <a href="#" class="like">
                            <i class="entypo-heart"></i>
                        </a>
                        <a href="<?php echo site_url('front/product/consumer/7');?>" class="name">adara</a>
                    </h4>
                    <div class="categories">
                        <a href="#">Personal</a>
                    </div>
                </div>
            </div>
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