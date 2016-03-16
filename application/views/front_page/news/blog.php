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
            <div class="col-sm-8">
                <div class="blog-post-single">
                    <div class="post-details">
                        <h3>
                            <a href=""><?php echo $row->title_post;?></a>
                        </h3>
                        <div class="post-meta">
                            <div class="meta-info">
                                <i class="entypo-calendar"></i> <?php echo date('F d, Y', strtotime($row->created_date));?>
                            </div>
                            <div class="meta-info">
                                <i class="entypo-comment"></i>
                                <?php echo $row->count_comment;?> comments
                            </div>
                        </div>
                    </div>

                    <div class="post-content">
                        <?php echo $row->post;?>
                    </div>
                    <br />
                    
                    <h3>
                        Comments
                        <small class="text-muted">(<?php echo $row->count_comment;?>)</small>
                    </h3>
                    <hr />
                    <ul class="comments-list">
                        <?php foreach($_getComment as $rowComment): ?>
                        <li>
                            <div class="comment">
                                <div class="comment-thumb">
                                    <div class="text-in-circle"><?php echo substr($rowComment->comment_by,0,1);?></div>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-author">
                                        <a href="#"><?php echo $rowComment->comment_by;?></a>, <br/>
                                        <span class="time time-comment"><small><?php echo $_Controller->time_elapsed_string($rowComment->commnet_date);?></small></span>
                                    </div>
                                    <div class="comment-text">
                                        <p>
                                            <?php echo preg_replace("/<style\\b[^>]*>(.*?)<\\/style>/s", "***", $rowComment->comment_value);?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <h3>
                        Leave a comment
                    </h3>
                    <hr />

                    <form class="comment-form" method="post" action="<?php echo site_url('back/comment/send');?>" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name:" required="" autocomplete="off"/>
                            <input type="hidden" class="form-control" name="postid" placeholder="Name:" value="<?php echo $row->id_post;?>" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="E-mail:" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <textarea id="inputMessage" required="" class="form-control" name="message" placeholder="Message:" rows="6" maxlength="200"></textarea>
                        </div>
                        <div class="pull-right small" id="textarea_feedback"></div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Comment</button>
                        </div>
                    </form>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var text_max = 200;
                            $('#textarea_feedback').html(text_max + '/200 characters');

                            $('#inputMessage').keyup(function() {
                                var text_length = $('#inputMessage').val().length;
                                var text_remaining = text_max - text_length;

                                $('#textarea_feedback').html(text_remaining + '/200 characters');
                            });
                        });
                    </script>
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
                                <a href="<?php echo site_url('front/blogNews/index/');?>">
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
<?php endforeach; ?>