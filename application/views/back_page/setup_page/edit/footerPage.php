<div class="col-md-12">
    <form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/setupPage/updateFooterPage'); ?>">
        <?php foreach ($_getPageFooter as $row): ?>
        <div class="form-group">
            <label for="inputLabelPage" class="col-sm-3 control-label">Page Label</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputLabelPage" name="txtLabelPage" placeholder="Input Label Page" 
                       data-validate="required" data-message-required="Please insert this field!" value="<?php echo $row->label_page;?>">
                <input type="hidden" class="form-control" id="inputIdPage" name="txtIdPage" value="<?php echo $row->id_page;?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputLinkPage" class="col-sm-3 control-label">Link Page</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control" id="inputLinkPage" name="txtLinkPage" placeholder="http://" 
                       data-validate="required" data-message-required="Please insert this field!" value="<?php echo $row->link_page;?>" >
                    <div class="input-group-btn">
                        <button class="btn btn-info" type="button" id="btn-how"><i class="entypo-info"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputLinkPage" class="col-sm-3 control-label">Page on?</label>
            <div class="col-sm-9">
                <select class="form-control select" name="selCategory" id="inputCategory">
                    <option value="1" <?php if($row->category_page == 1){echo 'selected';}?> >Left</option>
                    <option value="0" <?php if($row->category_page == 0){echo 'selected';}?> >Center</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="field-2" class="col-sm-3 control-label">Active?</label>
            <div class="col-sm-5">
                <div class="radio">
                    <label>
                        <input type="radio" name="radActive" id="optionsRadios1" value="1" <?php if($row->active == 1){echo 'checked';}?> >Yes
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="radActive" id="optionsRadios2" value="0" <?php if($row->active == 0){echo 'checked';}?> >No
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" class="btn btn-sm btn-primary" value="Save" />
            </div>
        </div>
        <?php endforeach; ?>
    </form>
</div>
<br/>
<br/>

<div class="col-md-12">
    <div class="collapse" id="how">
        <legend><i class="entypo-info-circled"></i>How to??</legend>
        <p>
            Select the Pages you want to make a menu . Grab the URL on your browser bar . Paste the link on input link page .
        </p>
    </div>
</div>
<script>
$(document).ready(function(){
    $("#btn-how").click(function(){
        $("#how").collapse('toggle');
    });
});
</script>
