<?php  
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $passw = md5($_POST['pass']);


        $sql_check = "SELECT *FROM tbl_users WHERE email = '$email'";
        $query_check = mysqli_query($conn, $sql_check);
        $check = mysqli_num_rows($query_check);

        if ($check != 1) {
            $sql = "INSERT INTO tbl_users(name, phone, email, passw, status) VALUES('$name', '$phone', '$email', '$passw', $status)";
            $query = mysqli_query($conn, $sql);
            if ($query) {
               $_SESSION['check'] = 1;
               header("Location: index.php?page=users");
            }
        }else{
            $errors = "<p style='color: red; font-weight: bold;'>Tài khoản đã tồn tại!</p>";
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
                    <i class="fa fa-dashboard"></i> Thêm mới thành viên
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
                    Thêm quản trị viên
                </legend>
                

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-male"></i>
                        Họ tên 
                    <span style="color: red;">*</span>
                </label>
                    <input type="text" class="form-control" name="name" value="<?php if(isset($name)){ echo $name; } ?>" required="" placeholder="Nhập đầy đủ họ tên...">
                </div>

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-phone"></i>
                        Phone 
                    <span style="color: red;">*</span>
                </label>
                    <input type="number" class="form-control" name="phone" value="<?php if(isset($name)){ echo $phone; } ?>" required="" placeholder="Nhập số điện thoại...">
                </div>

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-envelope-o"></i>
                        Tài khoản 
                    <span id="errorEmail" style="color: red;">* <?php if(isset($errors)){ echo $errors; } ?></span>
                </label>
                    <input type="email" class="form-control" name="email" value="<?php if(isset($name)){ echo $email; } ?>" required="" placeholder="Nhập email...">
                </div>

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-key"></i>
                        Mật khẩu 
                    <span style="color: red;">*</span>
                </label>
                    <input disabled="" class="form-control" value="Palm.com@123">
                    <input hidden="" name="pass" value="Palm.com@123">
                </div>

                <div class="form-group">
                    <label style="display: block;">
                        <i class="fa fa-clone"></i>
                        Phân quyền 
                    <span style="color: red;">*</span>
                </label>
                    <label class="radio-inline"><input type="radio" value="1" name="status" checked="checked">Super Admin</label>
                    <label class="radio-inline"><input type="radio" value="2" name="status">Admin</label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Thêm tài khoản</button>
            </form>       
        </div>
    </div>
    <!-- /.row -->

</div>