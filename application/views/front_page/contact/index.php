<?php foreach ($_getSetting as $row): 
    
    if($row->longitude_map == NULL || $row->latitude_map == NULL){
        $long   = '-6.175613';
        $late   = '106.828053';
    }else{
        $long   = $row->longitude_map;
        $late   = $row->latitude_map;
    }
    ?>

<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize()
    {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
            center: new google.maps.LatLng(<?php echo $long;?>, <?php echo $late;?> , 18),
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false
        });

        new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $long;?>, <?php echo $late;?>),
            map: map
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<section class="contact-map" id="map"></section>


<section class="contact-container">

    <div class="container">

        <div class="row">

            <div class="col-sm-8 sep">

                <iframe src="https://docs.google.com/forms/d/14iYY3ZhYXO4sB9bz6IRsPFditGIxruFaxdXX6P81n3o/viewform?embedded=true" width="100%" height="950" frameborder="0" marginheight="0" marginwidth="0">Memuat...</iframe>
                <div id="disqus_thread"></div>
                <script>
                /**
                * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');

                s.src = '//coba-lagi.disqus.com/embed.js';

                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
            </div>

            <div class="col-sm-4">

                <div class="info-entry">

                    <h4>Address</h4>

                    <p>
                        <?php echo $row->address?>
                        <br />
                        <br />
                        <strong>Working Hours:</strong>
                        <br />
                        <?php echo $row->work_time?>
                    </p>

                </div>

                <div class="info-entry">
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
                    <h4>Call Us</h4>

                    <p>
                        Phone: <a class="link-contact" href="tel:<?php echo str_replace('_', '', $row->phone1);?>"><?php echo str_replace('_', '', $row->phone1);?></a> <?php if($row->phone2 != NULL){echo '| '.substr(str_replace('_', '', $row->phone2), 8);}?> <br />
                        <?php if($row->fax != NULL){?>Fax: <?php echo str_replace('_', '', $row->fax);?> <br /><?php }?>
                        <a class="link-contact" href="mailto:<?php echo $row->email;?>"><?php echo $row->email;?></a>
                    </p>

                    <ul class="social-networks">
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

    </div>

</section>
<?php endforeach;