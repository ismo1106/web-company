<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/SetupWidget/editQuote'); ?>">
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
        <label for="inputTitle" class="col-sm-2 control-label">Quotes By</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputQuoteBy" name="txtQuoteBy" placeholder="Qoutes By" data-validate="required"
                   data-message-required="Please insert this field!" required="" value="<?php echo $row->quote_by;?>">
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
    <?php endforeach; ?>
</form>

<script type="text/javascript" src="<?php echo base_url();?>assets/back/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#txtDescript',
        menubar: false,
        toolbar: ['undo redo | styleselect | bold italic | alignleft aligncenter alignright | code'],
        plugins: ['visualchars', 'wordcount', 'code']
    });
</script>