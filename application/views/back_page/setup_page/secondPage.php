<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupPage/saveSecondPage'); ?>">
    <div class="form-group">
        <label for="inputLabelPage" class="col-sm-3 control-label">Page Label</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputLabelPage" name="txtLabelPage" placeholder="Input Label Page" 
                   data-validate="required" data-message-required="Please insert this field!">
        </div>
    </div>
    <div class="form-group">
        <label for="inputHeaderPage" class="col-sm-3 control-label">Page Header</label>
        <div class="col-sm-9">
            <select id="inputHeaderPage" name="selectHeaderPage" class="form-control select">
                <option value="">Choose...</option>
                <?php foreach ($_selectFirstPage as $row): ?>
                <option value="<?php echo $row->id_page?>"><?php echo $row->label_page;?></option>
                <?php endforeach; ?>
            </select>
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
                    <input type="radio" name="radActive" id="optionsRadios1" value="1" checked>Yes
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="radActive" id="optionsRadios2" value="0">No
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-sm btn-primary" value="Save" />
        </div>
    </div>
</form>