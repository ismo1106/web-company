<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Widget</a>
        </li>
        <li class="active">
            <strong>All Widget</strong>
        </li>
    </ol>

    <h2>List All Widget</h2>
    <br />

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-dark" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a href="javascript:;" class="btn btn-xs btn-default" onclick="showSliderModal();">
                            <span class="text-primary">Add Slider</span>
                        </a>
                        <a href="javascript:;" class="btn btn-xs btn-default" onclick="showQuotesModal();">
                            <span class="text-primary">Add Quotes</span>
                        </a>
                        <a href="javascript:;" class="btn btn-xs btn-default" onclick="showTagLineModal();">
                            <span class="text-primary">Add Tag Lines</span>
                        </a>
                        <a href="javascript:;" class="btn btn-xs btn-default" onclick="showProductTileModal();">
                            <span class="text-primary">Add Product Tile</span>
                        </a>
                        <a href="javascript:;" class="btn btn-xs btn-default" onclick="showPhilosophyModal();">
                            <span class="text-primary">Add Philosophy</span>
                        </a>
                    </div>
                    <div class="panel-options">
                        <a href="javascript:;" onclick="showSettingModal();" class="setting bg">
                            <i class="entypo-cog"></i>
                        </a>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-bordered datatable" id="table-widget">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Publish</th>
                                <th>Created By</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectWidget as $row): ?>
                            <tr>
                                <td><?php if($row->type_widget == 1){echo 'Slider';}elseif($row->type_widget == 2){echo 'Quotes';}
                                elseif($row->type_widget == 3){echo 'Tag Lines';}elseif($row->type_widget == 4){echo 'Product Tile';}
                                elseif($row->type_widget == 6){echo 'Philosophy';}?></td>
                                <td><?php echo $row->title_widget;?></td>
                                <td style="width: 30%;">
                                    <?php echo substr(strip_tags($row->description),0,150);?><?php if(mb_strlen($row->description)> 150){echo '...';}?>
                                </td>
                                <td>
                                    <?php if ($row->publish == 1) : ?>
                                        <div class="label label-success">Publish</div>
                                    <?php else: ?>
                                        <div class="label label-danger">Draft</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="text-left"><?php echo $row->created_by;?></div>
                                    <div class="text-right smaller"><?php echo $row->created_date;?></div>
                                </td>
                                <td>
                                    <?php 
                                        if($row->type_widget == 1){
                                            $wType = 'editSlider';
                                        }elseif ($row->type_widget == 2) {
                                            $wType = 'editQuote';
                                        }elseif ($row->type_widget == 3) {
                                            $wType = 'editTagLine';
                                        }elseif ($row->type_widget == 4) {
                                            $wType = 'editProductTile';
                                        }elseif ($row->type_widget == 6) {
                                            $wType = 'editPhilosophy';
                                        }
                                    ?>
                                    <a href="javascript:;" class="<?php echo $wType;?> btn btn-sm btn-success btn-icon" data-id="<?php echo $row->code_widget; ?>" >
                                        Update<i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="delete btn btn-sm btn-danger btn-icon icon-left" data-id="<?php echo $row->code_widget; ?>">
                                        Delete<i class="fa fa-times"></i>
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

<!-- Add Widget -->
<script type="text/javascript">
    function showSettingModal() {
        jQuery('#modalSetting').modal('show', {backdrop: 'static'});
    }

    function showSliderModal() {
        jQuery('#modalAdd').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupWidget/ajaxAddSlider'); ?>",
            success: function(response){
                jQuery('#modalAdd .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Slider';
            }
        });
    }

    function showQuotesModal() {
        jQuery('#modalAdd').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupWidget/ajaxAddQuote'); ?>",
            success: function(response){
                jQuery('#modalAdd .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Quotes';
            }
        });
    }

    function showTagLineModal() {
        jQuery('#modalAdd').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupWidget/ajaxAddTagLine'); ?>",
            success: function(response){
                jQuery('#modalAdd .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Tag Lines';
            }
        });
    }

    function showProductTileModal() {
        jQuery('#modalAdd').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupWidget/ajaxAddProductTile'); ?>",
            success: function(response){
                jQuery('#modalAdd .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Product Tile';
            }
        });
    }
    
    function showPhilosophyModal() {
        jQuery('#modalAdd').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupWidget/ajaxAddPhilosophy'); ?>",
            success: function(response){
                jQuery('#modalAdd .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Philodophy Widget';
            }
        });
    }
</script>
<div class="modal fade" id="modalAdd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="titleModal">Add </h4>
            </div>

            <div class="modal-body">
                Content is loading...
            </div>
        </div>
    </div>
</div>

<!-- Edit Widget -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#table-widget").on("click", ".editSlider", function() {
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/setupWidget/ajaxEditSlider');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#bodyEdit").html(msg);
                    document.getElementById('titleModalEdit').innerHTML = 'Edit Slider';
                    
                }
            });
            $("#modalEdit").modal("show");
        });

        $("#table-widget").on("click", ".editQuote", function() {
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/setupWidget/ajaxEditQuote');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#bodyEdit").html(msg);
                    document.getElementById('titleModalEdit').innerHTML = 'Edit Quotes';
                    
                }
            });
            $("#modalEdit").modal("show");
        });

        $("#table-widget").on("click", ".editTagLine", function() {
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/setupWidget/ajaxEditTagLine');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#bodyEdit").html(msg);
                    document.getElementById('titleModalEdit').innerHTML = 'Edit Tag Lines';
                    
                }
            });
            $("#modalEdit").modal("show");
        });

        $("#table-widget").on("click", ".editProductTile", function() {
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/setupWidget/ajaxEditProductTile');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#bodyEdit").html(msg);
                    document.getElementById('titleModalEdit').innerHTML = 'Edit Product Tile';
                    
                }
            });
            $("#modalEdit").modal("show");
        });
        
        $("#table-widget").on("click", ".editPhilosophy", function() {
            var id = $(this).data('id');
            $.ajax({
                url:"<?php echo site_url('back/setupWidget/ajaxEditPhilosophy');?>",
                type:"POST",
                data:"kode="+id,
                datatype:"json",
                cache:false,
                success:function(msg){
                    $("#bodyEdit").html(msg);
                    document.getElementById('titleModalEdit').innerHTML = 'Edit Philosophy Widget';
                    
                }
            });
            $("#modalEdit").modal("show");
        });
    });
</script>
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="titleModalEdit">Add </h4>
            </div>

            <div class="modal-body" id="bodyEdit">
                Content is loading...
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSetting">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="titleModal">Setting Widget</h4>
            </div>

            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-TypeWidget">
                        <thead>
                            <tr>
                                <th>Widget</th>
                                <th>Max Display</th>
                                <th class="text-center">Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectWidgetType as $row): ?>
                            <tr>
                                <td><?php echo $row->name_widget;?></td>
                                <td><?php echo $row->max_display;?> Last Item</td>
                                <td class="text-center">
                                    <a href="javascript:;" data-id="<?php echo $row->id_widget;?>" class="active-widget btn btn-xs <?php if($row->active == 1){echo "btn-success";}else{ echo "btn-danger";}?>">
                                        <?php if($row->active == 1){echo "Active";}else{ echo "Not Active";}?>
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
        $("#table-TypeWidget").on("click", ".active-widget", function() {
            var id = $(this).data('id');
            window.location = '<?php echo site_url(); ?>back/setupWidget/setActive/' + id;
        });

        $("#table-widget").on("click", ".draft", function() {
            var id = $(this).data('id');
            window.location = '<?php //echo site_url(); ?>back/SetupProduct/setPublishProduct/' + id;
        });
                
        $("#table-widget").on("click", ".delete", function() {
            var id = $(this).data('id');
            bootbox.confirm("Are you sure?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/SetupProduct/hgtjhg/'+id;
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
        tableContainer = $("#table-widget");

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