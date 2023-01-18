<?php 
    include 'inc/header.php'; 
    include 'class/function.php'; 
    $obj = new blogProject();

    session_start();
    $id = $_SESSION['id'];
    if($id == null){
        header('location: index.php');
    }

    if(isset($_GET['status'])){
        if($_GET['status'] == 'logout'){
            $obj->admin_logout();
        }
    }
?>
    <body class="sb-nav-fixed">
        <?php include_once 'inc/top_navbar.php'; ?>
        <div id="layoutSidenav">
            <?php include_once 'inc/side_navbar.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <?php 
                        if(isset($d)){
                            include 'view/dashboard_view.php';
                        }elseif(isset($ac)){
                            include 'view/ac_view.php';
                        }elseif(isset($mc)){
                            include 'view/mc_view.php';
                        }elseif(isset($ap)){
                            include 'view/ap_view.php';
                        }elseif(isset($mp)){
                            include 'view/mp_view.php';
                        }elseif(isset($e)){
                            include 'view/edit_view.php';
                        }elseif(isset($update_post)){
                            include 'view/update_post_view.php';
                        }
                    
                    ?>
                </main>
                <?php include 'inc/footer.php'; ?>
            </div>
        </div>
<?php include 'inc/script.php'; ?>