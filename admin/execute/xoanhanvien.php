<?php
	include '../../connect.php';
	if (isset($_GET['id'])) {
		
		$getMAKH = "SELECT MA_KH FROM NHANVIEN WHERE MA_NV = ".$_GET['id'];
		$result = mysqli_query($con, $getMAKH);
		$data =  mysqli_fetch_array($result);
		$delNV = "DELETE FROM NHANVIEN WHERE MA_NV = ".$_GET['id'];
		$result = mysqli_query($con, $delNV);
		$delTK = "DELETE FROM TAIKHOAN WHERE MA_KH = ".$data[0];
		$result = mysqli_query($con, $delTK);
		
		echo $result;
	}

?>