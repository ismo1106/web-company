<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/SetupWidget/saveProductTile'); ?>" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTitle" name="txtTitle" placeholder="Input Title" data-validate="required"
                   data-message-required="Please insert this field!">
        </div>
    </div>
    <div class="form-group">
        <label for="inputTitlePost" class="col-sm-2 control-label">Thumbnail Product</label>
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
                        <input type="file" name="imgThumb" accept="image/*" required="">
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
                <option value="1">Publish</option>
                <option value="0">Save as Draft</option>
            </select>
        </div>
        <label for="txtNickname" class="col-sm-2 control-label">Login as</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="txtNickname" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </div>
</form>

<script src="<?php echo base_url(); ?>assets/back/js/fileinput.js"></script>
