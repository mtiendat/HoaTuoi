<?php
	include '../connect.php';
	$u = $_POST["u"];
	$p = $_POST["p"];
	$p1 = md5($p);
 	$sql = "SELECT * FROM TAIKHOAN WHERE USERNAME = '".$u."' AND PASSWORD ='".$p1."'";
 	$query = mysqli_query($con,$sql);
 	$count = mysqli_num_rows($query);
	$user = mysqli_fetch_array($query);
 	// echo $sql;
	
 	if ($count >= 1){
		 if($user['LOAI_TK']==null){
			$_SESSION['username'] = $u;
			$_SESSION['userid'] = $user['MA_KH'];
		 }else if($user['LOAI_TK']== '1') $_SESSION['admin'] = $u; //admin
 		
 		echo "Đăng nhập thành công. Xin chào ". $user['TEN_KH'];
 		/*echo 1;*/
 	}else{
 		echo '0';
 	}
	exit();
?>