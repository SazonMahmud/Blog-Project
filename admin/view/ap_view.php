<?php 
    $obj = new blogProject();
    $return_data = $obj->display_manage_category();

    //Create Post Method call
    if(isset($_POST['create_post_now'])){

        $msg = $obj-> create_new_post($_POST); 
    }
?>

<div class="container-fluid my-4">
    <div class="p-4 shadow">
    <h1 class="text-center pb-4" style="font-family: 'Concert One', cursive;">Create New Post</h1>
        <?php if(isset($msg)){ echo $msg; }?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col mb-2">
                    <label for="post_title"><strong>Post Title</strong></label>
                    <input id="post_title" type="text" name="post_title" class="form-control" placeholder="Enter your post title" required>
                </div>
                <div class="col mb-2">
                    <label for="post_user"><strong>User</strong></label>
                    <select class="form-control" name="post_user" id="post_user">
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="col mb-2">
                    <label for="post_cat"><strong>Select Post Category</strong></label>
                    <select class="form-control" name="post_cat" id="post_cat">
                        <?php while($data = mysqli_fetch_assoc($return_data)){ ?>
                            <option value="<?php echo $data['cat_name']; ?>"><?php echo $data['cat_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label for="post_tag"><strong>Post Tag</strong></label>
                    <input id="post_tag" type="text" name="post_tag" class="form-control" placeholder="Write down post related tag" required>
                </div>
                <div class="col mb-2">
                    <label for="post_date"><strong>Select Date</strong></label>
                    <input id="post_date" type="date" name="post_date" class="form-control" required>
                </div>
                <div class="col mb-2">
                    <label for="post_image" class="mt-1"><strong>Banner Image</strong></label>
                    <input id="post_image" type="file" name="post_image" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <label for="post_des_short"><strong>Short Summary</strong></label>
                    <textarea class="form-control" name="post_des_short" id="post_des_short" cols="30" rows="2" placeholder="Shortly describes your post note !" required></textarea>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <label for="post_des"><strong>Post Description</strong></label>
                    <textarea class="form-control" name="post_description" id="post_des" cols="30" rows="4" placeholder="Briefly describes about your post" required></textarea>
                </div>
            </div>
            <!-- raad-->
            <div class="row mt-1">
                <div class="col">
                    <label for="post_des"><strong>Post Link</strong></label>
                    <textarea class="form-control" name="post_link" id="post_des" cols="30" rows="4" placeholder="Briefly describes about your post" required></textarea>
                </div>
            </div>
            <!-- raad-->
            <div class="row mt-3">
                <div class="col">
                    <input class="btn btn-success" type="submit" name="create_post_now" value="Create Post">
                    <a class="btn btn-danger ml-2" href="manage_post.php">Cancel Post</a>
                </div>
            </div>
        </form>
    </div>
</div>