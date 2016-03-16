<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Sambu Group Web Page Admin Panel" />
        <meta name="author" content="Ismo Broto" />

        <title>Admin Panel | Login</title>


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/neon-core.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/neon-theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/neon-forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/custom.css">

        <script src="<?php echo base_url(); ?>assets/back/js/jquery-1.11.0.min.js"></script>

        <!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/back/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body login-page login-form-fall" >
        <script type="text/javascript">
            var baseurl = '<?php echo site_url();?>';
        </script>
        <div class="login-container">
            
            <div class="login-header login-caret">
                <div class="login-content">
                    <a href="<?php echo site_url('adminpanel'); ?>" class="logo">
                        <img src="<?php echo base_url(); ?>assets/images/Sambu-LogoNewWhite.png" width="120" alt="" />
                    </a>
                    <p class="description">Dear user, log in to access the admin area!</p>
                    <!-- progress bar indicator -->
                    <div class="login-progressbar-indicator">
                        <h3>43%</h3>
                        <span>logging in...</span>
                    </div>
                </div>
            </div>

            <div class="login-progressbar">
                <div></div>
            </div>

            <div class="login-form">
                <div class="login-content">
                    <div class="form-login-error">
                        <h3>Invalid login</h3>
                        <p>Username or Password Not Correct.</p>
                    </div>

                    <form method="post" role="form" id="form_login">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                                Login In
                            </button>
                        </div>			
                    </form>

                    <div class="login-bottom-links">
                        <a href="<?php echo base_url();?>" class="link">Visit to your site</a>
                        <br />
                        <a href="javascript:;" onclick="jQuery('#modal-about').modal('show');">Sambu Group</a> - 
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal About App -->
        <div class="modal fade custom-width danger" id="modal-about">
            <div class="modal-dialog" style="width: 20%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">About App</h4>
                    </div>
                    <div class="modal-body">
                        Any type of width can be applied.
                    </div>
                </div>
            </div>
        </div>


        <!-- Bottom Scripts -->
        <script src="<?php echo base_url(); ?>assets/back/js/gsap/main-gsap.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/joinable.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/resizeable.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/neon-api.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/jquery.validate.min.js"></script>
        <!--<script src="<?php echo base_url(); ?>assets/back/js/neon-login.js"></script>-->
        
<script>
 /**
 *	Neon Login Script
 *
 *	Developed by Arlind Nushi - www.laborator.co
 */

var neonLogin = neonLogin || {};

;(function($, window, undefined){
    "use strict";
    $(document).ready(function(){
        neonLogin.$container = $("#form_login");
        // Login Form & Validation
        neonLogin.$container.validate({
            rules: {
                username: {
                    required: true	
                },
                password: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: 'Harap isi bidang ini'	
                },
                password: {
                    required: 'Harap isi bidang ini'
                }
            },
            highlight: function(element){
                $(element).closest('.input-group').addClass('validate-has-error');
            },
            unhighlight: function(element)
            {
                $(element).closest('.input-group').removeClass('validate-has-error');
            },
            submitHandler: function(ev){
                $(".login-page").addClass('logging-in'); // This will hide the login form and init the progress bar
                // Hide Errors
                $(".form-login-error").slideUp('fast');
                        // We will wait till the transition ends				
                setTimeout(function(){
                    var random_pct = 25 + Math.round(Math.random() * 30);
                    // The form data are subbmitted, we can forward the progress to 70%
                    neonLogin.setPercentage(40 + random_pct);
                    // Send data to the server
                    $.ajax({
//			url: baseurl + '/assets/back/demo/sample-login-form.php',
                        url: '<?php echo site_url('back/login/doLogin');?>',
//                      var user    = document.getElementById('username').value;
                        method: 'POST',
                        dataType: 'json',
                        data: {
                                username: $("input#username").val(),
                                password: $("input#password").val()
                        },
                        error: function(){
                                alert("An error occoured!");
                        },
                        success: function(response){
                            // Login status [success|invalid]
                            var login_status = response.login_status;
                            // Form is fully completed, we update the percentage
                            neonLogin.setPercentage(100);
                            // We will give some time for the animation to finish, then execute the following procedures	
                            setTimeout(function(){
                                // If login is invalid, we store the 
                                if(login_status === 'invalid'){
                                    $(".login-page").removeClass('logging-in');
                                    neonLogin.resetProgressBar(true);
                                }
                                else if(login_status === 'success'){
                                    // Redirect to login page
                                    setTimeout(function(){
                                        var redirect_url = baseurl;
                                        if(response.redirect_url && response.redirect_url.length){
                                            redirect_url = response.redirect_url;
                                        }
                                        window.location.href = redirect_url;
                                    }, 400);
                                }
                            }, 1000);
                        }
                    });
                }, 650);
            }
        });

            // Lockscreen & Validation
            var is_lockscreen = $(".login-page").hasClass('is-lockscreen');

            if(is_lockscreen)
            {
                    neonLogin.$container = $("#form_lockscreen");
                    neonLogin.$ls_thumb = neonLogin.$container.find('.lockscreen-thumb');

                    neonLogin.$container.validate({
                            rules: {

                                    password: {
                                            required: true
                                    },

                            },

                            highlight: function(element){
                                    $(element).closest('.input-group').addClass('validate-has-error');
                            },


                            unhighlight: function(element)
                            {
                                    $(element).closest('.input-group').removeClass('validate-has-error');
                            },

                            submitHandler: function(ev)
                            {	
                                    /* 
                                            Demo Purpose Only 

                                            Here you can handle the page login, currently it does not process anything, just fills the loader.
                                    */

                                    $(".login-page").addClass('logging-in-lockscreen'); // This will hide the login form and init the progress bar

                                    // We will wait till the transition ends				
                                    setTimeout(function()
                                    {
                                            var random_pct = 25 + Math.round(Math.random() * 30);

                                            neonLogin.setPercentage(random_pct, function()
                                            {
                                                    // Just an example, this is phase 1
                                                    // Do some stuff...

                                                    // After 0.77s second we will execute the next phase
                                                    setTimeout(function()
                                                    {
                                                            neonLogin.setPercentage(100, function()
                                                            {
                                                                    // Just an example, this is phase 2
                                                                    // Do some other stuff...

                                                                    // Redirect to the page
                                                                    setTimeout("window.location.href = '../../'", 600);
                                                            }, 2);

                                                    }, 820);
                                            });

                                    }, 650);
                            }
                    });
            }






            // Login Form Setup
            neonLogin.$body = $(".login-page");
            neonLogin.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
            neonLogin.$login_progressbar = neonLogin.$body.find(".login-progressbar div");

            neonLogin.$login_progressbar_indicator.html('0%');

            if(neonLogin.$body.hasClass('login-form-fall'))
            {
                    var focus_set = false;

                    setTimeout(function(){ 
                            neonLogin.$body.addClass('login-form-fall-init')

                            setTimeout(function()
                            {
                                    if( !focus_set)
                                    {
                                            neonLogin.$container.find('input:first').focus();
                                            focus_set = true;
                                    }

                            }, 550);

                    }, 0);
            }
            else
            {
                    neonLogin.$container.find('input:first').focus();
            }

            // Focus Class
            neonLogin.$container.find('.form-control').each(function(i, el)
            {
                    var $this = $(el),
                            $group = $this.closest('.input-group');

                    $this.prev('.input-group-addon').click(function()
                    {
                            $this.focus();
                    });

                    $this.on({
                            focus: function()
                            {
                                    $group.addClass('focused');
                            },

                            blur: function()
                            {
                                    $group.removeClass('focused');
                            }
                    });
            });

            // Functions
            $.extend(neonLogin, {
                    setPercentage: function(pct, callback)
                    {
                            pct = parseInt(pct / 100 * 100, 10) + '%';

                            // Lockscreen
                            if(is_lockscreen)
                            {
                                    neonLogin.$lockscreen_progress_indicator.html(pct);

                                    var o = {
                                            pct: currentProgress
                                    };

                                    TweenMax.to(o, .7, {
                                            pct: parseInt(pct, 10),
                                            roundProps: ["pct"],
                                            ease: Sine.easeOut,
                                            onUpdate: function()
                                            {
                                                    neonLogin.$lockscreen_progress_indicator.html(o.pct + '%');
                                                    drawProgress(parseInt(o.pct, 10)/100);
                                            },
                                            onComplete: callback
                                    });	
                                    return;
                            }

                            // Normal Login
                            neonLogin.$login_progressbar_indicator.html(pct);
                            neonLogin.$login_progressbar.width(pct);

                            var o = {
                                    pct: parseInt(neonLogin.$login_progressbar.width() / neonLogin.$login_progressbar.parent().width() * 100, 10)
                            };

                            TweenMax.to(o, .7, {
                                    pct: parseInt(pct, 10),
                                    roundProps: ["pct"],
                                    ease: Sine.easeOut,
                                    onUpdate: function()
                                    {
                                            neonLogin.$login_progressbar_indicator.html(o.pct + '%');
                                    },
                                    onComplete: callback
                            });
                    },

                    resetProgressBar: function(display_errors)
                    {
                            TweenMax.set(neonLogin.$container, {css: {opacity: 0}});

                            setTimeout(function()
                            {
                                    TweenMax.to(neonLogin.$container, .6, {css: {opacity: 1}, onComplete: function()
                                    {
                                            neonLogin.$container.attr('style', '');
                                    }});

                                    neonLogin.$login_progressbar_indicator.html('0%');
                                    neonLogin.$login_progressbar.width(0);

                                    if(display_errors)
                                    {
                                            var $errors_container = $(".form-login-error");

                                            $errors_container.show();
                                            var height = $errors_container.outerHeight();

                                            $errors_container.css({
                                                    height: 0
                                            });

                                            TweenMax.to($errors_container, .45, {css: {height: height}, onComplete: function()
                                            {
                                                    $errors_container.css({height: 'auto'});
                                            }});

                                            // Reset password fields
                                            neonLogin.$container.find('input[type="password"]').val('');
                                    }

                            }, 800);
                    }
            });


            // Lockscreen Create Canvas
            if(is_lockscreen)
            {
                    neonLogin.$lockscreen_progress_canvas = $('<canvas></canvas>');
                    neonLogin.$lockscreen_progress_indicator =  neonLogin.$container.find('.lockscreen-progress-indicator');

                    neonLogin.$lockscreen_progress_canvas.appendTo(neonLogin.$ls_thumb);

                    var thumb_size = neonLogin.$ls_thumb.width();

                    neonLogin.$lockscreen_progress_canvas.attr({
                            width: thumb_size,
                            height: thumb_size
                    });


                    neonLogin.lockscreen_progress_canvas = neonLogin.$lockscreen_progress_canvas.get(0);

                    // Create Progress Circle
                    var bg = neonLogin.lockscreen_progress_canvas,
                            ctx = ctx = bg.getContext('2d'),
                            imd = null,
                            circ = Math.PI * 2,
                            quart = Math.PI / 2,
                            currentProgress = 0;

                    ctx.beginPath();
                    ctx.strokeStyle = '#eb7067';
                    ctx.lineCap = 'square';
                    ctx.closePath();
                    ctx.fill();
                    ctx.lineWidth = 3.0;

                    imd = ctx.getImageData(0, 0, thumb_size, thumb_size);

                    var drawProgress = function(current) {
                        ctx.putImageData(imd, 0, 0);
                        ctx.beginPath();
                        ctx.arc(thumb_size/2, thumb_size/2, 70, -(quart), ((circ) * current) - quart, false);
                        ctx.stroke();

                        currentProgress = current * 100;
                    }

                    drawProgress(0/100);


                    neonLogin.$lockscreen_progress_indicator.html('0%');

                    ctx.restore();
            }

    });
	
})(jQuery, window);
</script>

        <script src="<?php echo base_url(); ?>assets/back/js/neon-custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/back/js/neon-demo.js"></script>

    </body>
</html>