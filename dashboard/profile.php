<?php 
include '../config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
$sql = mysqli_query($conn, "SELECT * FROM users WHERE username ='".$_SESSION['username']."'");
$id = mysqli_fetch_object($sql);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, Ample lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Ample admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ml-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?php echo $_SESSION['username']?></span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="iot-list.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Product List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="about.php"
                                aria-expanded="false">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>
                        <li class="text-center p-20 upgrade-btn">
                            <a href="logout.php"
                                class="btn btn-block btn-danger text-white">LOGOUT</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Profile</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                             <ol class="breadcrumb ml-auto">
                            
                            </ol>
                            <a href="add-iot.php"
                                class="btn btn-danger  d-none d-md-block pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">ADD IOT</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="plugins/images/users/genu.jpg"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <?php
                                        
                                        ?>
                                        <h4 class="text-white mt-2"><?php echo $_SESSION['username'];?></h4>
                                        <h5 class="text-white mt-2"><?php echo $id->email ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="POST">
                                    <div class="form-group mb-4">

                                        <label class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="<?php echo $id->username ?>"
                                                class="form-control p-0 border-0" name="name" required> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" placeholder="<?php echo $id->email ?>"
                                                class="form-control p-0 border-0" name="email"
                                                id="example-email" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" class="form-control p-0 border-0" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input type="submit" name="submit" class="btn btn-success" value="Update Profile">

                                            <?php 
                                                if(isset($_POST['submit'])){
                                                    $name = ucwords($_POST['name']);
                                                    $email = ucwords($_POST['email']);
                                                    $password = md5($_POST['password']);

                                                    $update = mysqli_query($conn, "UPDATE users SET
                                                                            username='".$name."',
                                                                            email='".$email."',
                                                                            password='".$password."'
                                                                            WHERE username = '".$id->username."'");

                                                    if($update){
                                                        echo"<script>alert('Login Berhasil');document.location.href='logout.php'</script>";

                                                    }else{
                                                        echo 'gagal' .mysqli_error($koneksi);
                                                        
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2020 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>