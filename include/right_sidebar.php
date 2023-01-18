<?php

  $obj = new blogProject();
  $post_data  = $obj-> display_all_post();
  $cate_view  = $obj-> display_all_post();
  $cv = mysqli_fetch_assoc($cate_view);

?>

<div class="col-lg-4">
  <div class="sidebar">
    <div class="row">
      <div class="col-lg-12">
        <div class="sidebar-item search">
          <form id="search_form" name="gs" method="GET" action="#">
            <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
          </form>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-item recent-posts">
          <div class="sidebar-heading">
            <h2>Recent Posts</h2>
          </div>
          <div class="content">
              <ul>
                  <?php while ($data = mysqli_fetch_assoc($post_data)) 
                  { ?>
                  <li><a href="post-details.php?status=post&id=<?php echo $data['post_id']; ?>">
                      <h5><?php echo $data['post_title']; ?></h5>
                      <span><?php echo $data['post_date']; ?></span>
                  </a></li>
                  <?php } ?>
              </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-item categories">
          <div class="sidebar-heading">
            <h2>Categories</h2>
          </div>
          <div class="content">
            <ul>
              <!-- This is Category Section -->
                <?php while($data = mysqli_fetch_assoc($category_data)){ ?>
                      <li style="text-transform: uppercase;"><a href="category_details.php?status=view_category&name=<?php echo $cv['post_category']; ?>">- <?php echo $data['cat_name']; ?></a></li>
                <?php } ?>
                <!-- This is Category Section -->
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-item tags">
          <div class="sidebar-heading">
            <h2>Related Tags</h2>
          </div>
          <div class="content">
            <ul>
              <?php while($data = mysqli_fetch_assoc($post_data)){ ?>
                    <li><a href="#"><?php echo $data['post_tag']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>