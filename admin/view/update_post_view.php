<?php 
    $obj = new blogProject();
    $return_data = $obj->display_manage_category();

    //get data from display page
    if($_GET['status']){

        if($_GET['status'] == 'update'){
            $update_id = $_GET['id'];
            $show_data = $obj-> display_old_post($update_id);
        }
    }


    //Create Post Method call
    if(isset($_POST['update_post'])){

        $msg = $obj-> update_old_post($_POST); 
    }
?>
 
 
 <div class="container-fluid my-4">
    <div class="p-4 shadow">
    <h1 class="text-center pb-4" style="font-family: 'Concert One', cursive;">Update your Old Post !</h1>
        <?php if(isset($msg)){ echo $msg; }?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <input type="hidden" name="update_id" value="<?php if(isset($show_data['post_id'])){ echo $show_data['post_id'];}  ?>">
            <div class="row">
                <div class="col mb-2">
                    <label for="post_title"><strong>Post Title</strong></label>
                    <input id="post_title" type="text" name="post_title" value="<?php if(isset($show_data['post_title'])){ echo $show_data['post_title'];}  ?>" class="form-control" placeholder="Enter your post title" required>
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
                    <input id="post_tag" type="text" value="<?php if(isset($show_data['post_tag'])){ echo $show_data['post_tag'];} ?>" name="post_tag" class="form-control" placeholder="Write down post related tag" required>
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
                    <textarea class="form-control" name="post_des_short" id="post_des_short" cols="30" rows="2" placeholder="Shortly describes your post note !" required><?php if(isset($show_data['post_summary'])){ echo $show_data['post_summary'];} ?>
                    </textarea>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <label for="post_des"><strong>Post Description</strong></label>
                    <textarea class="form-control" name="post_description" id="post_des" cols="30" rows="4" placeholder="Briefly describes about your post" required><?php if(isset($show_data['post_content'])){ echo $show_data['post_content'];}  ?>
                    </textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input class="btn btn-success" type="submit" name="update_post" value="Update Now !">
                    <a class="btn btn-danger ml-2" href="manage_post.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>