<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/SetupWidget/editSlider'); ?>" enctype="multipart/form-data" >
    <?php foreach($_getWidget as $row): ?>
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTitle" name="txtTitle" placeholder="Input Title" data-validate="required"
                   data-message-required="Please insert this field!" value="<?php echo $row->title_widget;?>">
            <input type="hidden" class="form-control" id="inputCodeWidget" name="txtCodeWidget" value="<?php echo $row->code_widget;?>" >
        </div>
    </div>
    <div class="form-group">
        <textarea id="txtDescript" name="txtDescript" class="form-control"><?php echo $row->description;?></textarea>
    </div>
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Image on</label>
        <div class="col-sm-10">
            <input type="radio" value="1" name="radImgPotition" required="" <?php if($row->thumb_potition == 1){echo "checked";}?>>
            <label for="icon1" class="control-label">Right</label>
            <input type="radio" value="0" name="radImgPotition" <?php if($row->thumb_potition == 0){echo "checked";}?>>
            <label for="icon1" class="control-label">Left</label>
        </div>
    </div>
    <div class="form-group">
        <label for="inputTitlePost" class="col-sm-2 control-label">Image Slider</label>
        <div class="col-sm-10">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 100%; height: 200px" data-trigger="fileinput">
                    <img src="/SambuPage/assets/img/thumb.png" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 200px"></div>
                <div>
                    <span class="btn btn-white btn-file">
                        <span class="fileinput-new btn btn-xs btn-primary">Select image</span>
                        <span class="fileinput-exists btn btn-xs btn-primary">Change</span>
                        <input type="file" name="imgThumb" id="imgThumb" accept="image/*" >
                    </span>
                    <a href="#" class="btn btn-xs btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputStatusPost" class="col-sm-1 control-label">Posted</label>
        <div class="col-sm-5">
            <select id="inputStatusPost" name="selStatusPost" class="form-control select">
                <option value="1" <?php if($row->publish == 1){ echo "selected";}?> >Publish</option>
                <option value="0" <?php if($row->publish == 0){ echo "selected";}?> >Save as Draft</option>
            </select>
        </div>
        <label for="txtNickname" class="col-sm-2 control-label">Edited by</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="txtNickname" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </div>
    </div>
    <?php endforeach;?>
</form>

<script src="<?php echo base_url(); ?>assets/back/js/fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/back/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#txtDescript',
        menubar: false
    });
</script>
