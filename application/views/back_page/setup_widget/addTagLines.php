<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/SetupWidget/saveTagLine'); ?>">
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTitle" name="txtTitle" placeholder="Input Title" data-validate="required"
                   data-message-required="Please insert this field!" required="">
        </div>
    </div>
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Icon</label>
        <div class="col-sm-10">
            <input type="radio" value="entypo-eye" name="radioIcon" required="">
            <label for="icon1" class="control-label"><i class="entypo-eye"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-picture" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-picture"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-heart" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-heart"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-heart-empty" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-heart-empty"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-info" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-info"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-tag" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-tag"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-thumbs-up" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-thumbs-up"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-bell" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-bell"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-users" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-users"></i>&nbsp;&nbsp;&nbsp;</label>
            <br/>
            <input type="radio" value="entypo-archive" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-archive"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-lamp" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-lamp"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-cog" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-cog"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-arrows-ccw" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-arrows-ccw"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-trophy" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-trophy"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-area" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-chart-area"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-pie" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-chart-pie"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-bar" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-chart-bar"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-line" name="radioIcon">
            <label for="icon1" class="control-label"><i class="entypo-chart-line"></i>&nbsp;&nbsp;&nbsp;</label>
        </div>
    </div>
    <div class="form-group">
        <textarea id="txtDescript" name="txtDescript" class="form-control"></textarea>
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

<script type="text/javascript" src="<?php echo base_url();?>assets/back/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#txtDescript',
        menubar: false
    });
</script>