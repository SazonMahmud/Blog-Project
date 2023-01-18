<?php
      $obj = new blogProject();
      $post_data  = $obj->display_all_post();
      $category_data  = $obj-> display_manage_category();
?>

<div class="col-lg-8">
  <div class="all-blog-posts">
    <div class="row">
      <?php while ($data = mysqli_fetch_assoc($post_data)) { ?>
        <div class="col-lg-12">
          <div class="blog-post">
            <div class="blog-thumb">
              <img src="assets/images/blog-post-01.jpg" alt="">
            </div>
            <div class="down-content">
              <span><?php echo $data['post_category']; ?></span>
              <a href="post-details.php?status=post&id=<?php echo $data['post_id']; ?>">
                <h4><?php echo $data['post_title']; ?></h4>
              </a>
              <ul class="post-info">
                <li><a href="#"><?php echo $data['post_user']; ?></a></li>
                <li><a href="#"><?php echo $data['post_date']; ?></a></li>
                <li><a href="#"><?php echo $data['post_comment']; ?></a></li>
              </ul>
              <p><?php echo $data['post_content']; ?><a rel="nofollow" href="post-details.php?status=post&id=<?php echo $data['post_id']; ?>" target="_parent"> Read More</a></p>
              <div class="post-options">
                <div class="row">
                  <div class="col-6">
                    <ul class="post-tags">
                      <li><i class="fa fa-tags"></i></li>
                      <li><a href="#"><?php echo $data['post_tag']; ?></a></li>
                    </ul>
                  </div>

                  <div class="col-6">
                    <ul class="post-share">
                      <li><i class="fa fa-share-alt"></i></li>
                      <li><a href="www.facebook.com">Facebook</a>,</li>
                      <li><a href="www.twitter.com"> Twitter</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- for more posts -->
      <div class="col-lg-12">
        <div class="main-button">
          <a href="blog.html">View All Posts</a>
        </div>
      </div>
    </div>
  </div>
</div>