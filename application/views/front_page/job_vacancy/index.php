<section class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Jobs Vacancy</h1>
                <ol class="breadcrumb bc-3">
                    <li>
                        <a href=""><i class="entypo-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="">Frontend</a>
                    </li>
                    <li class="active">
                        <strong>Career</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-3">
                <h2 class="text-muted text-right"><?php echo $_getCountAllPost;?> Posts</h2>
            </div>
        </div>
    </div>
</section>


<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 pull-right">
                <div class="blog-posts">
                    
                    <?php foreach ($_selectBlogPublish as $row): ?>
                    <div class="blog-post">
                        <?php
                        $idPost     = $row->id_vacancy;
                        $encID      = $this->encrypt->encode($idPost);
                        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                        ?>
                        <div class="post-thumb">
                            <a href="<?php echo site_url();?>front/JobVacancy/detail/<?php echo $encryptID;?>">
                                <?php if($row->thumbnail == 1): ?>
                                <img src="<?php echo base_url();?>assets/upload/thumbnail-vacancy/<?php echo $idPost;?>.png" class="img-rounded" />
                                <?php else: ?>
                                <img src="<?php echo base_url();?>assets/images/blog-thumb.png" class="img-rounded" />
                                <?php endif; ?>
                                <span class="hover-zoom"></span>
                            </a>
                        </div>
                        <div class="post-details">
                            <h3>
                                <a href="<?php echo site_url();?>front/JobVacancy/detail/<?php echo $encryptID;?>">
                                    <?php echo $row->title_jobs;?>
                                </a>
                            </h3>
                            <div class="post-meta">
                                <div class="meta-info">
                                    <i class="entypo-calendar"></i> <?php echo date('F d, Y', strtotime($row->created_date));?>
                                </div>
                            </div>
                            <div>
                                <?php echo preg_replace("/<img[^>]+\>/i", "(image) ", substr($row->description,0,300)."... ");?>
                                <a href="<?php echo site_url();?>front/JobVacancy/detail/<?php echo $encryptID;?>">see more >></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    
                    <div class="text-center">
                        <?php echo $_pagination ?>
                    </div>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="second-sidebar">
                    <h3>
                        <i class="entypo-list"></i>
                        Categories
                    </h3>

                    <div class="sidebar-content">
                        <ul>
                            <li>
                                <a href="<?php echo site_url('front/JobVacancy/index/all');?>">
                                    All
                                </a>
                            </li>
                            <?php foreach ($_selectCategory as $row) :?>
                            <li>
                                <a href="<?php echo site_url('front/JobVacancy/index/').'/'.$row->id_category;?>">
                                    <?php echo $row->name_category.'<span>('.$row->count_vacancy.')</span>';?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>			
            </div>
        </div>
    </div>
</section>