<?php  
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "UPDATE tbl_users SET active = 1 WHERE id = $id";
		$query = mysqli_query($conn, $sql);
		$_SESSION['check'] = 2;
		header("Location: index.php?page=users");
	}
?>