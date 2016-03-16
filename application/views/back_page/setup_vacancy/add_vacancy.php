<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Jobs Vacancy</a>
        </li>
        <li class="active">
            <strong>Add Vacancy</strong>
        </li>
    </ol>

    <h2>Create New Vacancy</h2>
    <br />
    <input id="inputThisURL" type="hidden" value="<?php echo $_thisURL;?>" >
    <form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="<?php echo site_url('back/SetupVacancy/saveVacancy');?>">
        <div class="form-group" >
            <label for="inputTitlePost" class="col-sm-1 control-label">Title Post</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputTitlePost" name="txtTitlePost" placeholder="Input Title" data-validate="required"
                       data-message-required="Please insert this field!">
            </div>
        </div>
        
        <div class="form-group" >
            <div id="media-roll" class="col-sm-offset-1 col-sm-5">
                <a href="#" class="select-media btn btn-primary btn-sm"><i class="entypo-picture"></i> Select Picture</a>
                <a href="#" class="add-media btn btn-primary btn-sm"><i class="entypo-picture"></i> Add Picture</a>
            </div>
        </div>

        <div class="form-group" >
            <div class="col-sm-9">
                <textarea id="inputPostValue" name="txtPostValue" class="form-control ckeditor"></textarea>
            </div>

            <div class="col-sm-3">
                <label for="inputCategory" class="control-label">Closing Date</label>
                <div class="input-group">
                    <input type="text" class="form-control datepicker" name="txtDateClosing" data-start-view="2" data-format="dd-mm-yyyy" data-mask="d-m-y" placeholder="Input Date Closing..">
                    <div class="input-group-addon">
                        <a href="#"><i class="entypo-calendar"></i></a>
                    </div>
                </div>
                <br/>
                <label for="inputCategory" class="control-label">Category</label>
                <select id="inputCategory" name="selCategory" class="form-control select" >
                    <option value=""> Choose... </option>
                    <?php
                    foreach ($_selectCategory as $rowCat):
                        echo "<option value='$rowCat->id_category'>$rowCat->name_category</option>";
                    endforeach;
                    ?>
                </select>
                <br/>
                <label for="inputStatusPost" class="control-label">Posted</label>
                <select id="inputStatusPost" name="selStatusPost" class="form-control select">
                    <option value="1">Publish</option>
                    <option value="0">Save as Draft</option>
                </select>
                <br/>
                <label for="txtNickname" class="control-label">Login as</label>
                <input type="text" class="form-control" id="txtNickname" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
                <br/>
                <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp; Save</button>
            </div>
        </div>
    </form>
</div>

<!-- Modal Select Media (Custom Width)-->
<div class="modal fade custom-width" tabindex="-1" id="modal-selectMedia">
    <div class="modal-dialog" style="width: 80%;">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select Media</h4>
            </div>

            <div class="modal-body">
                <div id="loadSelectMedia">
                    <!--Content is loading...-->
                </div>                
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Media (Custom Width)-->
<div class="modal fade" tabindex="-1" id="modal-addMedia">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Media</h4>
            </div>

            <div class="modal-body">
                <div id="loadAddMedia">
                    <!--Content is loading...-->
                </div>                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var divMediaRoll;
    jQuery(document).ready(function($) {
        divMediaRoll    = $("#media-roll");
        divMediaRoll.on("click", ".select-media", function() {
            $.ajax({
                url:"<?php echo site_url('back/post/ajaxSelectMedia');?>",
                cache:false,
                success:function(msg){
                    $("#loadSelectMedia").html(msg);
                }
            });
            $("#modal-selectMedia").modal("show");
        });
        
        divMediaRoll.on("click", ".add-media", function() {
            var url = document.getElementById('inputThisURL').value;
            $.ajax({
                type: 'POST',
                url:"<?php echo site_url('back/post/ajaxAddMedia');?>",
                data: 'url='+url,
                cache:false,
                success:function(msg){
                    $("#loadAddMedia").html(msg);
                }
            });
            $("#modal-addMedia").modal("show");
        });
    });
</script>
<script src="<?php echo base_url(); ?>assets/back/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/jquery.inputmask.bundle.min.js"></script>

<script src="<?php echo base_url(); ?>assets/back/js/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/ckeditor/adapters/jquery.js"></script>
