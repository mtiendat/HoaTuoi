<?php
include '../connect.php';
	if(isset($_POST['user'])){

		$user = $_POST['user'];
		$sql = "SELECT * FROM TAIKHOAN WHERE USERNAME = '".$user."'";
 		$query = mysqli_query($con,$sql);
 		$count = mysqli_num_rows($query);
 		if ($count > 0) {
 			echo 1;
 		}else{
 			echo 0;
 		}
	}

?>