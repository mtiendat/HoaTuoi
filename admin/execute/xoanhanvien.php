<?php
	include '../../connect.php';
	if (isset($_GET['id'])) {
		$del = "DELETE FROM NHANVIEN WHERE MA_NV = ".$_GET['id'];
		$result = mysqli_query($con, $del);
		echo $result;
	}

?>