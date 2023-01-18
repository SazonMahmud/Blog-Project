<?php include 'include/header.php'; 
      include 'include/navbar.php';
      include_once 'admin/class/function.php';

      $obj = new blogProject();
      $post_data  = $obj->display_all_post();
      $right_bar_data  = $obj->display_all_post();
      $category_data  = $obj-> display_manage_category();

?>
 
 <!-- Banner Starts Here -->
 <div class="heading-page header-text">
   <section class="page-heading">
     <div class="container">
       <div class="row">
         <div class="col-lg-12">
           <div class="text-content">
             <h4>Recent Posts</h4>
             <h2>Our Recent Blog Entries</h2>
           </div>
         </div>
       </div>
     </div>
   </section>
 </div>
 <!-- Banner Ends Here -->

 <section class="call-to-action">
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
         <div class="main-content">
           <div class="row">
             <div class="col-lg-8">
               <span>Stand Blog HTML5 Template</span>
               <h4>Creative HTML Template For Bloggers!</h4>
             </div>
             <div class="col-lg-4">
               <div class="main-button">
                 <a href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section class="blog-posts grid-system">
   <div class="container">
     <div class="row">
       <div class="col-lg-8">
         <div class="all-blog-posts">
           <div class="row">
             <?php while($data = mysqli_fetch_assoc($post_data)){ ?>
             <div class="col-lg-6">
               <div class="blog-post">
                 <div class="blog-thumb">
                   <img src="assets/images/blog-thumb-01.jpg" alt="">
                 </div>
                 <div class="down-content">
                   <span><?php echo $data['post_tag']; ?></span>
                   <a href="post-details.php?status=post&id=<?php echo $data['post_id']; ?>">
                     <h4><?php echo $data['post_title']; ?></h4>
                   </a>
                   <ul class="post-info">
                     <li><?php echo $data['post_user']; ?></li>
                     <li><?php echo $data['post_date']; ?></li>
                     <li><?php echo $data['post_comment']; ?></li>
                   </ul>
                   <p><?php echo $data['post_summary']; ?></p>
                   <div class="post-options">
                     <div class="row">
                       <div class="col-lg-12">
                         <ul class="post-tags">
                           <li><i class="fa fa-tags"></i></li>
                           <li><?php echo $data['post_tag']; ?></li>
                         </ul>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <?php } ?>
             <!-- pagination start here -->
             <div class="col-lg-12">
               <ul class="page-numbers">
                 <li><a href="#">1</a></li>
                 <li class="active"><a href="#">2</a></li>
                 <li><a href="#">3</a></li>
                 <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
               </ul>
             </div>
             <!-- pagination end here -->
           </div>
         </div>
       </div>
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
                          <?php while ($getdata = mysqli_fetch_assoc($right_bar_data)) { ?>
                          <li><a href="post-details.php?status=post&id=<?php echo $data['post_id']; ?>">
                              <h5><?php echo $getdata['post_title']; ?></h5>
                              <span><?php echo $getdata['post_date']; ?></span>
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
                   <ul><?php while($data = mysqli_fetch_assoc($category_data)){ ?>
                     <li style="text-transform:uppercase">- <?php echo $data['cat_name']; ?></li><?php } ?>
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
                     <li><a href="#">Lifestyle</a></li>
                     <li><a href="#">Creative</a></li>
                     <li><a href="#">HTML5</a></li>
                     <li><a href="#">Inspiration</a></li>
                     <li><a href="#">Motivation</a></li>
                     <li><a href="#">PSD</a></li>
                     <li><a href="#">Responsive</a></li>
                   </ul>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <?php include 'include/footer.php'; ?>