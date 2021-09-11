<?php
	include '../../connect.php';
	if (isset($_GET['id'])) {
		$del = "DELETE FROM CUAHANG WHERE id = ".$_GET['id'];
		$result = mysqli_query($con, $del);
		echo $result;
	}

?>