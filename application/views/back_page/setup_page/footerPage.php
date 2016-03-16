<div class="col-md-12">
    <form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupPage/saveFooterPage'); ?>">
        <div class="form-group">
            <label for="inputLabelPage" class="col-sm-3 control-label">Page Label</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputLabelPage" name="txtLabelPage" placeholder="Input Label Page" 
                       data-validate="required" data-message-required="Please insert this field!">
            </div>
        </div>

        <div class="form-group">
            <label for="inputLinkPage" class="col-sm-3 control-label">Link Page</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control" id="inputLinkPage" name="txtLinkPage" placeholder="http://" 
                       data-validate="required" data-message-required="Please insert this field!">
                    <div class="input-group-btn">
                        <button class="btn btn-info" type="button"><i class="entypo-info"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputLinkPage" class="col-sm-3 control-label">Page on?</label>
            <div class="col-sm-9">
                <select class="form-control select" name="selCategory" id="inputCategory">
                    <option value="1">Left</option>
                    <option value="0">Center</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="field-2" class="col-sm-3 control-label">Active?</label>
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
</div>
<br/>
<br/>

<div class="col-md-12">
    <div class="collapse" id="how-to">
        <legend><i class="entypo-info-circled"></i>How to??</legend>
        <p>
            Select the Pages you want to make a menu . Grab the URL on your browser bar . Paste the link on input link page .
        </p>
    </div>
</div>
<script>
$(document).ready(function(){
    $(".btn-info").click(function(){
        $("#how-to").collapse('toggle');
    });
});
</script>
