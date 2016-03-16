<?php foreach ($_getSetting as $row): ?>
<section class="footer-widgets">
    <div class="container">
        <div class="row">

            <div class="col-sm-3 foot-link">
<!--                <a href="#">
                    <img src="<?php //echo base_url();?>assets/images/foot-logo.png" width="100" />
                </a>-->
                <h5>Useful Links</h5>
                <?php foreach ($_getFootLeft as $rowLeft): ?>
                <a href="<?php echo $rowLeft->link_page;?>"><?php echo $rowLeft->label_page;?></a>
                <?php endforeach; ?>
            </div>
            <div class="col-sm-3 foot-link">
                <h5>Others</h5>
                <?php foreach ($_getFootCenter as $rowCenter): ?>
                <a href="<?php echo $rowCenter->link_page;?>"><?php echo $rowCenter->label_page;?></a>
                <?php endforeach; ?>
            </div>
            
            <div class="col-sm-3">
                <h5>Address</h5>
                <p>
                    <?php echo $row->address;?>
                </p>
            </div>

            <div class="col-sm-3">
                <h5>Contact</h5>
                <p>
                    Phone: <a class="link-contact" href="tel:<?php echo str_replace('_', '', $row->phone1);?>"><?php echo str_replace('_', '', $row->phone1);?></a> <?php if($row->phone2 != NULL){echo '| '.substr(str_replace('_', '', $row->phone2), 8);}?> <br />
                    <?php if($row->fax != NULL){?>Fax: <?php echo str_replace('_', '', $row->fax);?> <br /><?php }?>
                    <a class="link-contact" href="mailto:<?php echo $row->email;?>"><?php echo $row->email;?></a>
                </p>
            </div>

        </div>
    </div>
</section>

<footer class="site-footer">
    <div class="container">	
        <div class="row">			
            <div class="col-sm-6" style="color: #fff;">
                &copy; <?php echo $row->display_company;?> - All Rights Reserved. 
            </div>
            <?php
                if(strpos($row->twitter, 'http://twitter.com/') !== false){ 
                    $twitter    = substr($row->twitter, 19);
                }elseif (strpos($row->twitter, 'https://twitter.com/') !== false) {
                    $twitter    = substr($row->twitter, 20);
                }else{
                    $twitter    = $row->twitter;
                }
                
                if(strpos($row->facebook, 'http://facebook.com/') !== false){ 
                    $facebook   = substr($row->facebook, 20);
                }elseif (strpos($row->facebook, 'https://facebook.com/') !== false) {
                    $facebook   = substr($row->facebook, 21);
                }else{
                    $facebook   = $row->facebook;
                }
                
                if(strpos($row->instagram, 'http://instagram.com/') !== false){ 
                    $instagram  = substr($row->instagram, 21);
                }elseif (strpos($row->instagram, 'https://instagram.com/') !== false) {
                    $instagram  = substr($row->instagram, 22);
                }else{
                    $instagram  = $row->instagram;
                }
            ?>
            <div class="col-sm-6">				
                <ul class="social-networks text-right">
                    <li>
                        <a href="http://instagram.com/<?php echo $instagram;?>" target="_blank">
                            <i class="entypo-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="http://twitter.com/<?php echo $twitter;?>" target="_blank">
                            <i class="entypo-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="http://facebook.com/<?php echo $facebook;?>" target="_blank">
                            <i class="entypo-facebook"></i>
                        </a>
                    </li>
                </ul>				
            </div>			
        </div>		
    </div>	
</footer>
<?php endforeach;