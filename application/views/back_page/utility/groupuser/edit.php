<form role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url('back/groupuser/updateGroupuser'); ?>">
    <?php foreach ($_getGroupuser as $row): ?>
    <div class="form-group">
        <label for="inputCategory" class="col-sm-3 control-label">Group Name *</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputGroupuser" name="txtGroupuser" data-validate="required" data-message-required="Please insert this field!" 
                   placeholder="Please Input Name Group User" value="<?php echo $row->group_name;?>" >
            <input type="hidden" class="form-control" id="inputIdGroupuser" name="txtIdGroupuser" value="<?php echo $row->group_id;?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-2" class="col-sm-3 control-label">Active ?*</label>
        <div class="col-sm-9">
            <div class="radio">
                <label>
                    <input type="radio" name="radActive" id="optionsRadios1" value="1" <?php if($row->active == 1){ echo 'checked';}?>>Yes
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="radActive" id="optionsRadios2" value="0" <?php if($row->active == 0){ echo 'checked';}?>>No
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputCreateBy" class="col-sm-3 control-label">Updated by</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputCreateBy" name="txtCreateBy" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary" name="saveCategory">Update</button>
        </div>
    </div>
    <?php endforeach; ?>
</form>