<?php 
    $obj = new blogProject();
    if(isset($_POST['submit_category'])){

        $msg = $obj-> add_category($_POST);
    }

?>
<div class="container-fluid my-4">
    <div class="p-4 shadow">
    <h1 class="text-center pb-4" style="font-family: 'Concert One', cursive;">Add New Category</h1>
        <?php if(isset($msg)){ echo $msg; }?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="row">
                <div class="col">
                    <label for="cname"><strong>Category Name</strong></label>
                    <input id="cname" type="text" name="cat_name" class="form-control" placeholder="Enter your Category name..." required>
                </div>
                <div class="col">
                    <label for="sname"><strong>Slug Name</strong></label>
                    <input id="sname" type="text" name="cat_slug" class="form-control" placeholder="Enter category slug..." required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="sname"><strong>Category Description</strong></label>
                    <textarea class="form-control" name="cat_des" id="dname" cols="30" rows="5" placeholder="Briefly describes about your category..." required></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input class="btn btn-success" type="submit" name="submit_category" value="Add Category">
                    <a class="btn btn-danger ml-2" href="manage_category.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>