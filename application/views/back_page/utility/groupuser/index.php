<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Utility</a>
        </li>
        <li class="active">
            <strong>Group User</strong>
        </li>
    </ol>

    <h2>Group User</h2>
    <br />

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-dark" data-collapsed="1">
                <div class="panel-heading">
                    <div class="panel-title">
                        Add Group User
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse" class="btn btn-default btn-xs">
                            <span class="text-primary"><i class="entypo-down-open"></i>  Add &nbsp;</span> 
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url('back/groupuser/insertGroupuser'); ?>">
                        
                        <div class="form-group">
                            <label for="inputCategory" class="col-sm-3 control-label">Group Name *</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputGroupuser" name="txtGroupuser" data-validate="required" 
                                       data-message-required="Please insert this field!"  placeholder="Please Input Name Group User">
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
                        Group User
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered datatable" id="table-groupuser">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th class="text-center">Active</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectGroupuser as $row): ?>
                            <tr>
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
                                    <a href="#" class="edit btn btn-sm btn-success" data-id="<?php echo $row->group_id;?>">Update</a>
                                    <a href="#" class="access btn btn-sm btn-info" data-id="<?php echo $row->group_id;?>">Access</a>
                                    <a href="#" class="delete btn btn-sm btn-danger" data-id="<?php echo $row->group_id;?>" >Delete</a>
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
<div class="modal fade" tabindex="-1" id="modal-editGroupuser">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="titleModal">Loading...</h4>
            </div>

            <div class="modal-body">
                <div id="loadFormEdit">
                    Content is loading....
                </div>                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($) {
        $("#table-groupuser").on("click", ".delete", function() {
            var id = $(this).data('id');
            bootbox.confirm("If you click OK, your data has deleted permanenly. Are you sure?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/groupuser/deleteGroupuser/'+id;
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
        tableContainer = $("#table-groupuser");

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
                url:"<?php echo site_url('back/groupuser/ajaxEditGroupuser');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#loadFormEdit").html(msg);
                    document.getElementById('titleModal').innerHTML = 'Edit Group User';
                }
            });
            $("#modal-editGroupuser").modal("show");
        });
        
        tableContainer.on("click", ".access", function() {
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/groupuser/ajaxAccessGroupuser');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#loadFormEdit").html(msg);
                    document.getElementById('titleModal').innerHTML = 'Access Menu Group User';
                }
            });
            $("#modal-editGroupuser").modal("show");
        });
        
    });
</script>