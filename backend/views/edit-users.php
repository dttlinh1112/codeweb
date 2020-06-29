<?php

    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql_select = "SELECT *FROM tbl_users WHERE id = $id";
        $query = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($query);
    
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            $checks = $_POST['checks'];
            $passw = md5($_POST['passw']);

            if ($checks == 'yes') {
                $sql = "UPDATE tbl_users SET name = '$name', phone = '$phone', passw = '$passw', status = $status WHERE id = $id";
            }else{
                $sql = "UPDATE tbl_users SET name = '$name', phone = '$phone', status = $status WHERE id = $id";
            }
            $query = mysqli_query($conn, $sql);
            if ($query) {
               $_SESSION['check'] = 1;
               header("Location: index.php?page=users");
            }
        }
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                THÀNH VIÊN <small>PALM</small>
            </h1>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Sửa thông tin thành viên
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <form action="" method="POST" role="form">
                <legend>
                    <i class="fa fa-user-plus"></i>
                    Sửa thông tin thành viên
                </legend>
                

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-male"></i>
                        Họ tên 
                    <span style="color: red;">*</span>
                </label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required="" placeholder="Nhập đầy đủ họ tên...">
                </div>

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-phone"></i>
                        Phone 
                    <span style="color: red;">*</span>
                </label>
                    <input type="number" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required="" placeholder="Nhập số điện thoại...">
                </div>

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-envelope-o"></i>
                        Tài khoản 
                    <span id="errorEmail" style="color: red;">*</span>
                </label>
                    <input type="email" disabled="" class="form-control" name="email" value="<?php echo $row['email']; ?>" required="" placeholder="Nhập email...">
                </div>

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-key"></i>
                        Mật khẩu 
                    <span style="color: red;">* Bạn có muốn reset lại mật khẩu không??</span>
                    <label class="radio-inline"><input type="radio" value="yes" name="checks">Có</label>
                    <label class="radio-inline"><input type="radio" checked value="no" name="checks">Không</label>
                </label>
                    <input disabled="" class="form-control" value="Palm.com@123">
                    <input hidden="" name="passw" value="Palm.com@123">
                </div>

                <div class="form-group">
                    <label style="display: block;">
                        <i class="fa fa-clone"></i>
                        Phân quyền 
                    <span style="color: red;">*</span>
                </label>
                    <label class="radio-inline"><input type="radio" <?php if($row['status'] == 1){ echo "checked"; } ?> value="1" name="status">Super Admin</label>
                    <label class="radio-inline"><input type="radio" <?php if($row['status'] == 2){ echo "checked"; } ?> value="2" name="status">Admin</label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            </form>       
        </div>
    </div>
    <!-- /.row -->

</div>