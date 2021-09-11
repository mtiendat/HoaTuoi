<?php
	include '../connect.php';
	$u = $_POST["u"];
	$p = $_POST["p"];
	$p1 = md5($p);
 	$sql = "SELECT * FROM TAIKHOAN WHERE USERNAME = '".$u."' AND PASSWORD ='".$p1."'";
 	$query = mysqli_query($con,$sql);
 	$count = mysqli_num_rows($query);
	$user = mysqli_fetch_array($query);
 	if ($count >= 1){
		$_SESSION['userid'] = $user['MA_KH'];
		 if($user['LOAI_TK']== null){
			$_SESSION['username'] = $u;
			echo json_encode(["Đăng nhập thành công. Xin chào ". $user['TEN_KH'], 0]);
		 }else if($user['LOAI_TK']== 1) {
			$sql_nv = "SELECT * FROM NHANVIEN WHERE MA_KH = '".$user['MA_KH']."'";
			$query_nv = mysqli_query($con, $sql_nv);
			$NHANVIEN = mysqli_fetch_array($query_nv);

			$sql_cv = "SELECT * FROM CHUCVU WHERE MA_CV = '".$NHANVIEN['MA_CV']."'";
			$query_cv = mysqli_query($con,$sql_cv);
			$CHUCVU = mysqli_fetch_array($query_cv);

			if($CHUCVU['TEN_CV'] == "bán hàng" || $CHUCVU['MA_CV'] == 2){
				$_SESSION['chucvu'] = "bán hàng"; 
			}
			 $_SESSION['admin'] = $u; //admin
			 echo json_encode(["Đăng nhập thành công. Xin chào ". $user['TEN_KH'], 1]);
		 }
 		
 		
 		/*echo 1;*/
 	}else{
 		echo '0';
 	}
	exit();
?>