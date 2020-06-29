<?php  
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM tbl_news WHERE id = $id";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			$_SESSION['check'] = 3;
           header("Location: index.php?page=news");
		}
	}

?>