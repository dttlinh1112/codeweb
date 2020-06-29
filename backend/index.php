<?php 
    ob_start();
    session_start(); 
    if (!isset($_SESSION['id'])) {
        header("Location: login/index.php");
    }
    include_once '../config/myConfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title>Quản trị hệ thống PALM</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">PALM</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(isset($_SESSION['name'])) { echo $_SESSION['name']; }  ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php?page=info"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="index.php?page=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Quản trị hệ thống</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-file"></i> Tổng Quan</a>
                    </li>
                    <li>
                        <a href="index.php?page=ordered"><i class="fa fa-fw fa-arrows-v"></i> Đơn đặt bàn</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Tin tức <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="index.php?page=news">Danh sách</a>
                            </li>
                            <li>
                                <a href="index.php?page=add-news">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#menu"><i class="fa fa-fw fa-arrows-v"></i> Thực đơn <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="menu" class="collapse">
                            <li>
                                <a href="index.php?page=menu">Danh sách</a>
                            </li>
                            <li>
                                <a href="index.php?page=add-menu">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                    <?php  
                        if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
                    ?>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Thành viên <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="users" class="collapse">
                                <li>
                                    <a href="index.php?page=users">Danh sách</a>
                                </li>
                                <li>
                                    <a href="index.php?page=add-users">Thêm mới</a>
                                </li>
                            </ul>
                        </li>
                    <?php
                        }
                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <?php  
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }else{
                    $page = 'home';
                }

                if (file_exists('views/'.$page.'.php')) {
                   include_once 'views/'.$page.'.php';
                }else{
                     header('Location: index.php');
                }
            ?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script src="js/myJava.js"></script>
    <script src="ckd/ckeditor.js"></script>
    <script src="ckf/ckfinder.js"></script>

</body>

</html>
