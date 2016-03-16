<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Setting</a>
        </li>
        <li class="active">
            <strong>Profile</strong>
        </li>
    </ol>

    <div class="row">
        <div class="col-sm-12">
            <form role="form" method="post" class="form-horizontal validate" action="<?php echo site_url('back/setting/submitSetting'); ?>">
                <?php foreach ($_getSetting as $row): ?>
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h2>Company Profile</h2>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="inputTitlePost" class="col-sm-3 control-label">Company *</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputCompany" name="txtCompany" placeholder="Input Company" data-validate="required"
                                           data-message-required="Please insert this field!" value="<?php echo $row->name_company; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTitlePost" class="col-sm-3 control-label">Display Name *</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputDisplayName" name="txtDisplayName" placeholder="Input Display Name" data-validate="required"
                                           data-message-required="Please insert this field!" value="<?php echo $row->display_company; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTitlePost" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-6">
                                    <textarea id="txtAddress" name="txtAddress" class="form-control"><?php echo $row->address; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTitlePost" class="col-sm-3 control-label">Work Hours</label>
                                <div class="col-sm-6">
                                    <textarea id="txtWorkHour" name="txtWorkHour" class="form-control"><?php echo $row->work_time; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Contact
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Phone 1</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-phone"></i></span>
                                        <input type="text" data-mask="+99(99) 99 99999" class="form-control" placeholder="Input First Phone" id="inputPhone1" name="txtPhone1" value="<?php echo $row->phone1; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Phone 2</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-phone"></i></span>
                                        <input type="text" data-mask="+99(99) 99 99999" class="form-control" placeholder="Input Second Phone" id="inputPhone2" name="txtPhone2" value="<?php echo $row->phone2; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Fax</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-print"></i></span>
                                        <input type="text" data-mask="+99(99) 99 99999" class="form-control" placeholder="Input Fax" id="inputFax" name="txtFax" value="<?php echo $row->fax; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                        <input type="text" class="form-control" placeholder="Input Email" id="inputEmail" name="txtEmail" data-validate="email"
                                           data-message-required="Please input valid email!" value="<?php echo $row->email; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Twitter</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-twitter"></i></span>
                                        <input type="text" class="form-control" placeholder="Input Twitter" id="inputTwitter" name="txtTwitter" value="<?php echo $row->twitter; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Facebook</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-facebook"></i></span>
                                        <input type="text" class="form-control" placeholder="Input Facebook" id="inputFacebook" name="txtFacebook" value="<?php echo $row->facebook; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Instagram</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-instagram"></i></span>
                                        <input type="text" class="form-control" placeholder="Input Instagram" id="inputInstagram" name="txtInstagram" value="<?php echo $row->instagram; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Google<sup>+</sup></label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="entypo-gplus"></i></span>
                                        <input type="text" class="form-control" placeholder="Input Google Plus" id="inputGooglePlus" name="txtGooglePlus" value="<?php echo $row->google_plus; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTitlePost" class="col-sm-3 control-label">
                                    Maps Coordinate <i class="fa fa-map-marker bigger-110"></i>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputLongitude" name="txtLongitude" value="<?php echo $row->longitude_map; ?>" placeholder="Longitude, ex : -6.1312765">
                                    <div class="input-group minimal">
                                        <input type="text" class="form-control" id="inputLatitude" name="txtLatitude" value="<?php echo $row->latitude_map; ?>" placeholder="Latiitude, ex : 106.8038402">
                                        <div class="input-group-addon">
                                            <a href="javascript:;" onclick="jQuery('#modal-helper').modal('show');" class="popover-primary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Click here to review how you determine the coordinates of the map.." data-original-title="How to??">?</a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="inputTitlePost" class="col-sm-3 control-label">Login as</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputCurrentUser" name="txtCurrentUser" value="<?php echo $this->session->userdata('nickname'); ?>" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button class="btn btn-sm btn-primary" name="btnSave" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>
<!-- Modal 4 (Confirm)-->
<div class="modal fade" id="modal-helper" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">How to?</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <p>How do I determine the coordinates ? You can use the following ways :</p>
                        <div class="img-responsive">
                            <img src="<?php echo base_url();?>assets/images/MapHelper.png" class="img-responsive img-rounded" alt="Map Helper" />
                        </div>
                    </div>
                    <div class="clearfix"><br/></div>
                    <div class="col-sm-12">
                        <ol>
                            <li>
                                Find your address on <a href="http://maps.google.com/" target="_blank">Google Maps</a>. Like the one in the picture above.
                            </li>
                            <li>
                                Determine the coordinates of the point where the address you are. Such as the hint above.
                            </li>
                            <li>
                                If appropriate then you will get the coordinates of your address such as point number three.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/back/js/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/back/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        toolbar: ['undo redo | styleselect | bold italic | alignleft aligncenter alignright | code'],
        plugins: ['visualchars', 'wordcount', 'code']
    });
</script>