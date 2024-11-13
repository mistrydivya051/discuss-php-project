<div class="container">
    <div class="offset-sm-1">
        <h5>Answers:</h5>
        <?php 
            $query = "select * from answers where question_id='".$_GET['q-id']."'";
            $result = $conn->query($query);
            foreach ($result as $row) 
            {
            ?>
                <div class="row">
                    <p class="answer-wrapper"><?php echo $row['answer']; ?></p>
                </div>
            <?php
            }
        ?>
    </div>
</div>