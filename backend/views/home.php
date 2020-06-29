<?php  
    // Số lượng tin tức
    $sql_news = "SELECT COUNT(id) as id FROM tbl_news";
    $query_news = mysqli_query($conn, $sql_news);
    $rs_news = mysqli_fetch_array($query_news);

    // Số lượng thành viên
    $sql_users = "SELECT COUNT(id) as id FROM tbl_users";
    $query_users = mysqli_query($conn, $sql_users);
    $rs_users = mysqli_fetch_array($query_users);

    // Số lượng khách đặt bàn
    $sql_order = "SELECT COUNT(id) as id FROM tbl_order";
    $query_order = mysqli_query($conn, $sql_order);
    $rs_order = mysqli_fetch_array($query_order);

    // Số lượng thực đơn
    $sql_menus = "SELECT COUNT(id) as id FROM tbl_menus";
    $query_menus = mysqli_query($conn, $sql_menus);
    $rs_menus = mysqli_fetch_array($query_menus);

?>


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tổng quan <small>hệ thống</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if($rs_menus['id']  > 0) { echo $rs_menus['id']; } ?></div>
                            <div>thực đơn!</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=menu">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if($rs_users['id']  > 0) { echo $rs_users['id']; } ?></div>
                            <div>khách đặt bàn!</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=ordered">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-newspaper-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if($rs_news['id']  > 0) { echo $rs_news['id']; } ?></div>
                            <div>Tin PALM</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=news">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php if($rs_users['id']  > 0) { echo $rs_users['id']; } ?></div>
                            <div>thành viên!</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?page=users">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>