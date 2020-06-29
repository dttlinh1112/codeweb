<?php  
    if (isset($_POST['submit_search'])) {
        $key = $_POST['keyw'];
        $sql = "SELECT *FROM tbl_order WHERE phone LIKE '%$key%' ORDER BY id";
    }else{
        $sql = "SELECT *FROM tbl_order ORDER BY id";
    }
    
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Đặt bàn <small>PALM - Vua lẩu nướng</small>
            </h1>

            <form action="" method="POST">
                <div class="input-group">

                  <input type="text" required="" placeholder="Nhập số điện thoại cần tìm..." name="keyw" class="form-control" value="<?php if(isset($key)) { echo $key; } ?>"/>

                  <span class="input-group-addon">
                      <button style="line-height: 0px; padding: 0px;" type="submit" class="" name="submit_search">Tìm kiếm</button>
                  </span>

                </div>
            </form>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Danh sách KH đặt bàn
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <?php if ($count > 0) { ?>
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Ngày đặt bàn</th>
                            <th class="text-center">Thời gian</th>
                            <th class="text-center">Số lượng người</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                 $stt += 1;
                        ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['date_order'])); ?></td>
                                <td align="center"><?php echo $row['person_oder']; ?></td>
                                <td><?php echo $row['times_order']; ?></td>
                                <td>
                                    <?php  
                                        // if ($row['status'] == 1) {
                                        //     echo "<p style='color: red;'>Xác nhận đặt bàn</p>";
                                        // }else if($row['status'] == 2){
                                        //     echo "<p style='color: green;'>Đã xác nhận!</p>";
                                        // }else{
                                        //     echo "<p style='color: red;'>Hủy đăt bàn</p>";
                                        // }
                                    ?>
                                    <form action="index.php?page=ordered&id=<?php echo $row['id']; ?>" method="POST">
                                        <div class="input-group">

                                            <select class="form-control" name="<?php echo $row['id']; ?>" id="">
                                                <option value="1" <?php if(isset($row['status']) && $row['status'] == 1) { ?> selected="selected"  <?php } ?> >Xác nhận đặt bàn</option>
                                                <option value="2" <?php if(isset($row['status']) && $row['status'] == 2) { ?> selected="selected"  <?php } ?> >Đã xác nhận</option>
                                                <option value="0" <?php if(isset($row['status']) && $row['status'] == 0) { ?> selected="selected"  <?php } ?> >Hủy đặt bàn</option>
                                            </select>

                                            <span class="input-group-addon">
                                                <button onclick="return confirm('Bạn có thực sự muốn cập nhật trạng thái đặt này không?');" style="line-height: 0px; padding: 0px;" type="submit" class="" name="submit">Cập nhật</button>
                                            </span>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php
                                }
                            }else{
                        ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Dữ liệu</strong> hiện không có!
                            </div>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php  
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $status_order = $_POST[$id];
        
        $sql_status = "UPDATE tbl_order SET status = '$status_order' WHERE id = $id";
        $query = mysqli_query($conn, $sql_status);
        header("Location: index.php?page=ordered;");

    }
?>