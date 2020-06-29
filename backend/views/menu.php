<?php  

	if (isset($_POST['submit_search'])) {
        $key = $_POST['keyw'];
        $sql = "SELECT *FROM tbl_menus WHERE title LIKE '%$key%' ORDER BY id";
    }else{
        $sql = "SELECT *FROM tbl_menus ORDER BY id";
    }
    
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

?>

<div class="container-fluid">

	 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               THỰC ĐƠN
            </h1>

            <form action="" method="POST">
                <div class="input-group">

                  <input type="text" required="" placeholder="Nhập tên thực đơn cần tìm..." name="keyw" class="form-control" value="<?php if(isset($key)) { echo $key; } ?>"/>

                  <span class="input-group-addon">
                      <button style="line-height: 0px; padding: 0px;" type="submit" class="" name="submit_search">
	                      Tìm kiếm
	                  </button>
                  </span>

                </div>
            </form>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> DANH SÁCH THỰC ĐƠN
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

	<div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">

	<?php 
		if (isset($_SESSION['check']) && $_SESSION['check'] == 1) {
	?>
		<div class="alert alert-danger noti_admin">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thêm thực đơn</strong> thành công!
		</div>
	<?php
		}else if(isset($_SESSION['check']) && $_SESSION['check'] == 3){
	?>
		<div class="alert alert-danger noti_admin">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Xóa thực đơn</strong> thành công!
		</div>
	<?php
		}else if(isset($_SESSION['check']) && $_SESSION['check'] == 2){
	?>
		<div class="alert alert-danger noti_admin">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Cập nhập thực đơn</strong> thành công!
		</div>
	<?php
		}
		unset($_SESSION['check']);
	?>

			<div class="table-responsive">
				<table class="table table-hover">
					<?php if($count > 0){ ?>
					<thead>
						<tr>
							<th>STT</th>	
							<th>Ảnh thực đơn</th>
							<th>Tiêu đề thực đơn</th>
							<th>Ngày đăng</th>
							<th>Chức năng</th>
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
									<td><img src="images/<?php echo $row['images_menu']; ?>" width="200" alt=""></td>
									<td><a href="index.php?page=edit-menu&id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
									<td><?php echo date('d-m-Y H:m:s', strtotime($row['create_at'])); ?></td>
									<td>
										<a href="index.php?page=edit-menu&id=<?php echo $row['id']; ?>"><button class="btn btn-primary">Sửa</button></a>
										<a onclick="return confirm('Bạn có muốn xóa thực đơn này không? ');" href="index.php?page=del-menu&id=<?php echo $row['id']; ?>">
											<button class="btn btn-danger">Xóa</button>
										</a>
									</td>
								</tr>
						<?php
							}
						?>
						
					</tbody>
				<?php }else{
				?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Dữ liệu</strong> không có!
					</div>
				<?php
				} ?>
				</table>
			</div>

		</div>
    </div>
	

</div>