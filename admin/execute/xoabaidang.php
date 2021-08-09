<?php
	include '../../connect.php';
	if (isset($_GET['mabai'])) {
		$mabai = $_GET['mabai'];
		$update = "UPDATE TINTUC SET DISABLE = 1 WHERE MA_TIN = '".$mabai."'";
		mysqli_query($con,$update);
		header('location:../../admin.php?tab=qlbd');
	}
?>