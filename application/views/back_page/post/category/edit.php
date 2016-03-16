<form role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url('back/post/editBlogCategory'); ?>">
    <?php foreach ($_getBlogCategory as $row): ?>
        <div class="form-group">
            <label for="inputCategory" class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                <input type="hidden" class="form-control" id="inputIdCategory" name="txtIdCategory" value="<?php echo $row->id_category; ?>">
                <input type="text" class="form-control" id="inputCategory" name="txtCategory" data-validate="required" 
                       data-message-required="Please insert this field!"  placeholder="Input Name Category" value="<?php echo $row->name_category; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="field-2" class="col-sm-3 control-label">Active ?</label>
            <?php
                if($row->active == 1){
                    $yes    = 'checked';
                    $no     = '';
                }elseif($row->active == 0){
                    $yes    = '';
                    $no     = 'checked';
                }else{
                    $yes    = '';
                    $no     = '';
                }
            ?>
            <div class="col-sm-9">
                <div class="radio">
                    <label>
                        <input type="radio" name="radActiveCategorty" id="optionsRadios1" value="1" <?php echo $yes;?> >Yes
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="radActiveCategorty" id="optionsRadios2" value="0" <?php echo $no;?> >No
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputCreateBy" class="col-sm-3 control-label">Edited by</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputCreateBy" name="txtCreateBy" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" class="btn btn-primary" name="editCategory">Edit</button>
            </div>
        </div>
    <?php endforeach; ?>
</form>
