<?php  
	if (isset($_POST['login'])) {

		$user = mysqli_real_escape_string($conn, $_POST['user']);
		$password = mysqli_real_escape_string($conn,$_POST['passw']);
		$passw = md5($password);

		$sql = "SELECT *FROM tbl_users WHERE email = '$user' AND passw = '$passw' AND active = 1";
		$query = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);

		if ($num == 1) { // Đăng nhập thành công
			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['status'] = $row['status'];
			header("Location: ../index.php");
		}else{
			$error = "<h3 style='color: red;'>Tài khoản hoặc mật khẩu không đúng!</h3>";
		}
	}
?>


<form action="" method="POST">
	<legend>Đăng nhập hệ thống</legend>
	<?php  
		if (isset($error)) {
			echo $error;
		}

	?>
	<div class="form-group">
		<label for="">Username</label>
		<input type="email" required name="user" class="form-control" value="<?php if(isset($user)) { echo $user; } ?>" placeholder="Nhập email của bạn">
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" required name="passw" class="form-control" value="" placeholder="Nhập pass">
	</div>

	<button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
	<span>Nếu bạn chưa có tài khoản? <a href="#" style="color: red;">Liên hệ Quản trị viên</a></span>

</form>