<form role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url(); ?>back/setupProfile/updateHeadProfile">
    <?php foreach ($_getHeadProfile as $row): ?>
    <div class="form-group">
        <label for="inputHeadProfile" class="col-sm-3 control-label">Name Head</label>
        <div class="col-sm-9">
            <input type="hidden" class="form-control" id="inputIdHead" name="txtIdHead" value="<?php echo $row->id_head_profile;?>"/>
            <input type="text" class="form-control" id="inputHeadProfile" name="txtHeadProfile" data-validate="required" required
                   maxlength="10" data-message-required="Please insert this field!"  placeholder="Input Name Head" value="<?php echo $row->head_abbr; ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="editDescript" class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            <textarea id="editDescript" class="form-control" name="txtDescript" placeholder="Input Description" rows="2" maxlength="100"><?php echo $row->head_descript; ?></textarea>
            <div class="pull-right small" id="txt_feedback"></div>
        </div>                            
    </div>

    <div class="form-group">
        <label for="inputCreateBy" class="col-sm-3 control-label">Updated by</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputCreateBy" name="txtCreateBy" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-primary" name="saveHeadProfile">Update</button>
        </div>
    </div>
    <?php endforeach; ?>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        var text_max = 100;
        var text_length = $('#editDescript').val().length;
        $('#txt_feedback').html('Characters: '+(text_max-text_length)+'/100');

        $('#editDescript').keyup(function() {
            var text_length = $('#editDescript').val().length;
            var text_remaining = text_max - text_length;

            $('#txt_feedback').html('Characters: '+text_remaining+'/100');
        });
    });
</script>