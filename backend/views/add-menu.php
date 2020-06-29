<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                THỰC ĐƠN <small>PALM - MENU</small>
            </h1>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Thêm mới thực đơn
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <form action="" method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="title">Tiêu đề thực đơn</label>
                    <input type="text" required="" class="form-control" name="title" id="title" required="">
                </div>

                <div class="form-group">
                    <label for="avatar">Ảnh đại diện</label>
                    <input type="file" required="" class="form-control" name="avatar" id="avatar" required="">
                </div>

                <div class="form-group">
                    <label for="img">Ảnh chụp thực đơn</label>
                    <input type="file" required="" class="form-control" name="img" id="img" required="">
                </div>

                <div class="form-group">
                    <label for="description">Chi tiết nói về thực đơn</label>
                    <textarea required="" class="form-control ckeditor" name="description" id="ckeditor" id="" cols="30" rows="10"></textarea>
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php  
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];

        $file_avt = $_FILES['avatar']; // avatar
        $nameFile_avt = time().$file_avt['name'];
        $tmp_name_avt = $file_avt['tmp_name'];
       

        $file = $_FILES['img']; // thực đơn
        $nameFile = time().$file['name'];
        $tmp_name = $file['tmp_name'];
        $description = $_POST['description'];

        $sql = "INSERT INTO tbl_menus(title, description, avatar, images_menu) VALUES('$title', '$description', '$nameFile_avt', '$nameFile')";
        $query = mysqli_query($conn, $sql);
        if ($query) {

           move_uploaded_file($tmp_name, "images/".$nameFile);
           move_uploaded_file($tmp_name_avt, "images/".$nameFile_avt);
           $_SESSION['check'] = 1;
           header("Location: index.php?page=menu");

        }

    }

?>