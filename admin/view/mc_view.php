<?php 

    $obj = new blogProject();

    if(isset($_GET['status'])){
        if($_GET['status'] == 'delete'){
            
            $delete_id = $_GET['id'];
            $msg = $obj->display__category_delete($delete_id);
        }
    }
    //category data display
    $data  = $obj-> display_manage_category();

?>

<div class="container-fluid">
    <div class="shadow my-4 p-4">
        <h1 class="text-center pb-4" style="font-family: 'Concert One', cursive;">All Gategory Display with Info !</h1>
        <?php if(isset($msg)){ echo $msg; } ?>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <td><strong>Id</strong></td>
                    <td><strong>Name</strong></td>
                    <td><strong>Slug</strong></td>
                    <td><strong>Description</strong></td>
                    <td><strong>Edit & Delete</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php while($fetch_data = mysqli_fetch_assoc($data)){ ?>
                <tr>
                    <td><?php echo $fetch_data['cat_id']; ?></td>
                    <td><?php echo $fetch_data['cat_name']; ?></td>
                    <td><?php echo $fetch_data['cat_slug']; ?></td>
                    <td><?php echo $fetch_data['cat_des']; ?></td>
                    <td>
                        <a class="btn btn-success m-1" href="edit.php?status=edit&id=<?php echo $fetch_data['cat_id']; ?>">Edit</a>
                        <a class="btn btn-danger m-1" href="?status=delete&id=<?php echo $fetch_data['cat_id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>