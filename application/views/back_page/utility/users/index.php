<script type="text/javascript">
$(document).ready( function () {
    $("#form-groupuser").validate( {
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
<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Utility</a>
        </li>
        <li class="active">
            <strong>Users</strong>
        </li>
    </ol>

    <h2>Users</h2>
    <br />

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-dark" data-collapsed="1">
                <div class="panel-heading">
                    <div class="panel-title">
                        Add Users
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse" class="btn btn-default btn-xs">
                            <span class="text-primary"><i class="entypo-down-open"></i>  Add &nbsp;</span> 
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="form-groupuser" role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url('back/users/insertUsers'); ?>">
                        
                        <div class="form-group">
                            <label for="inputUsername" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputUsername" name="txtUsername" placeholder="Please Input Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsername" class="col-sm-3 control-label">Nickname</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputNickname" name="txtNickname" placeholder="Please Input Nickname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="inputPassword" name="txtPassword" placeholder="Please Input Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-3 control-label">Group User</label>
                            <div class="col-sm-5">
                                <select name="selGroupuser" id="inputGroupuser" class="form-control">
                                    <option value=""> Choose...</option>
                                    <?php foreach ($_selectGroupuser as $row):?>
                                    <option value="<?php echo $row->group_id;?>"> <?php echo $row->group_name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">Active ?*</label>
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
                            <label for="inputCreateBy" class="col-sm-3 control-label">Login as</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputCreateBy" name="txtCreateBy" value="<?php echo $this->session->userdata('nickname'); ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-primary" name="saveCategory">Save</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <div class="panel panel-dark" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Users
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered datatable" id="table-users">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nickname</th>
                                <th>Group User</th>
                                <th class="text-center">Active</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectUserlogin as $row): ?>
                            <tr>
                                <td><?php echo $row->username;?></td>
                                <td><?php echo $row->nickname;?></td>
                                <td><?php echo $row->group_name;?></td>
                                <td class="text-center">
                                    <?php if($row->active == 1) :?>
                                    <div class="label label-success">Active</div>
                                    <?php else: ?>
                                    <div class="label label-danger">Not Active</div>
                                    <?php endif; ?>
                                </td>
                                <td width="15%">
                                    <div class="text-left"><?php echo $row->created_by; ?></div>
                                    <div class="text-right smaller"><?php echo date('F d, Y H:i:s', strtotime($row->created_date)); ?></div>
                                </td>
                                <td width="15%">
                                    <?php if($row->updated_by == NULL):
                                        echo 'Not Yet Updated';
                                    else:?>
                                    <div class="text-left"><?php echo $row->updated_by; ?></div>
                                    <div class="text-right smaller"><?php echo date('F d, Y H:i:s', strtotime($row->updated_date)); ?></div>
                                    <?php endif;?>
                                </td>
                                <td class="text-center col-sm-3">
                                    <a href="#" class="edit btn btn-sm btn-success" data-id="<?php echo $row->username;?>">Update</a>
                                    <a href="#" class="reset btn btn-sm btn-orange" data-id="<?php echo $row->username;?>">Reset</a>
                                    <a href="#" class="delete btn btn-sm btn-danger" data-id="<?php echo $row->username;?>" >Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Edit Group User (Custom Width)-->
<div class="modal fade" tabindex="-1" id="modal-editUsers">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Users</h4>
            </div>

            <div class="modal-body">
                <div id="loadFormEdit">
                    <!--Content is loading...-->
                </div>                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($) {
        $("#table-users").on("click", ".delete", function() {
            var id = $(this).data('id');
            bootbox.confirm("Are you really want to delete permanently this User(<em>"+id+"</em>)?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/users/deleteUsers/'+id;
                }
            });
        });
        
        $("#table-users").on("click", ".reset", function() {
            var id = $(this).data('id');
            bootbox.confirm("Are you sure to be chage the password(<em>"+id+"</em>)?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/users/resetPassword/'+id;
                }
            });
        });
    });
</script>

<script type="text/javascript">
    var responsiveHelper;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };
    var tableContainer;

    jQuery(document).ready(function($) {
        tableContainer = $("#table-users");

        tableContainer.dataTable({
            "sPaginationType": "bootstrap",
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "bStateSave": true,
            // Responsive Settings
            "bAutoWidth": true,
            fnPreDrawCallback: function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper) {
                    responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
                }
            },
            fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                responsiveHelper.createExpandIcon(nRow);
            },
            fnDrawCallback: function(oSettings) {
                responsiveHelper.respond();
            }
        });
        
        tableContainer.on("click", ".edit", function() {
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/users/ajaxEditUsers');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#loadFormEdit").html(msg);
                }
            });
            $("#modal-editUsers").modal("show");
        });
    });
</script>