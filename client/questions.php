<div class="container">  
    <div class="row">
        <div class="col-8">
        <h1 class="heading">Questions</h1>
        <?php 
            include("./common/db.php");
            if(isset($_GET["c-id"]))
            {
                $quelist = "select * from questions where category_id='".$_GET['c-id']."'";
            }
            else if(isset($_GET["u-id"]))
            {
                $quelist = "select * from questions where user_id='".$_GET['u-id']."'";
            }
            else if(isset($_GET["latest"]))
            {
                $quelist = "select * from questions order by id desc";
            }
            else if(isset($_GET["search"]))
            {
                $quelist = "select * from questions where 'title' like '%".$_GET['search']."%'";
            }
            else
            {
                $quelist = "select * from questions";
            }
            $querow = $conn->query($quelist);
            foreach($querow as $row)
            {
            ?>
                <div class="row question-list">
                    <h4 class="my-question">
                        <a href="?q-id=<?php echo $row['id']; ?>"><?php echo ucfirst($row['title']); ?></a>
                        <?php 
                        if(isset($_GET['u-id']))
                        { 
                        ?>
                            <a href="./server/requests.php?delete=<?php echo $row['id']; ?>">Delete</a>
                        <?php
                        }
                        else
                        {
                            echo NULL;     
                        } 
                        ?>
                    </h4>
                </div>
            <?php
            }
        ?>
        </div>
        
        <div class="col-4">
            <?php include("categorylist.php"); ?>
        </div>
    </div>
</div>