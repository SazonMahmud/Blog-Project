<?php
    $obj = new blogProject();
    //get data from url
    if(isset($_GET['status'])){

        if($_GET['status'] == 'edit'){
             
            $edit_id = $_GET['id'];
            $data = $obj-> edit_category_display($edit_id);
        }
    }

    
    //Update category data method
    if(isset($_POST['update_category'])){

        $update_msg = $obj-> update_category($_POST);
    }

?>
<div class="container-fluid my-4">
    <div class="p-4 shadow">
    <h1 class="text-center pb-4" style="font-family: 'Concert One', cursive;">Update Old Category !</h1>
        <?php if(isset($update_msg)){ echo $update_msg; }?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="row">
                <div class="col">
                    <input type="hidden" name="edit_id" value="<?php if(isset($data['cat_id'])){ echo $data['cat_id'];}  ?>" >
                    <label for="cname"><strong>Category Name</strong></label>
                    <input id="cname" type="text" value="<?php if(isset($data['cat_name'])){ echo $data['cat_name'];} ?>" name="cat_name" class="form-control" required>
                </div>
                <div class="col">
                    <label for="sname"><strong>Slug Name</strong></label>
                    <input id="sname" type="text" value="<?php if(isset($data['cat_slug'])){ echo $data['cat_slug'];} ?>" name="cat_slug" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="des_name"><strong>Category Description</strong></label>
                    <textarea class="form-control" name="cat_des" id="des_name" cols="30" rows="5" placeholder="Briefly describes about your category..." required><?php if(isset($data['cat_des'])){ echo $data['cat_des'];}  ?>
                    </textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input class="btn btn-success" type="submit" name="update_category" value="Update Category">
                    <a class="btn btn-danger ml-2" href="manage_category.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>