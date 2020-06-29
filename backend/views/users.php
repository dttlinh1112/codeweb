<?php  

	if (isset($_POST['submit_search'])) {
        $key = $_POST['keyw'];
        $sql = "SELECT *FROM tbl_users WHERE name LIKE '%$key%' ORDER BY id";
    }else{
        $sql = "SELECT *FROM tbl_users ORDER BY id";
    }
    
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

?>

<div class="container-fluid">

	 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
               THÀNH VIÊN
            </h1>

            <form action="" method="POST">
                <div class="input-group">

                  <input type="text" required="" placeholder="Nhập tên thành viên cần tìm..." name="keyw" class="form-control" value="<?php if(isset($key)) { echo $key; } ?>"/>

                  <span class="input-group-addon">
                      <button style="line-height: 0px; padding: 0px;" type="submit" class="" name="submit_search">
	                      Tìm kiếm
	                  </button>
                  </span>

                </div>
            </form>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> DANH SÁCH THÀNH VIÊN
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
			<strong>Thêm thành viên</strong> thành công!
		</div>
	<?php
		}else if(isset($_SESSION['check']) && $_SESSION['check'] == 3){
	?>
		<div class="alert alert-danger noti_admin">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Xóa thành viên</strong> thành công!
		</div>
	<?php
		}else if(isset($_SESSION['check']) && $_SESSION['check'] == 2){
	?>
		<div class="alert alert-danger noti_admin">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Cập nhập thành viên</strong> thành công!
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
							<th>Họ tên</th>
							<th>Số điện thoại</th>
							<th>Email</th>
							<th>Trạng thái</th>
							<th>Quyền</th>
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
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['phone']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td>
										<?php if($row['active'] == 1){ echo "<p style='color: green;font-weight: bold;'>Hoạt động</p>"; }else{ echo "<p style='color: red; font-weight: bold;'>Không hoạt động</p>"; } ?>
									</td>
									<td>
										<?php if($row['status'] == 1){ echo "<p style='color: blue;font-weight: bold;'>Super Admin</p>"; }else{ echo "<p style='color: red; font-weight: bold;'>Admin</p>"; } ?>
									</td>
									<td>
										<a href="index.php?page=edit-users&id=<?php echo $row['id']; ?>"><button class="btn btn-primary">Sửa</button></a>
										<?php  
											if ($row['active'] == 1) {
										?>
											<a onclick="return confirm('Bạn có muốn xóa khóa hoạt động thành viên này không? ');" href="index.php?page=block-users&id=<?php echo $row['id']; ?>">
												<button class="btn btn-danger">Khóa hoạt động</button>
											</a>
										<?php
											}else{
										?>
											<a onclick="return confirm('Bạn có muốn xóa mở hoạt động thành viên này không? ');" href="index.php?page=open-users&id=<?php echo $row['id']; ?>">
												<button class="btn btn-success">Mở hoạt động</button>
											</a>
										<?php
											}
										?>
										
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