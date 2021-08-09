<?php
	include '../../connect.php';
	if (isset($_GET['mahoa'])) {
		$mahoa = $_GET['mahoa'];
		$update = "UPDATE HOA SET DISABLE = 1 WHERE MA_HOA = '".$mahoa."'";
		mysqli_query($con,$update);
		header('location:../../admin.php?tab=qlsp');
	}

?>