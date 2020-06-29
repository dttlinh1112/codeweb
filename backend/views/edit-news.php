
<?php  
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT *FROM tbl_news WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

       if (isset($_POST['submit'])) {
            $title = $_POST['title'];

            $file = $_FILES['img'];
            if (!empty($_FILES['img']['name'])) {
                $nameFile = time().$_FILES['img']['name'];
                $tmp_name = $file['tmp_name'];
                move_uploaded_file($tmp_name, "images/".$nameFile);
            }else{
                $nameFile = $row['avatar'];
            }

            $description = $_POST['description'];
            $status = $_POST['status'];

            $sql = "UPDATE tbl_news 
                    SET title = '$title', description = '$description', avatar = '$nameFile', status = $status 
                    WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            if ($query) {       
               $_SESSION['check'] = 2;
               header("Location: index.php?page=news");
            }
       }
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Sửa bài viết
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
                    <input type="text" value="<?php echo $row['title']; ?>" required="" class="form-control" name="title" id="title" required="">
                </div>

                <div class="form-group">
                     <img src="images/<?php echo $row['avatar']; ?>" width="100px"/>
                     <br> <br>
                     <label for="">Thay đổi Avatar (nếu có)</label>
                     <input class="form-control" type="file" name="img">
                </div>

                <div class="form-group">
                    <label for="description">Chi tiết bài viết</label>
                    <textarea required="" class="form-control ckeditor" name="description" id="ckeditor" id="" cols="30" rows="10"><?php echo $row['description']; ?></textarea>
                </div>

                <div class="form-group">
                    <label class="radio-inline"><input type="radio" <?php if($row['status'] == 1){ echo "checked"; } ?> name="status" class="radio-inline" id="tintuc" value="1"> Tin tức</label>
                    <label class="radio-inline"><input type="radio" <?php if($row['status'] == 2){ echo "checked"; } ?> name="status" class="radio-inline" id="km" value="2"> Khuyến mãi</label>
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Câp nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
