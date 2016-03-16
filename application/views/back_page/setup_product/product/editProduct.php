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
            <a href="">Product</a>
        </li>
        <li class="active">
            <strong>Content Profile</strong>
        </li>
    </ol>
    
    <h2>Add New Content Product</h2>
    <br />
    <input id="inputThisURL" type="hidden" value="<?php echo $_thisURL;?>" >
    <form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupProduct/updateProduct'); ?>" enctype="multipart/form-data" >
        <?php foreach ($_selectProduct as $row): ?>
        <div class="form-group" >
            <label for="inputProductName" class="col-sm-2 control-label">Product Name</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="inputProductName" name="txtProductName" placeholder="Input Product Name" data-validate="required" 
                       data-message-required="Please insert this field!" value="<?php echo $row->name_product;?>">
                <input type="hidden" class="form-control" name="txtIdProduct" value="<?php echo $row->id_product;?>">
            </div>
        </div>
        
        <div class="form-group" >
            <div id="media-roll" class="col-sm-offset-2 col-sm-5">
                <a href="#" class="select-media btn btn-primary btn-sm"><i class="entypo-picture"></i> Select Picture</a>
                <a href="#" class="add-media btn btn-primary btn-sm"><i class="entypo-picture"></i> Add Picture</a>
            </div>
        </div>

        <div class="form-group" >
            <div class="col-sm-9">
                <textarea id="inputDescription" name="txtDescription" class="form-control ckeditor"><?php echo $row->descript_product;?></textarea>
            </div>

            <div class="col-sm-3">
                <label for="inputType" class="control-label">Type Product</label>
                <select id="inputType" name="selectType" class="form-control select" >
                    <option value=""> Choose... </option>
                    <?php
                        foreach ($_selectTypeProduct as $rowType):
                            echo '<option value="'.$rowType->id_type.'">'.$rowType->name_type.'</option>';
                        endforeach;
                    ?>
                </select>
                <br/>
                <script type="text/javascript">
                    $("#inputType").change(function() {
                        var selectValues = $("#inputType").val();
                        if (selectValues === 0) {
                            var msg = '<select class="form-control" id="inputCategory" name="selectCategory"><option value="">Choose...</option></select>';
                            $('#divSelectCategory').html(msg);
                        } else {
                            var type = {type: $("#inputType").val()};
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('back/setupProduct/ajaxGetCategoryProduct') ?>",
                                data: type,
                                success: function(msg) {
                                    $('#divSelectCategory').html(msg);
                                }
                            });
                        }
                    });
                </script>
                <label for="inputCategory" class="control-label">Category Product</label>
                <div id="divSelectCategory">
                    <select id="inputCategory" name="selectCategory" class="form-control select" >
                        <option value=""> Choose... </option>
                    </select>
                </div>
                <br/>
                <label for="inputStatusPost" class="control-label">Posted</label>
                <select id="inputStatusPost" name="selStatusPost" class="form-control select">
                    <option value="1" <?php if($row->publish == 1){ echo 'selected';}?> >Publish</option>
                    <option value="0" <?php if($row->publish == 0){ echo 'selected';}?> >Save as Draft</option>
                </select>
                <br/>
                <label for="txtNickname" class="control-label">Login as</label>
                <input type="text" class="form-control" id="txtNickname" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
                <br/>
                <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp; Update &amp; Continue</button>
            </div>
        </div>
        <?php endforeach; ?>
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
</script>

<script src="<?php echo base_url(); ?>assets/back/js/fileinput.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/dropzone/dropzone.js"></script>

<script src="<?php echo base_url(); ?>assets/back/js/icheck/icheck.min.js"></script>

<script src="<?php echo base_url(); ?>assets/back/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/ckeditor/adapters/jquery.js"></script>
