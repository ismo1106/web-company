<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Page</a>
        </li>
        <li class="active">
            <strong>All Page's</strong>
        </li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-invert" data-collapsed="0">
                <div class="panel-body">
                    <div class="col-md-6">
                        <legend>Top Bar Menu</legend>
                        <a class="btn btn-sm btn-default" href="javascript:;" onclick="showFirstModal();" >Add First Page</a>
                        <a class="btn btn-sm btn-default" href="javascript:;" onclick="showSecondModal();" >Add Second Page</a>
                        <a class="btn btn-sm btn-default" href="javascript:;" onclick="showThirdModal();" >Add Third Page</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <legend>Footer Menu</legend>
                        <a class="btn btn-sm btn-default" href="javascript:;" onclick="showFooterModal();" >Add Footer Page</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-dark" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Top Bar Menu
                    </div>
                </div>
                <div class="panel-body">
                    <div class=" table-responsive">
                        <table class="table table-bordered datatable" id="tbl-allPage">
                            <thead>
                                <tr>
                                    <th>First Page</th>
                                    <th>First Link</th>
                                    <th>Second Page</th>
                                    <th>Second Link</th>
                                    <th>Third Page</th>
                                    <th>Third Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_selectPage as $row):?>
                                    <tr>
                                        <td>
                                            <?php if($row->label2 ==  NULL): ?>
                                                <em>NULL</em>
                                            <?php else: ?>
                                                <?php if($row->active1 ==  0): ?>
                                                    <span style="color: red;"><?php echo $row->label1;?>
                                                    <a id="getPage1" class="edit1 btn btn-sm btn-default" href="javascript:;" data-id="<?php echo $row->id1;?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a></span>
                                                <?php else: ?>
                                                    <span style="color: green;"><?php echo $row->label1;?>
                                                    <a id="getPage1" class="edit1 btn btn-sm btn-default" href="javascript:;" data-id="<?php echo $row->id1;?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row->label1 ==  NULL): ?>
                                                <em>NULL</em>
                                            <?php else: ?>
                                                <?php echo $row->link1;?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row->label2 ==  NULL): ?>
                                                <em>NULL</em>
                                            <?php else: ?>
                                                <?php if($row->active1 ==  0 || $row->active2 == 0): ?>
                                                    <span style="color: red;"><?php echo $row->label2;?>
                                                    <a id="getPage2" class="edit2 btn btn-sm btn-default" href="javascript:;" data-id="<?php echo $row->id2;?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a></span>
                                                <?php else: ?>
                                                    <span style="color: green;"><?php echo $row->label2;?>
                                                    <a id="getPage2" class="edit2 btn btn-sm btn-default" href="javascript:;" data-id="<?php echo $row->id2;?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row->label2 ==  NULL): ?>
                                                <em>NULL</em>
                                            <?php else: ?>
                                                <?php echo $row->link2;?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row->label3 ==  NULL): ?>
                                                <em>NULL</em>
                                            <?php else: ?>
                                                <?php if($row->active1 ==  0 || $row->active2 == 0 || $row->active3 == 0): ?>
                                                    <span style="color: red;"><?php echo $row->label3;?>
                                                    <a id="getPage3" class="edit3 btn btn-sm btn-default" href="javascript:;" data-id="<?php echo $row->id3;?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a></span>
                                                <?php else: ?>
                                                    <span style="color: green;"><?php echo $row->label3;?>
                                                    <a id="getPage3" class="edit3 btn btn-sm btn-default" href="javascript:;" data-id="<?php echo $row->id3;?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($row->label3 ==  NULL): ?>
                                                <em>NULL</em>
                                            <?php else: ?>
                                                <?php echo $row->link3;?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="panel panel-dark" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Footer Bar Menu
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-hover" id="tbl-footerPage">
                            <tr>
                                <th>Menu ayout</th>
                                <th>Menu Label</th>
                                <th>Active</th>
                                <th>Link Menu</th>
                                <th>Option</th>
                            </tr>
                            <?php foreach ($_selectFooter as $row): ?>
                            <tr>
                                <td>
                                    <?php if($row->category_page == 1){ echo 'at Left';}else{ echo 'in the Middle';} ?>
                                </td>
                                <td>
                                    <?php echo $row->label_page?>
                                </td>
                                <td>
                                    <?php if($row->active == 1): ?>
                                    <a href="javascript:;" class="btn btn-xs btn-success">Active</a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="btn btn-xs btn-danger">Not Active</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $row->link_page;?>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" class="edit btn btn-sm btn-success" data-id="<?php echo $row->id_page;?>">Update</a>
                                    <a href="javascript:;" class="btn btn-sm btn-info">Preview</a>
                                    <a href="javascript:;" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script type="text/javascript">
    function showFirstModal() {
        jQuery('#modalAddPage').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupPage/ajaxFirstPage'); ?>",
            success: function(response){
                jQuery('#modalAddPage .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add First Page';
            }
        });
    }
    function showSecondModal() {
        jQuery('#modalAddPage').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupPage/ajaxSecondPage'); ?>",
            success: function(response){
                jQuery('#modalAddPage .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Second Page';
            }
        });
    }
    function showThirdModal() {
        jQuery('#modalAddPage').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupPage/ajaxThirdPage'); ?>",
            success: function(response){
                jQuery('#modalAddPage .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Third Page';
            }
        });
    }
    
    function showFooterModal() {
        jQuery('#modalAddPage').modal('show', {backdrop: 'static'});
        $.ajax({
            url: "<?php echo base_url('back/setupPage/ajaxFooterPage'); ?>",
            success: function(response){
                jQuery('#modalAddPage .modal-body').html(response);
                document.getElementById('titleModal').innerHTML = 'Add Footer Page';
            }
        });
    }
</script>
<!-- -------- Modal Add Page -------- -->
<div class="modal fade" id="modalAddPage">
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

<script type="text/javascript">
    $('#tbl-allPage').on("click", ".edit1", function() {
        var id = $(this).data('id');
        $.ajax({
            url:"<?php echo site_url('back/setupPage/ajaxEditFirstPage');?>",
            type:"POST",
            data:"kode="+id,
            datatype:"json",
            cache:false,
            success:function(msg){
                $("#modalEditPage .modal-body").html(msg);
                document.getElementById('titleModalEdit').innerHTML = 'Edit First Page';
            }
        });
        $("#modalEditPage").modal("show");
    });
    $('#tbl-allPage').on("click", ".edit2", function() {
        var id = $(this).data('id');
        $.ajax({
            url:"<?php echo site_url('back/setupPage/ajaxEditSecondPage');?>",
            type:"POST",
            data:"kode="+id,
            datatype:"json",
            cache:false,
            success:function(msg){
                $("#modalEditPage .modal-body").html(msg);
                document.getElementById('titleModalEdit').innerHTML = 'Edit Second Page';
            }
        });
        $("#modalEditPage").modal("show");
    });
    $('#tbl-allPage').on("click", ".edit3", function() {
        var id = $(this).data('id');
        $.ajax({
            url:"<?php echo site_url('back/setupPage/ajaxEditThirdPage');?>",
            type:"POST",
            data:"kode="+id,
            datatype:"json",
            cache:false,
            success:function(msg){
                $("#modalEditPage .modal-body").html(msg);
                document.getElementById('titleModalEdit').innerHTML = 'Edit Third Page';
            }
        });
        $("#modalEditPage").modal("show");
    });
    
    $('#tbl-footerPage').on("click", ".edit", function() {
        var id = $(this).data('id');
        $.ajax({
            url:"<?php echo site_url('back/setupPage/ajaxEditFooterPage');?>",
            type:"POST",
            data:"kode="+id,
            datatype:"json",
            cache:false,
            success:function(msg){
                $("#modalEditPage .modal-body").html(msg);
                document.getElementById('titleModalEdit').innerHTML = 'Edit Footer Page';
            }
        });
        $("#modalEditPage").modal("show");
    });
</script>
<!-- -------- Modal Edit Page -------- -->
<div class="modal fade" id="modalEditPage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="titleModalEdit">Edit </h4>
            </div>

            <div class="modal-body">
                Content is loading...
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var responsiveHelper;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };
    var tableContainer;

    jQuery(document).ready(function($)
    {
        tableContainer = $("#tbl-allPage");
        tableContainer.dataTable();
    });
    
</script>
