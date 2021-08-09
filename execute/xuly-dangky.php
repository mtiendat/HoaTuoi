<?php
	include '../connect.php';
	$username = $_POST["username"];
	$ten = $_POST['ten'];
	$pwd = $_POST["pwd"];
	$pwd1 = $_POST["pwd1"];
	$diachi = $_POST["diachi"];
	$sdt = $_POST["sdt"];


 	//echo $ma_kh;
 	
 	 		$pwd = md5($pwd);
 	 		$insert = "INSERT INTO taikhoan(TEN_KH, USERNAME, PASSWORD, DIACHI_KH, SDT_KH, LOAI_TK) VALUES ('$ten','$username','$pwd','$diachi','$sdt', NULL)";
		  	$query = mysqli_query($con, $insert) or die(mysqli_error($con));
			if($query){
				$_SESSION['user'] = $username;
				echo "Chúc mừng bạn đã đăng ký thành công";
			}else echo 4
 	 		
 	 		/*header('location:index.php');*/
 	 	
 	 
?>