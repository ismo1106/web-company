<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupPage/saveThirdPage'); ?>">
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
                    <option value="<?php echo $row->id_page ?>"><?php echo $row->label_page; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <script type="text/javascript">
        $("#inputHeaderPage").change(function() {
            var selectValues = $("#inputHeaderPage").val();
            if (selectValues === 0) {
                var msg = '<select class="form-control" id="inputSubHeaderPage" name="selectSubHeaderPage"><option value="">Choose...</option></select>';
                $('#divSelectSubHeader').html(msg);
            } else {
                var head = {head: $("#inputHeaderPage").val()};
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('back/setupPage/ajaxSelectThirdPage') ?>",
                    data: head,
                    success: function(msg) {
                        $('#divSelectSubHeader').html(msg);
                    }
                });
            }
        });
    </script>
    <div class="form-group">
        <label for="inputSubHeaderPage" class="col-sm-3 control-label">Page Sub Header</label>
        <div id="divSelectSubHeader" class="col-sm-9">
            <select id="inputSubHeaderPage" name="selectSubHeaderPage" class="form-control select">
                <option value="">Choose...</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputLinkPage" class="col-sm-3 control-label">Link Page</label>
        <div class="col-sm-9">
            <select id="inputLinkPage" name="selectLinkPage" class="form-control select">
                <option value="#">No Link</option>
                <?php foreach ($_selectProfilContent as $row): ?>
                    <option value="front/profile/of/<?php echo $row->kode_profile ?>"><?php echo strtoupper($row->head_abbr).' - '.$row->title_profile; ?></option>
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