<?php 

    $obj = new blogProject();

    //delete data from database
    if(isset($_GET['status'])){
        if($_GET['status'] == 'delete'){
            
            $delete_id = $_GET['id'];
            $msg = $obj->delete_post($delete_id);
        }
    }

    //display data 
    $data  = $obj-> display_all_post();

?>

<div class="container-fluid">
    <div class="shadow my-4 p-4">
        <h1 class="text-center pb-4" style="font-family: 'Concert One', cursive;">All Post Display with Details !</h1>
        <?php if(isset($msg)){ echo $msg; } ?>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <td><strong>Id</strong></td>
                    <td><strong>User</strong></td>
                    <td><strong>Title</strong></td>
                    <td><strong>Category</strong></td>
                    <td><strong>Tag</strong></td>
                    <td><strong>Date</strong></td>
                    <td><strong>Image</strong></td>
                    <td><strong>Summary</strong></td>
                    <td><strong>Description</strong></td>
                    <td><strong>Edit & Delete</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php while($fetch_data = mysqli_fetch_assoc($data)){ ?>
                <tr>
                    <td><?php echo $fetch_data['post_id']; ?></td>
                    <td><?php echo $fetch_data['post_user']; ?></td>
                    <td><?php echo $fetch_data['post_title']; ?></td>
                    <td><?php echo $fetch_data['post_category']; ?></td>
                    <td><?php echo $fetch_data['post_tag']; ?></td>
                    <td><?php echo $fetch_data['post_date']; ?></td>
                    <td><?php echo $fetch_data['post_img']; ?></td>
                    <td><?php echo $fetch_data['post_summary']; ?></td>
                    <td><?php echo $fetch_data['post_content']; ?></td>
                    <td>
                        <a class="btn btn-success m-1" href="update_post.php?status=update&id=<?php echo $fetch_data['post_id']; ?>">Update</a>
                        <a class="btn btn-danger m-1" href="?status=delete&id=<?php echo $fetch_data['post_id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>