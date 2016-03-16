<style>
    input[type=checkbox]{
        width: 15px;
        height: 15px;
    }
</style>

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
            <div class="panel panel-dark">
                <div class="panel-body">
                    <form action="<?php echo site_url('back/accessMenu/setAccess');?>" method="POST" id="inputFormMenuAccess" name="formMenuAccess">
                        <div class="col-sm-12">
                            <div class="form-group col-sm-offset-3 col-sm-6">
                                <select id="ddGroupuser" name="selGroupID" class="form-control" style="border-color: #303641;">
                                    <option value=""> Choose Group User...</option>
                                    <?php foreach ($_selectGroup as $row): ?>
                                    <option value="<?php echo $row->group_id;?>"> <?php echo $row->group_name;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input class="form-control" type="hidden" name="txtActionFrom" id="inputActionFrom" value="0" readonly=""/>
                            </div>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6 table-responsive" id="dimanic-table">
                            <table class="table table-hover" id="tbl-access">
                                <thead style="background: #303641;">
                                    <tr>
                                        <th class="text-center" style="width: 20%;">
                                            <input type="checkbox" id="chkTop">
                                        </th>
                                        <th style="color: #aaabae; font-weight: bold;">Menu</th>
                                    </tr>
                                </thead>
                                <tbody style="background: #909aad; color: #000;">
                                    <?php foreach ($_selectMenu1 as $row1): ?>
                                    <tr>
                                        <td class="text-center">
                                            <input name="chkMenuID[]" type="checkbox" class="" value="<?php echo $row1->menu_id;?>">
                                        </td>
                                        <td style="font-weight: bold;"><?php echo $row1->menu_icon;?> <?php echo $row1->menu_label;?></td>
                                    </tr>
                                        <?php foreach ($_selectMenu2 as $row2): ?>
                                            <?php if($row2->menu_header == $row1->menu_id): ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <input name="chkMenuID[]" type="checkbox" class="" value="<?php echo $row2->menu_id;?>">
                                                    </td>
                                                    <td style="padding-left: 35px;"> <?php echo $row2->menu_icon;?> <?php echo $row2->menu_label;?></td>
                                                </tr>
                                                <?php foreach ($_selectMenu3 as $row3): ?>
                                                    <?php if($row3->menu_header == $row2->menu_id): ?>
                                                        <tr>
                                                            <td class="text-center">
                                                                <input name="chkMenuID[]" type="checkbox" class="" value="<?php echo $row3->menu_id;?>">
                                                            </td>
                                                            <td style="padding-left: 65px;"> <?php echo $row2->menu_icon;?> <?php echo $row3->menu_label;?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-offset-3 col-sm-6">
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary btn-block" type="submit">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var active_class = 'active';
        $('#tbl-access > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });
    });
</script>
<script type="text/javascript">
    $("#ddGroupuser").change(function(){
        var selectValues = $("#ddGroupuser").val();
        if (selectValues > 0){
            var grupid = {grupid:$("#ddGroupuser").val()};
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('back/accessMenu/ajaxGetMenuByGroup')?>",
                data: grupid,
                success: function(msg){
                    $('#dimanic-table').html(msg);
                }
            });
        }
    });
</script>