<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupPage/updateSecondPage'); ?>">
    <?php foreach ($_getPageSecond as $row):?>
    <div class="form-group">
        <label for="inputLabelPage" class="col-sm-3 control-label">Page Label</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputLabelPage" name="txtLabelPage" placeholder="Input Label Page" data-validate="required" 
                   data-message-required="Please insert this field!" value="<?php echo $row->label_page;?>" >
            <input type="hidden" class="form-control" name="txtIdPage" value="<?php echo $row->id_page;?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputHeaderPage" class="col-sm-3 control-label">Page Header</label>
        <div class="col-sm-9">
            <select id="inputHeaderPage" name="selectHeaderPage" class="form-control select">
                <option value="">Choose...</option>
                <?php foreach ($_selectFirstPage as $row1): ?>
                    <?php if($row->header_page == $row1->id_page): ?>
                    <option value="<?php echo $row1->id_page?>" selected><?php echo $row1->label_page;?></option>
                    <?php else: ?>
                    <option value="<?php echo $row1->id_page?>"><?php echo $row1->label_page;?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputLinkPage" class="col-sm-3 control-label">Link Page</label>
        <div class="col-sm-9">
            <select id="inputLinkPage" name="selectLinkPage" class="form-control select">
                <option value="#">No Link</option>
                <?php foreach ($_selectProfilContent as $rowL): ?>
                    <?php if(substr($row->link_page, 17) == $rowL->kode_profile): ?>
                    <option value="front/profile/of/<?php echo $rowL->kode_profile?>" selected>
                        <?php echo strtoupper($rowL->head_abbr).' - '.$rowL->title_profile;?></option>
                    <?php else: ?>
                    <option value="front/profile/of/<?php echo $rowL->kode_profile?>">
                        <?php echo strtoupper($rowL->head_abbr).' - '.$rowL->title_profile;?></option>
                    <?php endif; ?>
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
    <?php endforeach; ?>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-sm btn-primary" value="Update" />
        </div>
    </div>
</form>