<select id="inputCategory" name="selectCategory" class="form-control select" >
    <option value=""> Choose... </option>
    <?php
    foreach ($_selectCategory as $row):
        echo '<option value="' . $row->id_category_product . '">' . $row->name_category_product . '</option>';
    endforeach;
    ?>
</select>