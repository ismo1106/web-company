<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Blog</a>
        </li>
        <li class="active">
            <strong>Media</strong>
        </li>
    </ol>

    <h2>Add Media</h2>
    
    <form action="<?php echo site_url('back/Media/upload_multiple_files');?>" class="dropzone" id="dropzone_example" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="">
            <?php echo form_upload('uploadedimages[]','','multiple'); ?>
        </div>
        <div class="form-group">
            <input type="submit" value="Upload" class="btn btn-primary" />
        </div>
    </form>


</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/back/js/dropzone/dropzone.css">

<script src="<?php echo base_url();?>assets/back/js/fileinput.js"></script>
<script src="<?php echo base_url();?>assets/back/js/dropzone/dropzone.js"></script>