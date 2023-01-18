<?php 
    include 'inc/header.php'; 
    include 'class/function.php'; 

    $obj = new blogProject();
    if(isset($_POST['user_login'])){
        $err_msg = $obj-> admin_login($_POST);
    }

    session_start();
    iF(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    if(isset($id)){
        header('location: dashboard.php');
    }

?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center" style="margin-top: 175px;">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4" style="font-family: 'Fredoka One', cursive;">Admin Login</h3>
                                </div>
                                <div class="card-body">
                                    <span style="color:red;"><?php if(isset($err_msg)){ echo $err_msg;} ?></span>
                                    <form method="POST" action=" ">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmail">Email</label>
                                            <input class="form-control py-4" name="email" id="inputEmail" type="email" placeholder="Enter email address" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter your Password" required/>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input type="submit" name="user_login" class="btn btn-primary" value="Login Now" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>