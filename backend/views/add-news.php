<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                TIN TỨC <small>PALM - NEWS</small>
            </h1>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Thêm mới tin tức
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <form action="" method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="title">Tiêu đề tin</label>
                    <input type="text" required="" class="form-control" name="title" id="title" required="">
                </div>

                <div class="form-group">
                    <label for="avatar">Ảnh đại diện</label>
                    <input type="file" required="" class="form-control" name="img" id="avatar" required="">
                </div>

                <div class="form-group">
                    <label for="description">Chi tiết bài viết</label>
                    <textarea required="" class="form-control ckeditor" name="description" id="ckeditor" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label class="radio-inline"><input type="radio" name="status" checked="" class="radio-inline" id="tintuc" value="1"> Tin tức</label>
                    <label class="radio-inline"><input type="radio" name="status" class="radio-inline" id="km" value="2"> Khuyến mãi</label>
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

        $file = $_FILES['img'];
        $nameFile = time().$file['name'];
        $tmp_name = $file['tmp_name'];
        move_uploaded_file($tmp_name, "images/".$nameFile);

        $description = $_POST['description'];
        $status = $_POST['status'];

        $sql = "INSERT INTO tbl_news(title, description, avatar, status) VALUES('$title', '$description', '$nameFile', $status)";
        $query = mysqli_query($conn, $sql);
        if ($query) {
           $_SESSION['check'] = 1;
           header("Location: index.php?page=news");
        }

    }

?>