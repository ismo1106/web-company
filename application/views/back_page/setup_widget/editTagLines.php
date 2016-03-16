<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/SetupWidget/editTagLine'); ?>">
    <?php foreach($_getWidget as $row): ?>
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTitle" name="txtTitle" placeholder="Input Title" data-validate="required"
                   data-message-required="Please insert this field!" required="" value="<?php echo $row->title_widget;?>">
            <input type="hidden" class="form-control" id="inputCodeWidget" name="txtCodeWidget" value="<?php echo $row->code_widget;?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Icon</label>
        <div class="col-sm-10">
            <input type="radio" value="entypo-eye" name="radioIcon" required="" <?php if($row->icon_tag_line == 'entypo-eye'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-eye"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-picture" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-picture'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-picture"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-heart" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-heart'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-heart"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-heart-empty" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-heart-empty'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-heart-empty"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-info" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-info'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-info"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-tag" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-tag'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-tag"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-thumbs-up" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-thumbs-up'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-thumbs-up"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-bell" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-bell'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-bell"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-users" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-users'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-users"></i>&nbsp;&nbsp;&nbsp;</label>
            <br/>
            <input type="radio" value="entypo-archive" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-archive'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-archive"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-lamp" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-lamp'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-lamp"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-cog" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-cog'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-cog"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-arrows-ccw" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-arrows-ccw'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-arrows-ccw"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-trophy" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-trophy'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-trophy"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-area" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-chart-area'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-chart-area"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-pie" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-chart-pie'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-chart-pie"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-bar" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-chart-bar'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-chart-bar"></i>&nbsp;&nbsp;&nbsp;</label>
            <input type="radio" value="entypo-chart-line" name="radioIcon" <?php if($row->icon_tag_line == 'entypo-chart-line'){echo "checked";}?>>
            <label for="icon1" class="control-label"><i class="entypo-chart-line"></i>&nbsp;&nbsp;&nbsp;</label>
        </div>
    </div>
    <div class="form-group">
        <textarea id="txtDescript" name="txtDescript" class="form-control"><?php echo $row->description;?></textarea>
    </div>
    <div class="form-group">
        <label for="inputStatusPost" class="col-sm-1 control-label">Posted</label>
        <div class="col-sm-5">
            <select id="inputStatusPost" name="selStatusPost" class="form-control select">
                <option value="1" <?php if($row->publish == 1){ echo "selected";}?> >Publish</option>
                <option value="0" <?php if($row->publish == 0){ echo "selected";}?> >Save as Draft</option>
            </select>
        </div>
        <label for="txtNickname" class="col-sm-2 control-label">Updated by</label>
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

<script type="text/javascript" src="<?php echo base_url();?>assets/back/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#txtDescript',
        menubar: false
    });
</script>