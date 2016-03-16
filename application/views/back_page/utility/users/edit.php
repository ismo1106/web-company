<script type="text/javascript">
$(document).ready( function () {
    $("#form-editusers").validate( {
        rules: {
            txtUsername: {
                required: true,
                pattern: /^[a-z0-9\-\_\.]+$/
            },
            txtNickname: {
                required: true,
                pattern: /^[a-zA-Z0-9]+$/
            },
            txtPassword: {
                required: true,
                pattern: /^[a-z0-9]+$/
            },
            selGroupuser: {
                required: true
            }
        },
        messages: {
            txtUsername: {
                required: 'Please insert this field!',
                pattern: 'Letters, Numbers, and Special Character: [dash(-), underscore(_), dot(.)] only'
            },
            txtNickname: {
                required: 'Please insert this field!',
                pattern: 'Alpha, Numbers only (Not use space)'
            },
            txtPassword: {
                required: 'Please insert this field!',
                pattern: 'Letters and Numbers only'
            },
            selGroupuser: {
                required: 'Please select Group User!'
            }
        },
        errorElement: "span",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "validate-has-error" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "validate-has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "validate-has-error" );
        }
    });
});
</script>
<form id="form-editusers" role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url('back/users/updateUsers'); ?>">
    <?php foreach ($_getUsers as $row): ?>
    <div class="form-group">
        <label for="inputUsername" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputUsername" name="txtUsername" placeholder="Please Input Username" value="<?php echo $row->username;?>" readonly="">
        </div>
    </div>
    <div class="form-group">
        <label for="inputUsername" class="col-sm-3 control-label">Nickname</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputNickname" name="txtNickname" placeholder="Please Input Nickname" value="<?php echo $row->nickname;?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-3 control-label">Group User</label>
        <div class="col-sm-9">
            <select name="selGroupuser" id="inputGroupuser" class="form-control">
                <option value=""> Choose...</option>
                <?php foreach ($_selectGroupuser as $rowGroup): ?>
                    <?php if($row->group_id == $rowGroup->group_id):?>
                        <option value="<?php echo $rowGroup->group_id; ?>" selected> <?php echo $rowGroup->group_name; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $rowGroup->group_id; ?>"> <?php echo $rowGroup->group_name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="field-2" class="col-sm-3 control-label">Active ?*</label>
        <div class="col-sm-9">
            <div class="radio">
                <label>
                    <input type="radio" name="radActive" id="optionsRadios1" value="1" <?php if($row->active == 1){ echo 'checked';}?>>Yes
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="radActive" id="optionsRadios2" value="0" <?php if($row->active == 0){ echo 'checked';}?>>No
                </label>
            </div>
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
            <button type="submit" class="btn btn-primary" name="saveCategory">Update</button>
        </div>
    </div>
    <?php endforeach; ?>
</form>