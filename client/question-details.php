<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading">Question</h1>
            <?php 
                include("./common/db.php");
                $query = "select * from questions where id='".$_GET['q-id']."'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $cid = $row["category_id"];
            
            ?>
            <h4 class="margin-bottom-15 question-title">Question : <?php echo $row['title']; ?></h4>
            <p class="margin-bottom-15"><?php echo $row['description']; ?></p>
            <?php include("answers.php"); ?>
            <form action="./server/requests.php" method="post">
                <input type="hidden" name="question_id" value="<?php echo $_GET['q-id']; ?>">
                <textarea name="answer" class="form-control margin-bottom-15" placeholder="Your answer..."></textarea>
                <button class="btn btn-primary margin-bottom-15">Write your answer</button>
            </form>
        </div>
        <div class="col-4">
            
            <?php 
                $catquery = "Select name from category where id='$cid'";
                $catresult = $conn->query($catquery);
                $catrow = $catresult->fetch_assoc();
                ?>
                <h1 class="heading"><?php echo ucfirst($catrow['name']);?></h1>
                <?php
                $query = "select * from questions where category_id='$cid' and id!='".$_GET['q-id']."'";
                $result = $conn->query($query);
                foreach($result as $row)
                {
                ?>
                    <div class="question-list">
                        <h4 class="question-title">
                            <a href="?q-id=<?php echo $row['id']; ?>"><?php echo ucfirst($row['title']); ?></a>
                        </h4>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>
</div>