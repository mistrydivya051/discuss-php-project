<div>
    <h1 class="heading">Categories</h1>
    <?php
        include("./common/db.php");
        $catlist = "select * from category";
        $catrow = $conn->query($catlist);
        foreach ($catrow as $row) 
        {
    ?>
            <div class="row question-list">
                <h4>
                    <a href="?c-id=<?php echo $row['id']; ?>"><?php echo ucfirst($row['name']); ?></a>
                </h4>
            </div>
    <?php
        }
    ?>
</div>