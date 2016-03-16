<section class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Blog</h1>
                <ol class="breadcrumb bc-3">
                    <li>
                        <a href="#"><i class="entypo-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="#">Front</a>
                    </li>
                    <li class="active">
                        <strong>News</strong>
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
            
            <div class="col-sm-8">
                <div class="blog-posts">
                    <?php foreach ($_selectBlogPublish as $row): ?>
                    <div class="blog-post">
                        <?php
                        $idPost     = $row->id_post;
                        $encID      = $this->encrypt->encode($idPost);
                        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                        ?>
                        <div class="post-thumb">
                            <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">
                                <?php if($row->thumbnail == 1): ?>
                                <img src="<?php echo base_url();?>assets/upload/thumbnail-post/<?php echo $idPost;?>.png" class="img-rounded" />
                                <?php else: ?>
                                <img src="<?php echo base_url();?>assets/images/blog-thumb.png" class="img-rounded" />
                                <?php endif; ?>
                                <span class="hover-zoom"></span>
                            </a>
                        </div>
                        <div class="post-details">
                            <h3>
                                <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">
                                    <?php echo $row->title_post;?>
                                </a>
                            </h3>
                            <div class="post-meta">
                                <div class="meta-info">
                                    <i class="entypo-calendar"></i> <?php echo date('F d, Y', strtotime($row->created_date));?></div>
                                <div class="meta-info">
                                    <i class="entypo-comment"></i>
                                    <?php echo $row->count_comment;?> comments
                                </div>
                            </div>
                            <div>
                                <?php echo preg_replace("/<img[^>]+\>/i", "(image) ", substr($row->post,0,300)."... ");?>
                                <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">see more >></a>
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
                <div class="sidebar">
                    <h3>
                        <i class="entypo-list"></i>
                        Categories
                    </h3>
                    <div class="sidebar-content">
                        <ul>
                            <li>
                                <a href="<?php echo site_url('front/blogNews/index/all');?>">
                                    All
                                </a>
                            </li>
                            <?php foreach ($_selectCategory as $row) :?>
                            <li>
                                <a href="<?php echo site_url('front/blogNews/index/').'/'.$row->id_category;?>">
                                    <?php echo $row->name_category.'<span>('.$row->count_post.')</span>';?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                
                <div class="sidebar">
                    <h3>
                        <i class="entypo-chat"></i>
                        Recent Comments
                    </h3>
                    <div class="sidebar-content">
                        <ul class="discussion-list">
                            <?php foreach ($_selectComment as $rowComment): ?>
                                <li>
                                    <a href="#" class="thumb">
                                        <div class="text-in-circle-small"><?php echo substr($rowComment->comment_by,0,1);?></div>
                                    </a>
                                    <div class="details">
                                        <a href="#"><?php echo $rowComment->comment_by;?></a>
                                        <p><?php echo preg_replace("/<style\\b[^>]*>(.*?)<\\/style>/s", "***", $rowComment->comment_value);?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>