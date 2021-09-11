<?php
	include '../../connect.php';
	if (isset($_GET['id'])) {
		$mahoa = $_GET['id'];
		$update = "UPDATE HOA SET DISABLE = 1 WHERE MA_HOA = '".$mahoa."'";
		$result = mysqli_query($con, $update);
		echo $result;
	}

?>