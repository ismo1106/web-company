<style>
    .ismo-list{
        display: inline-block;
        color: #93979e;
    }
    .ismo-item{
        color: #93979e;
        padding-left: 5px;
        padding-right: 20px;
        padding-bottom: 5px;
        font-size: 13px;
    }
    .ismo-current{
        font-weight: bold;
    }
</style>
<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Comment</a>
        </li>
        <li class="active">
            <strong>Management Comment</strong>
        </li>
    </ol>

    <h2>List Comment</h2>
    <br />

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark" data-collapsed="0">
                <div class="panel-body table-responsive">
                    <legend>
                        <div class="ismo-list">
                            <a class="ismo-item" href="<?php echo base_url('back/comment/index');?>">
                                <span class="<?php if($_current == 9){ echo 'ismo-current';}?>">All</span></a>
                            <a class="ismo-item" href="<?php echo base_url('back/comment/index/Approved');?>">
                                <span class="<?php if($_current == 1){ echo 'ismo-current';}?>">Approved</span></a>
                            <a class="ismo-item" href="<?php echo base_url('back/comment/index/NotYet');?>">
                                <span class="<?php if($_current == 0){ echo 'ismo-current';}?>">Waiting Approval</span></a>
                            <a class="ismo-item" href="<?php echo base_url('back/comment/commentTrashed');?>">
                                <span class="">Trashed</span></a>
                        </div>
                    </legend>
                    <table class="table table-bordered datatable" id="table-allPost">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>Comment By</th>
                                <th>Approved</th>
                                <th>Submit Date</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectComment as $row): ?>
                                <tr>
                                    <td><?php echo $row->title_post; ?></td>
                                    <td><?php echo ucwords(strtolower($row->comment_by)); ?></td>
                                    <td class="text-center"><?php if($row->approve == 1): ?>
                                        <a href="#" class="btn btn-xs btn-success">Approved</a>
                                        <?php else: ?>
                                        <a href="#" class="approve btn btn-xs btn-primary" data-id="<?php echo $row->id_comment; ?>" data-post="<?php echo $row->id_post; ?>">Approve</a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo date('F, d Y', strtotime($row->commnet_date)); ?></td>
                                    <td><?php echo $row->comment_email; ?></td>
                                    <td class="text-center col-sm-3">
                                        <?php
                                        $idPost     = $row->id_post;
                                        $encID      = $this->encrypt->encode($idPost);
                                        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                                        ?>
                                        <?php if($row->approve == 0){ $disable = 'disabled';}else{ $disable = '';}?>
                                        <a href="#" class="view btn btn-sm btn-info btn-icon <?php echo $disable;?>" data-id="<?php echo $encryptID; ?>">
                                            <i class="fa fa-external-link"></i>View </a>
                                        <a href="#" class="delete btn btn-sm btn-danger btn-icon icon-left" data-id="<?php echo $row->id_comment; ?>" data-post="<?php echo $row->id_post; ?>">
                                            <i class="fa fa-trash-o"></i>Delete </a>
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
        $("#table-allPost").on("click", ".approve", function() {
            var idComt = $(this).data('id');
            var idPost = $(this).data('post');
            bootbox.confirm("Are you sure will be approve this comment?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/comment/approveComment/'+idComt+'/'+idPost;
                }
            });
        });
        
        $("#table-allPost").on("click", ".view", function() {
            var id = $(this).data('id');
            window.open('<?php echo site_url(); ?>front/blogNews/of/'+id,'_blank');
        });
                
        $("#table-allPost").on("click", ".delete", function() {
            var idComt = $(this).data('id');
            var idPost = $(this).data('post');
            bootbox.confirm("Are you sure want delete this comment?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/comment/trashComment/'+idComt+'/'+idPost;
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

    jQuery(document).ready(function($)
    {
        tableContainer = $("#table-allPost");

        tableContainer.dataTable({
            "sPaginationType": "bootstrap",
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "bStateSave": true,
            // Responsive Settings
            bAutoWidth: false,
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

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>