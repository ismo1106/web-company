<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupPage/updateFirstPage'); ?>">
    <?php foreach ($_getPageFirst as $row): ?>
    <div class="form-group">
        <label for="inputLabelPage" class="col-sm-3 control-label">Page Label</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputLabelPage" name="txtLabelPage" placeholder="Input Label Page" 
                   data-validate="required" data-message-required="Please insert this field!" value="<?php echo $row->label_page;?>">
            <input type="hidden" class="form-control" name="txtIdPage" value="<?php echo $row->id_page;?>" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputLinkPage" class="col-sm-3 control-label">Link Page</label>
        <div class="col-sm-9">
            <select id="inputLinkPage" name="selectLinkPage" class="form-control select">
                <option value="#">No Link</option>
                <?php foreach ($_selectProfilContent as $row): ?>
                <option value="front/profile/of/<?php echo $row->kode_profile?>"><?php echo strtoupper($row->head_abbr).' - '.$row->title_profile;?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="field-2" class="col-sm-3 control-label">Active ?</label>
        <div class="col-sm-5">
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
        <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-sm btn-primary" value="Update" name="btnUpdate" />
        </div>
    </div>
    <?php endforeach; ?>
</form>