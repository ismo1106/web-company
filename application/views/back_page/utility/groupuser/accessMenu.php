<form role="form" class="form-horizontal form-groups-bordered" action="<?php echo site_url('back/accessMenu/setAccess'); ?>" method="POST" id="inputFormMenuAccess" name="formMenuAccess">
    <div class="form-group">
        <label for="inputCategory" class="col-sm-4 control-label">Access for Group user</label>
        <div class="col-sm-8">
            <?php foreach ($_getGroupuser as $row): ?>
            <input class="form-control" type="text" name="txtGroupuser" id="inputGroupuser" value="<?php echo $row->group_name;?>" readonly="" />
            <input class="form-control" type="hidden" name="selGroupID" id="inputGroupID" value="<?php echo $row->group_id;?>" readonly=""/>
            <input class="form-control" type="hidden" name="txtActionFrom" id="inputActionFrom" value="1" readonly=""/>
            <?php endforeach; ?>
        </div>
    </div>
    
    <table class="table table-hover" id="tbl-accessmenu">
        <thead style="background: #303641;">
            <tr>
                <th class="text-center" style="width: 20%;">
                    <input type="checkbox" id="chkTop">
                </th>
                <th style="color: #aaabae; font-weight: bold;">Menu Another</th>
            </tr>
        </thead>
        <tbody style="background: #909aad; color: #000;">
            <?php foreach ($_selectMenu1 as $row1): ?>
                <tr>
                    <td class="text-center">
                        <input name="chkMenuID[]" type="checkbox" class="" value="<?php echo $row1->menu_id; ?>" 
                               <?php if($row1->acc == 1){ echo 'checked';}?> >
                    </td>
                    <td style="font-weight: bold;"><?php echo $row1->menu_icon; ?> <?php echo $row1->menu_label; ?></td>
                </tr>
                <?php foreach ($_selectMenu2 as $row2): ?>
                    <?php if ($row2->menu_header == $row1->menu_id): ?>
                        <tr>
                            <td class="text-center">
                                <input name="chkMenuID[]" type="checkbox" class="" value="<?php echo $row2->menu_id; ?>" 
                                       <?php if($row2->acc == 1){ echo 'checked';}?> >
                            </td>
                            <td style="padding-left: 35px;"> <?php echo $row2->menu_icon; ?> <?php echo $row2->menu_label; ?></td>
                        </tr>
                        <?php foreach ($_selectMenu3 as $row3): ?>
                            <?php if ($row3->menu_header == $row2->menu_id): ?>
                                <tr>
                                    <td class="text-center">
                                        <input name="chkMenuID[]" type="checkbox" class="" value="<?php echo $row3->menu_id; ?>" 
                                               <?php if($row3->acc == 1){ echo 'checked';}?> >
                                    </td>
                                    <td style="padding-left: 65px;"> <?php echo $row2->menu_icon; ?> <?php echo $row3->menu_label; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="form-group">
        <button class="btn btn-sm btn-primary btn-block" type="submit">
            <i class="fa fa-save"></i> Submit
        </button>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        var active_class = 'active';
        $('#tbl-accessmenu > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });
    });
</script>