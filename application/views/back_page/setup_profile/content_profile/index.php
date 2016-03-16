<link rel="stylesheet" href="<?php echo base_url();?>assets/back/js/dropzone/dropzone.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/back/js/icheck/skins/minimal/_all.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/back/js/icheck/skins/square/_all.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/back/js/icheck/skins/flat/_all.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/back/js/icheck/skins/futurico/futurico.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/back/js/icheck/skins/polaris/polaris.css">

<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Profile</a>
        </li>
        <li class="active">
            <strong>Content Profile</strong>
        </li>
    </ol>
    <?php if($_message != NULL): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Oh snap!</strong> <?php echo $_message;?>
        </div>
    <?php endif; ?>
    <h2>Create New Content Profile</h2>
    <br />
    <input id="inputThisURL" type="hidden" value="<?php echo $_thisURL;?>" >
    <form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupProfile/saveProfileContent'); ?>" enctype="multipart/form-data" >
        <div class="form-group" >
            <label for="inputTitlePost" class="col-sm-1 control-label">Title Post</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputTitlePost" name="txtTitlePost" placeholder="Input Title" data-validate="required"
                       data-message-required="Please insert this field!">
            </div>
        </div>
        
        <div class="form-group" >
            <div id="media-roll" class="col-sm-offset-1 col-sm-5">
                <a href="#" class="select-media btn btn-primary btn-sm"><i class="entypo-picture"></i> Select Picture</a>
                <a href="#" class="add-media btn btn-primary btn-sm"><i class="entypo-picture"></i> Add Picture</a>
            </div>
        </div>

        <div class="form-group" >
            <div class="col-sm-9">
                <textarea id="inputPostValue" name="txtPostValue" class="form-control ckeditor"></textarea>
            </div>

            <div class="col-sm-3">
                <label for="inputHeader" class="control-label">Category</label>
                <select id="inputHeader" name="selHeader" class="form-control select" >
                    <option value=""> Choose... </option>
                    <?php
                    foreach ($_selectHead as $rowHead):
                        echo "<option value='$rowHead->id_head_profile'>$rowHead->head_descript</option>";
                    endforeach;
                    ?>
                </select>
                <br/>
                <label for="inputStatusPost" class="control-label">Posted</label>
                <select id="inputStatusPost" name="selStatusPost" class="form-control select">
                    <option value="1">Publish</option>
                    <option value="0">Save as Draft</option>
                </select>
                <br/>
                <label for="txtNickname" class="control-label">Login as</label>
                <input type="text" class="form-control" id="txtNickname" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
                <br/>
                <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp; Save</button>
            </div>
        </div>
        
        <div class="form-group">            
            <label for="" class="col-sm-1 control-label">Select Layout</label>
            <div class="col-sm-1">
                <input class="icheck-2" type="radio" id="radioLayout1" name="radioLayout" value="1" onchange="selectLayout(this.value)" checked="">
                <label for="radioLayout1">Full Text</label>
                <img src="<?php echo base_url('assets/img/layout-3.png');?>" class="img-responsive" >
            </div>
            <div class="col-sm-1">
                <input class="icheck-2" type="radio" id="radioLayout2" name="radioLayout" value="2" onchange="selectLayout(this.value)">
                <label for="radioLayout2">On Top</label>
                <img src="<?php echo base_url('assets/img/layout-1.png');?>" class="img-responsive" >
            </div>
            <div class="col-sm-1">
                <input class="icheck-2" type="radio" id="radioLayout3" name="radioLayout" value="3" onchange="selectLayout(this.value)">
                <label for="radioLayout3">On Right</label>
                <div class="col-sm-1"></div>
                <img src="<?php echo base_url('assets/img/layout-2.png');?>" class="img-responsive" >
            </div>
            
            <div id="inputImageHeader" style="display: none;">
                <label for="inputTitlePost" class="col-sm-1 control-label">Image Header</label>
                <div class="col-sm-2">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 100%; height: 200px" data-trigger="fileinput">
                            <img src="/SambuPage/assets/img/thumb.png" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 200px"></div>
                        <div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new btn btn-primary">Select image</span>
                                <span class="fileinput-exists btn btn-primary">Change</span>
                                <input type="file" name="imgHeader" accept="image/*" required>
                            </span>
                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal Select Media (Custom Width)-->
<div class="modal fade custom-width" tabindex="-1" id="modal-selectMedia">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select Media</h4>
            </div>

            <div class="modal-body">
                <div id="loadSelectMedia">
                    <!--Content is loading...-->
                </div>                
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Media (Custom Width)-->
<div class="modal fade" tabindex="-1" id="modal-addMedia">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Media</h4>
            </div>

            <div class="modal-body">
                <div id="loadAddMedia">
                    <!--Content is loading...-->
                </div>                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var divMediaRoll;
    jQuery(document).ready(function($) {
        divMediaRoll    = $("#media-roll");
        divMediaRoll.on("click", ".select-media", function() {
            $.ajax({
                url:"<?php echo site_url('back/post/ajaxSelectMedia');?>",
                cache:false,
                success:function(msg){
                    $("#loadSelectMedia").html(msg);
                }
            });
            $("#modal-selectMedia").modal("show");
        });
        
        divMediaRoll.on("click", ".add-media", function() {
            var url = document.getElementById('inputThisURL').value;
            $.ajax({
                type: 'POST',
                url:"<?php echo site_url('back/post/ajaxAddMedia');?>",
                data: 'url='+url,
                cache:false,
                success:function(msg){
                    $("#loadAddMedia").html(msg);
                }
            });
            $("#modal-addMedia").modal("show");
        });
    });
</script>s

<script language="JavaScript">
    function selectLayout(val){
        if(val === '1'){
            document.getElementById('inputImageHeader').style.display = "none";
        }else{
            document.getElementById('inputImageHeader').style.display = "block";
        }
    }
</script>

<script src="<?php echo base_url(); ?>assets/back/js/fileinput.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/dropzone/dropzone.js"></script>

<script src="<?php echo base_url(); ?>assets/back/js/icheck/icheck.min.js"></script>

<script src="<?php echo base_url(); ?>assets/back/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/ckeditor/adapters/jquery.js"></script>
