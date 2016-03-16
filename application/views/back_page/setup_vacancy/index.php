<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Jobs Vacancy</a>
        </li>
        <li class="active">
            <strong>All Vacancy</strong>
        </li>
    </ol>

    <h2>List Vacancy</h2>
    <br />

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-dark" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <a href="<?php echo site_url('back/setupVacancy/addVacancy');?>" class="btn btn-sm btn-default">
                            <span class="text-primary">Add Vacancy</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-bordered datatable" id="table-allPost">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Publish</th>
                                <th>Closing Date</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_selectVacancy as $row): ?>
                                <tr>
                                    <td><?php echo $row->name_category; ?></td>
                                    <td><?php echo $row->title_jobs; ?></td>
                                    <td>
                                        <?php if ($row->publish == 1) : ?>
                                            <div class="label label-success">Publish</div>
                                        <?php else: ?>
                                            <div class="label label-danger">Draft</div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo date('F, d Y', strtotime($row->closed_date)); ?></td>
                                    <td>
                                        <div class="text-left"><?php echo $row->created_by; ?></div>
                                        <div class="text-right small"><?php echo $row->created_date; ?></div>
                                    </td>
                                    <td>
                                        <?php if ($row->updated_by == NULL) :
                                            echo 'Not Yet Updated';
                                        else:
                                            ?>
                                            <div class="text-left"><?php echo $row->updated_by; ?></div>
                                            <div class="text-right small"><?php echo $row->updated_date; ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center col-sm-3">
                                        <a href="#" class="edit btn btn-sm btn-success btn-icon" data-id="<?php echo $row->id_vacancy; ?>">
                                            <i class="fa fa-edit"></i>Update</a>
                                        <?php
                                        $idVacancy  = $row->id_vacancy;
                                        $encID      = $this->encrypt->encode($idVacancy);
                                        $encryptID  = str_replace(array('+', '/', '='), array('-', '_', '~'), $encID);
                                        ?>
                                        <a href="#" class="view btn btn-sm btn-info btn-icon" data-id="<?php echo $encryptID; ?>">
                                            <i class="fa fa-external-link"></i>View </a>
                                        <a href="#" class="delete btn btn-sm btn-danger btn-icon icon-left" data-id="<?php echo $row->id_vacancy; ?>" data-cat="<?php echo $row->id_category; ?>">
                                            <i class="fa fa-times"></i>Delete </a>
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
        $("#table-allPost").on("click", ".edit", function() {
            var id = $(this).data('id');
            window.location = '<?php echo site_url(); ?>back/SetupVacancy/viewEditVacancy/' + id;
        });
        
        $("#table-allPost").on("click", ".view", function() {
            var id = $(this).data('id');
            window.open('<?php echo site_url(); ?>front/jobVacancy/detail/'+id,'_blank');
        });
                
        $("#table-allPost").on("click", ".delete", function() {
            var idP = $(this).data('id');
            var idC = $(this).data('cat');
            bootbox.confirm("Are you sure?", function(result) {
                if(result) {
                    window.location='<?php echo site_url();?>back/post/sasa/'+idP+'/'+idC;
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