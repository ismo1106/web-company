<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/post/uploadMedia'); ?>" enctype="multipart/form-data" >
    <input type="hidden" name="txtThisURL" value="<?php echo $_URL;?>" >
    <div class="form-group">
        <div class="col-sm-6">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 100%;" data-trigger="fileinput">
                    <img src="/SambuPage/assets/img/thumb.png" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 280px; max-height: 200px;"></div>
                <div>
                    <span class="btn btn-white btn-file">
                        <span class="fileinput-new btn btn-primary">Browse Image</span>
                        <span class="fileinput-exists btn btn-primary">Change</span>
                        <input type="file" name="fileMedia" accept="image/*">
                    </span>
                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="col-sm-12">
                <label for="inputDescriptMedia" class="control-label">Description</label>
            </div>            
            <div class="col-sm-12">
                <textarea id="inputDescriptMedia" name="txtDescriptMedia" class="form-control" rows="3" maxlength="100"></textarea>
                <div class="pull-right small" id="textarea_feedback"></div>
            </div>
            
            <div class="col-sm-12">
                <label for="inputCurrentLogin" class="control-label">Login as</label>
            </div>
            <div class="col-sm-12">
                <input id="inputCurrentLogin" name="txtNickname" value="<?php echo $this->session->userdata('nickname');?>" class="form-control" readonly="" />
            </div>
            
            <div class="col-sm-12">
                <button class="btn btn-sm btn-primary btn-block" type="submit" name="btnUploadMedia">
                    <i class="entypo-upload"></i> Upload
                </button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        var text_max = 100;
        $('#textarea_feedback').html('Characters: '+text_max+'/100');

        $('#inputDescriptMedia').keyup(function() {
            var text_length = $('#inputDescriptMedia').val().length;
            var text_remaining = text_max - text_length;

            $('#textarea_feedback').html('Characters: '+text_remaining+'/100');
        });
    });
</script>
<script src="<?php echo base_url(); ?>assets/back/js/fileinput.js"></script>