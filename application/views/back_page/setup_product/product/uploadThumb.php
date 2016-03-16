<div class="main-content">
    <ol class="breadcrumb bc-3">
        <li>
            <a href=""><i class="entypo-home"></i>Home</a>
        </li>
        <li>
            <a href="">Product</a>
        </li>
        <li class="active">
            <strong>Upload Thumbnail</strong>
        </li>
    </ol>
    <?php foreach ($_getProduct as $row): ?>
    <div class="panel panel-dark" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">
                Upload Thumbnail Product, <strong><?php echo $row->name_product;?></strong>
            </div>
        </div>
        <div class="panel-body">
            <form role="form" method="post" class="form-horizontal form-groups-bordered validate" style="padding-top: 30px;"
                  action="<?php echo site_url('back/setupProduct/uploadThumbProduct'); ?>" enctype="multipart/form-data" >
                <input name="txtIdProduct" value="<?php echo $row->id_product;?>" type="hidden">
                <div class="form-group text-center table-responsive">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 500px; height: 300px" data-trigger="fileinput">
                            <img src="/SambuPage/assets/img/thumb-large.png" alt="..." class="img-rounded">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-responsive" style="max-width: 500px; max-height: 300px"></div>
                        <div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new btn btn-primary btn-xs">Select Image</span>
                                <span class="fileinput-exists btn btn-primary btn-xs">Change</span>
                                <input type="file" name="imgThumb" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-danger btn-xs fileinput-exists" data-dismiss="fileinput">
                                Remove
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-orange" type="submit">
                        <i class="fa fa-upload"></i>&nbsp; Upload
                    </button>
                    <a href="<?php echo base_url('back/setupProduct/viewUploadHeader');?>" class="btn btn-blue"> 
                        Skip &nbsp;<i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script src="<?php echo base_url(); ?>assets/back/js/fileinput.js"></script>