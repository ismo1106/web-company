<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Product</a>
        </li>
        <li class="active">
            <strong>All Product</strong>
        </li>
    </ol>

    <h2>List All Product</h2>
    <br />

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-dark" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a href="<?php echo site_url('back/setupProduct/index');?>" class="btn btn-sm btn-default">
                            <span class="text-primary">Add Product</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-bordered datatable" id="table-allProduct">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Publish</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectProduct as $row): ?>
                            <tr>
                                <td><?php echo $row->name_product;?></td>
                                <td><?php echo $row->name_type;?></td>
                                <td><?php echo $row->name_category_product;?></td>
                                <td>
                                    <?php if ($row->publish == 1) : ?>
                                        <a href="#" class="draft btn btn-xs btn-success" data-id="<?php echo $row->id_product; ?>">
                                        Publish</a>
                                    <?php else: ?>
                                        <a href="#" class="draft btn btn-xs btn-danger" data-id="<?php echo $row->id_product; ?>">
                                        Draft</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="text-left"><?php echo $row->created_by;?></div>
                                    <div class="text-right small"><?php echo $row->created_date;?></div>
                                </td>
                                <td><?php if($row->updated_by == NULL): echo 'Not Yet Updated'; else:?>
                                    <div class="text-left"><?php echo $row->updated_by;?></div>
                                    <div class="text-right small"><?php echo $row->updated_date;?></div><?php endif;?>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="edit btn btn-sm btn-success btn-icon" data-id="<?php echo $row->id_product; ?>">
                                        <i class="fa fa-edit"></i>Update</a>
                                    <?php
                                    $idPost     = $row->id_product;
                                    $encID      = $this->encrypt->encode($idPost);
                                    $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                                    ?>
                                    <a href="#" class="view btn btn-sm btn-info btn-icon" data-id="<?php echo $encryptID; ?>" data-type="<?php echo $row->type_product; ?>">
                                        <i class="fa fa-external-link"></i>View
                                    </a>
                                    <a href="#" class="delete btn btn-sm btn-danger btn-icon icon-left" data-id="<?php echo $row->id_product; ?>">
                                        <i class="fa fa-times"></i>Delete
                                    </a>
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

<script type="text/javascript">
    jQuery(function($) {
        $("#table-allProduct").on("click", ".draft", function() {
            var id = $(this).data('id');
            window.location = '<?php echo site_url(); ?>back/SetupProduct/setPublishProduct/' + id;
        });
        
        $("#table-allProduct").on("click", ".edit", function() {
            var id = $(this).data('id');
            window.location = '<?php echo site_url(); ?>back/SetupProduct/viewEditProduct/' + id;
        });
        
        $("#table-allProduct").on("click", ".view", function() {
            var id      = $(this).data('id');
            var type    = $(this).data('type');
            
            if(type === 1){
                var uri = "consumerproduct";
            }else{
                uri = "industrialproduct";
            }
            window.open('<?php echo site_url(); ?>front/'+uri+'/detail/'+id,'_blank');
        });
                
        $("#table-allProduct").on("click", ".delete", function() {
            var id = $(this).data('id');
            bootbox.confirm("Are you sure?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/SetupProduct/deleteProduct/'+id;
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
        tableContainer = $("#table-allProduct");

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
                
    });
</script>