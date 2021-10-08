<?php
	include '../../connect.php';
	if (isset($_GET['id'])) {
		$maGopY = $_GET['id'];
		$update = "UPDATE GOPY SET trangthai = 0 WHERE id = '".$maGopY."'";
		$result = mysqli_query($con, $update);
		echo $result;
	}

?>