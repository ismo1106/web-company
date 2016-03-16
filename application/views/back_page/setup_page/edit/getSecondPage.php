<select id="inputSubHeaderPage" name="selectSubHeaderPage" class="form-control select">
    <option value="">Choose...</option>
    <?php foreach ($_selectSecondPage as $row): ?>
        <option value="<?php echo $row->id_page ?>"><?php echo $row->label_page; ?></option>
    <?php endforeach; ?>
</select>