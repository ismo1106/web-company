<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Product</a>
        </li>
        <li class="active">
            <strong>Category</strong>
        </li>
    </ol>

    <h2>Category Product</h2>
    <br />

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-dark" data-collapsed="1">
                <div class="panel-heading">
                    <div class="panel-title">
                        New Category
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse" class="btn btn-default btn-xs">
                            <span class="text-primary"><i class="entypo-down-open"></i>  Create &nbsp;</span> 
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered validate" method="POST" action="<?php echo site_url('back/setupProductCategory/saveCategoryProduct'); ?>">
                        <div class="form-group">
                            <label for="inputCategory" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputCategory" name="txtCategory" data-validate="required" 
                                       data-message-required="Please insert this field!"  placeholder="Input Name Category">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">Type Product</label>
                            <div class="col-sm-5">
                                <select class="form-control select" name="selectType" id="inputType">
                                    <?php foreach ($_selectTypeProduct as $row): 
                                        echo '<option value="'.$row->id_type.'">'.$row->name_type.'</option>';
                                    endforeach; ?>
                                </select>
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
                        Category
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered datatable" id="table-category">
                        <thead>
                            <tr>
                                <th>Name Category</th>
                                <th>Type</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectCatProduct as $row): ?>
                                <tr >
                                    <td><?php echo $row->name_category_product; ?></td>
                                    <td><?php echo $row->name_type; ?></td>
                                    <td width="15%">
                                        <div class="text-left"><?php echo $row->created_by; ?></div>
                                        <div class="text-right small"><?php echo date('F d, Y H:i:s', strtotime($row->created_date)); ?></div>
                                    </td>
                                    <td width="15%">
                                        <?php if($row->updated_by !== ''): ?>
                                        <div class="text-left"><?php echo $row->updated_by; ?></div>
                                        <div class="text-right small"><?php echo date('F d, Y H:i:s', strtotime($row->updated_date)); ?></div>
                                        <?php else : echo 'Not Yet Updated'; endif;?>
                                    </td>
                                    <td class="text-center col-sm-3">
                                        <a href="#" class="edit btn btn-sm btn-success" data-id="<?php echo $row->id_category_product;?>">Update</a>
                                        <a href="#" class="delete btn btn-sm btn-danger" data-id="<?php echo $row->id_category_product;?>" >Delete</a>
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

<!-- Modal Edit Category (Custom Width)-->
<div class="modal fade" tabindex="-1" id="modal-editCategory">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Category Product</h4>
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
        $("#table-category").on("click", ".delete", function() {
            var id = $(this).data('id');
            bootbox.confirm("Are you sure?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/setupProductCategory/deleteCategoryProduct/'+id;
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
        tableContainer = $("#table-category");

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
            //var id = $(this).closest('tr').data('id');
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/setupProductCategory/ajaxCategoryProduct');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#loadFormEdit").html(msg);
                }
            });
            $("#modal-editCategory").modal("show");
        });
        
    });
</script>