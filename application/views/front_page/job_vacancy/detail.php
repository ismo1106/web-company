<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr class="no-top-margin" />
        </div>
    </div>	
</div>

<?php foreach ($_getBlogPost as $row): ?>
<section class="blog blog-single">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 pull-right">
                <div class="blog-post-single">
                    <div class="post-details">
                        <h3>
                            <a href=""><?php echo $row->title_jobs;?></a>
                        </h3>
                        <div class="post-meta">
                            <div class="meta-info">
                                <i class="entypo-calendar"></i> <?php echo date('F d, Y', strtotime($row->created_date));?>
                            </div>
                            <div class="meta-info" style="color: #C00000;">
                                <i class="entypo-clock"></i>Closing on, <?php echo date('F d, Y', strtotime($row->closed_date));?> 
                            </div>
                        </div>
                    </div>

                    <div class="post-content">
                        <?php echo $row->description;?>
                    </div>
                    <br />
                    
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
<?php endforeach; ?>