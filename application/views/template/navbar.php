<header class="site-header">		
    <section class="site-logo">
        <a href="<?php echo site_url();?>">
            <img src="<?php echo base_url();?>assets/images/Sambu-Logo.png" hight="100px" />
        </a>
    </section>

    <nav class="site-nav">
        <ul class="main-menu hidden-xs" id="main-menu">
            <li class="active">
                <a href="<?php echo site_url();?>">
                    <span>Home</span>
                </a>
            </li>
            <li>
            <?php foreach ($_getPage1 as $page1): ?>
                <?php if ($page1->link_page == '#'): ?>
                    <li>
                        <a href="<?php echo $page1->link_page;?>">
                            <span><?php echo $page1->label_page;?></span>
                        </a>
                        <ul>
                            <?php foreach ($_getPage2 as $page2): ?>
                                <?php if ($page2->header_page === $page1->id_page): ?>
                                    <?php if ($page2->link_page == '#'): ?>
                                        <li>
                                            <a href="<?php echo $page2->link_page;?>">
                                                <span><?php echo $page2->label_page;?></span>
                                            </a>
                                            <ul>
                                                <?php foreach ($_getPage3 as $page3): ?>
                                                    <?php if ($page3->header_page === $page2->id_page): ?>
                                                        <li>
                                                            <a href="<?php echo site_url($page3->link_page);?>">
                                                                <span class="small text-danger"><?php echo $page3->label_page;?></span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>   
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="<?php echo site_url($page2->link_page);?>">
                                                <span><?php echo $page2->label_page;?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo $page1->link_page;?>">
                            <span><?php echo $page1->label_page;?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            </li>
<!--            <li>
                <a href="<?php echo site_url('front/profile');?>">
                    <span>Sambu Group</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo site_url('front/profile/of/psg');?>">
                            <span>Pulau Sambu</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo site_url('front/profile/of/psg');?>">
                                    <span class="small text-danger">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('front/accreditation/of/psg');?>">
                                    <span class="small text-danger">Accreditation</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('front/profile/of/rsup');?>">
                            <span>RSUP - Industry</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo site_url('front/profile/of/rsup');?>">
                                    <span class="small text-danger">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('front/accreditation/of/rsup');?>">
                                    <span class="small text-danger">Accreditation</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('front/profile/of/pske');?>">
                            <span>PSKE</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo site_url('front/profile/of/pske');?>">
                                    <span class="small text-danger">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('front/accreditation/of/pske');?>">
                                    <span class="small text-danger">Accreditation</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('front/profile/of/psg');?>">
                            <span>Manufacture Site</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo site_url('front/profile/of/psg');?>">
                                    <span class="small text-danger">Pulau Sambu - Guntung</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('front/profile/of/pske');?>">
                                    <span class="small text-danger">Pulau Sambu - Kuala Enok</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('front/profile/of/rsup');?>">
                                    <span class="small text-danger">RSUP - Industry</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('front/product/index/1');?>">
                            <span>Consumer Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('front/product/index/2');?>">
                            <span>Industrial Products</span>
                        </a>
                    </li>
                </ul>
            </li>-->
            <li>
                <a href="<?php echo site_url('front/profile');?>">
                    <span>Product</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo site_url('front/consumerproduct/index');?>">
                            <span>Consumer Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('front/industrialproduct/index');?>">
                            <span>Industrial Products</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('front/blogNews');?>">
                    <span>What's News</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('front/contact');?>">
                    <span>Contact</span>
                </a>
            </li>
            <li class="search">
                <a href="#" id="btnSearch">
                    <i class="entypo-search"></i>
                </a>
                <form method="GET" class="search-form" action="<?php echo site_url('front/search/of')?>" enctype="application/x-www-form-urlencoded">
                    <input type="text" class="form-control" id="txtKey" name="q" placeholder="Search in Sambu Group..." />
                </form>
            </li>
        </ul>

        <div class="visible-xs">
            <a href="#" class="menu-trigger">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </nav>

</header>