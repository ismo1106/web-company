<section class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Result of : <em>"<?php echo $_keyWord;?>"</em></h2>
            </div>
        </div>
    </div>
</section>

<section class="search">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-12">
                <div class="search-posts">
                    <?php foreach ($_searchOne as $row): ?>
                    <div class="search-post">
                        <?php
                        $idPost     = $row->id_post;
                        $encID      = $this->encrypt->encode($idPost);
                        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                        ?>
                        <h3>
                            <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">
                                <?php echo str_ireplace(strtoupper($_keyWord), '<span style="background-color: #E0DD00;">'.$_keyWord.'</span>', $row->title_post);?>
                            </a>
                        </h3>
                        <div>
                            <p><?php echo str_ireplace(strtoupper($_keyWord), '<span style="background-color: #E0DD00;">'.$_keyWord.'</span>', substr(strip_tags($row->post),0,500)).'... ';?>
                            <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">see more &Gt;</a></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="search-posts">
                    <?php foreach ($_searchTwo as $row): ?>
                    <div class="search-post">
                        <?php
                        $idPost     = $row->id_post;
                        $encID      = $this->encrypt->encode($idPost);
                        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                        ?>
                        <h3>
                            <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">
                                <?php echo str_ireplace(strtoupper($_keyWord), '<span style="background-color: #E0DD00;">'.$_keyWord.'</span>', $row->title_post);?>
                            </a>
                        </h3>
                        <div>
                            <p><?php echo str_ireplace(strtoupper($_keyWord), '<span style="background-color: #E0DD00;">'.$_keyWord.'</span>', substr(strip_tags($row->post), strpos(strip_tags($row->post), $_keyWord),500)).'... ';?>
                            <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">see more &Gt;</a></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="search-posts">
                    <?php foreach ($_searchThree as $row): ?>
                    <div class="search-post">
                        <?php
                        $idPost     = $row->id_post;
                        $encID      = $this->encrypt->encode($idPost);
                        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                        ?>
                        <h3>
                            <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">
                                <?php echo str_ireplace(strtoupper($_keyWord), '<span style="background-color: #E0DD00;">'.$_keyWord.'</span>', $row->title_post);?>
                            </a>
                        </h3>
                        <div>
                            <p><?php echo str_ireplace(strtoupper($_keyWord), '<span style="background-color: #E0DD00;">'.$_keyWord.'</span>', substr(strip_tags($row->post), strpos(strip_tags($row->post), $_keyWord),500)).'... ';?>
                            <a href="<?php echo site_url();?>front/blogNews/of/<?php echo $encryptID;?>">see more &Gt;</a></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="search-posts">
                    <div class="search-post">
                        <?php if ($_isNull == TRUE){ echo 'Not found once...';}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>