<?php include_once 'admin/class/function.php';

      $obj = new blogProject();
      $post_data  = $obj-> display_all_post();

?>

<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            <?php while($data = mysqli_fetch_assoc($post_data)){ ?>
            <div class="item">
                <img src="assets/images/banner-item-01.jpg" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span><?php echo $data['post_category']; ?></span>
                        </div>
                        <a href="post-details.php?status=post&id=<?php echo $data['post_id']; ?>">
                            <h4><?php echo $data['post_title']; ?></h4>
                        </a>
                        <ul class="post-info">
                            <li style="color:white"><?php echo $data['post_user']; ?></li>
                            <li style="color:white"><?php echo $data['post_date']; ?></li>
                            <li style="color:white"><?php echo $data['post_comment']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>