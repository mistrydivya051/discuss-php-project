<select class="form-control" id="category_id" name="category_id">
    <option>Select A category</option>
    <?php 
        include("./common/db.php");
        $query = "select * from category";
        $result = $conn->query($query);
        foreach ($result as $row) 
        {
        ?>
            <option value="<?php echo $row['id']; ?>"><?php echo ucfirst($row['name']); ?></option>
        <?php
        }
    ?>
</select>