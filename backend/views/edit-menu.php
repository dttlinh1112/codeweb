
<?php  
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT *FROM tbl_menus WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

       if (isset($_POST['submit'])) {
            $title = $_POST['title'];

            $file = $_FILES['img']; // ảnh menus
            if (!empty($file['name'])) {
                $nameFile = time().$file['name'];
                $tmp_name = $file['tmp_name'];
                move_uploaded_file($tmp_name, "images/".$nameFile);
            }else{
                $nameFile = $row['images_menu'];
            }

            $avatar = $_FILES['avatar']; // ảnh avatar
            if (!empty($avatar['name'])) {
                $name_avt = time().$avatar['name'];
                $tmp_name_avt = $avatar['tmp_name'];
                move_uploaded_file($tmp_name_avt, "images/".$name_avt);
            }else{
                $name_avt = $row['avatar'];
            }
            $description = $_POST['description'];


            $sql = "UPDATE tbl_menus 
                    SET title = '$title', description = '$description', avatar = '$name_avt', images_menu = '$nameFile' 
                    WHERE id = $id";
            $query = mysqli_query($conn, $sql);
            if ($query) {       
               $_SESSION['check'] = 2;
               header("Location: index.php?page=menu");
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
                    <i class="fa fa-dashboard"></i> Sửa thực đơn
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
                    <input type="text" required="" value="<?php if(isset($row['title'])){ echo $row['title']; } ?>" class="form-control" name="title" id="title" required="">
                </div>

                <div class="form-group">
                    <img src="images/<?php echo $row['avatar']; ?>" width="100px"/>
                    <br> <br>
                    <label for="">Thay đổi Avatar (nếu có)</label>
                    <input class="form-control" type="file" name="avatar">

                </div>


                <div class="form-group">
                    <img src="images/<?php echo $row['images_menu']; ?>" width="180px"/>
                    <br> <br>
                    <label for="">Thay đổi Menu (nếu có)</label>
                    <input class="form-control" type="file" name="img">
                </div>

                <div class="form-group">
                    <label for="description">Chi tiết nói về thực đơn</label>
                    <textarea required="" class="form-control ckeditor" name="description" id="ckeditor" id="" cols="30" rows="10"><?php if(isset($row['title'])){ echo $row['description']; }?></textarea>
                </div>
            
                <button type="submit" name="submit" class="btn btn-primary">Câp nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>
