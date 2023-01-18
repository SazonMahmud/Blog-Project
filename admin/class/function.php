<?php 

    class blogProject {

        private $conn;

        //database connection method start here
        public function __construct()
        {
            $dbhost     = 'localhost';
            $dbuser     = 'root';
            $dbpassword = '';
            $dbname     = 'blogproject';

            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
            if(!$this->conn){
                die("Database connection Failed." .mysqli_connect_error());
            }

        }
        //database connection method end here


        //admin login method start here
        public function admin_login($input_data){

            $email = $input_data['email'];
            $pass = $input_data['password'];

            $sql = "SELECT user_id FROM user_data WHERE email='$email' && password='$pass'";
            $result = mysqli_query($this->conn, $sql);
            $fet_data = mysqli_num_rows($result);

            if($fet_data){

                header('location: dashboard.php');
                $admin_data = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['id'] = $admin_data['user_id'];

            }else {

                $err ="Your Email & Password is Wrong";
                return $err;
            }
        }
        //admin login method end here


        //admin logout method start here
        public function admin_logout(){

            unset($_SESSION['id']);
            header('location: index.php');
        }
        //admin logout method end here


        //add category method start here
        public function add_category($data){

            $name = $data['cat_name'];
            $slug = $data['cat_slug'];
            $description = $data['cat_des'];

            $sql = "INSERT INTO add_category (`cat_name`, `cat_slug`, `cat_des`) VALUES ('$name','$slug','$description')";
            if(mysqli_query($this->conn, $sql)){

                $return_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>New Category Successfully Added in the Database !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              return $return_msg;
            }
        }
        //add category method end here


        //display manage category method start here
        public function display_manage_category(){

            $sql = "SELECT * FROM `add_category`";
            if(mysqli_query($this->conn, $sql)){
                $display_data = mysqli_query($this->conn, $sql);
                return $display_data;
            }
        }
        //display manage category method end here


        //display manage category method start here
        public function display__category_delete($del_id){

            $sql = "DELETE FROM `add_category` WHERE cat_id=$del_id";
            if(mysqli_query($this->conn, $sql)){
                $del_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Category data Deleted Successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              return $del_msg;
            }
        }
        //display manage category method end here


        //update/edit category method start here
        public function edit_category_display($id){

            $sql = "SELECT * FROM `add_category` WHERE cat_id=$id";
            if(mysqli_query($this->conn, $sql)){

                $return = mysqli_query($this->conn, $sql);
                $fet = mysqli_fetch_assoc($return);
                return $fet;
            }
        }
        //update/edit category method end here


        //add category method start here
        public function update_category($data){

            $id = $data['edit_id'];
            $nam = $data['cat_name'];
            $slu = $data['cat_slug'];
            $des = $data['cat_des'];

            $sql = "UPDATE `add_category` SET  `cat_name`='$nam', `cat_slug`='$slu', `cat_des`='$des' WHERE cat_id=$id";
            if(mysqli_query($this->conn, $sql)){

                $return_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Old Category Successfully Updated in the Database !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                return $return_msg;
            }
        }
        //add category method end here


        //create new post method start here
        public function create_new_post($post_data){

            $p_title = $post_data['post_title'];
            $p_user = $post_data['post_user'];
            $p_cate = $post_data['post_cat'];
            $p_tag = $post_data['post_tag'];
            $p_date = $post_data['post_date'];
            $pt = $post_data['post_title'];
            $image_name = $_FILES['post_image']['name'];
            $tmp_img_name = $_FILES['post_image']['tmp_name'];
            $p_short_des = $post_data['post_des_short'];
            $post_des = $post_data['post_description'];

            $sql ="INSERT INTO post_info (post_title, post_summary, post_content, post_user, post_date, post_comment, post_category, post_tag, post_img) VALUES ('$p_title', '$p_short_des', '$post_des', '$p_user', '$p_date', '5', '$p_cate', '$p_tag','$image_name') ";

            //connect mysqli
            if(mysqli_query($this->conn, $sql)){

                $success_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>New Post Successfully Created in the Database !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                return $success_msg;

            }
        }
        //create new post method end here


        //display manage category method start here
        public function display_all_post(){

            $sql = "SELECT * FROM `post_info`";
            if(mysqli_query($this->conn, $sql)){
                $display_data = mysqli_query($this->conn, $sql);
                return $display_data;
            }
        }
        //display manage category method end here


        //update/edit category method start here
        public function display_old_post($id){

            $sql = "SELECT * FROM `post_info` WHERE post_id=$id";
            if(mysqli_query($this->conn, $sql)){

                $return = mysqli_query($this->conn, $sql);
                $fet = mysqli_fetch_assoc($return);
                return $fet;
            }
        }
        //update/edit category method end here


        //update post method start here
        public function update_old_post($post_data){

            $id = $post_data['update_id'];
            $p_title = $post_data['post_title'];
            $p_user = $post_data['post_user'];
            $p_cate = $post_data['post_cat'];
            $p_tag = $post_data['post_tag'];
            $p_date = $post_data['post_date'];
            $pt = $post_data['post_title'];
            $image_name = $_FILES['post_image']['name'];
            $tmp_img_name = $_FILES['post_image']['tmp_name'];
            $p_short_des = $post_data['post_des_short'];
            $post_des = $post_data['post_description'];

            $sql ="UPDATE `post_info` SET `post_title`='$p_title',`post_summary`='$p_short_des',`post_content`='$post_des',`post_user`='$p_user',`post_date`='$p_date',`post_comment`='5',`post_category`='$p_cate',`post_tag`='$p_tag',`post_img`='$image_name',`post_time`='$p_date' WHERE post_id=$id;";

            //connect mysqli
            if(mysqli_query($this->conn, $sql)){

                $success_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Old Post Successfully Updated in Database !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                return $success_msg;

            }
        }
        //update post method end here


        //delete post method start here
        public function delete_post($del_id){

            $sql = "DELETE FROM `post_info` WHERE post_id=$del_id";
            if(mysqli_query($this->conn, $sql)){
                $del_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Post data Deleted Successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              return $del_msg;
            }
        }
        //delete post method end here


        //display manage category method start here
        public function show_post(){

            $sql = "SELECT * FROM `post_info`";
            if(mysqli_query($this->conn, $sql)){
                $display_data = mysqli_query($this->conn, $sql);
                return $display_data;
            }
        }
        //display manage category method end here


        //contact form data method start here
        public function contact_form_data(){

            $input_name = $_POST['name'];
            $input_email = $_POST['email'];
            $input_subject = $_POST['subject'];
            $input_message = $_POST['message'];

            $sql = "INSERT INTO `contact_info`(`contact_name`, `contact_email`, `contact_subject`, `contact_message`) VALUES ('$input_name','$input_email','$input_subject','$input_message')";
            if(mysqli_query($this->conn, $sql)){

                $return_msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Your Message Send Successfully !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              return $return_msg;
            }
        }
        //contact form data method end here

        //post details method start here
        public function show_post_details($post_id){

            $sql = "SELECT * FROM `post_info` WHERE post_id=$post_id";
            if(mysqli_query($this->conn, $sql)){

                $return = mysqli_query($this->conn, $sql);
                $fet = mysqli_fetch_assoc($return);
                return $fet;
            }
        }
        //post details method end here


                //post details method start here
                public function all_category_view($category_name){

                    $sql = "SELECT * FROM `post_info` WHERE `post_category`=$category_name";
                    if(mysqli_query($this->conn, $sql)){
        
                        $return = mysqli_query($this->conn, $sql);
                        return $return;
                    }
                }
                //post details method end here
    }

?>