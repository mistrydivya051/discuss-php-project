<div class="container">
    <h1 class="heading">Ask A Question</h1>
    <form method="post" action="./server/requests.php">
        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter question title">
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Enter question description"></textarea>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="category" class="form-label">Category</label>
            <?php include("category.php") ?>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>
        </div>
    </form>
</div>