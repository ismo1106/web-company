<?php foreach ($_getCategoryProduct as $rowCat): ?>
<form role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url('back/setupProductCategory/updateCategoryProduct'); ?>">
    <div class="form-group">
        <label for="inputCategory" class="col-sm-3 control-label">Category</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="inputCategory" name="txtCategory" data-validate="required" data-message-required="Please insert this field!" 
                   placeholder="Input Name Category" value="<?php echo $rowCat->name_category_product;?>">
            <input type="hidden" class="form-control" id="inputCategoryID" name="txtCategoryID" value="<?php echo $rowCat->id_category_product;?>" readonly="" >
        </div>
    </div>

    <div class="form-group">
        <label for="field-2" class="col-sm-3 control-label">Type Product</label>
        <div class="col-sm-7">
            <select class="form-control select" name="selectType" id="inputType">
                <?php
                foreach ($_selectTypeProduct as $row):
                    if($rowCat->id_type === $row->id_type):
                        echo '<option value="' . $row->id_type . '" selected>' . $row->name_type . '</option>';
                    else:
                        echo '<option value="' . $row->id_type . '">' . $row->name_type . '</option>';
                    endif;
                endforeach;
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputCreateBy" class="col-sm-3 control-label">Updated by</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="inputCreateBy" name="txtCreateBy" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary" name="saveCategory">Update</button>
        </div>
    </div>
</form>
<?php endforeach; ?>