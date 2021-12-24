<?php
include '../connect.php';
	
		$ten = $_POST['ten'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		date_default_timezone_set('asia/ho_chi_minh');
		$ngay = date('Y-m-d H:i:s');
		$nhanvien = 1;
		$ghichu ="";
        $makh = $_POST['idkh'];
           
		if ($ten =="" || $diachi =="" || $sdt =="") {
			echo "Bạn cần nhập đầy đủ thông tin!!!";
		}else{
			$taodh = "INSERT INTO donhang(MA_NV, MA_KH, NGAYDAT_DH, GHICHU_DH, SDT_DH, TENKH_DH, DIACHI_DH, DUYET) VALUES ('$nhanvien','$makh','$ngay','$ghichu','$sdt','$ten','$diachi', 0)";
			$carts = $_SESSION['cart'];
			//print_r($cart);
			$query = mysqli_query($con, $taodh);

           	$tong = 0;
            $madh = mysqli_insert_id($con);
			$tong = $madh;
			foreach($carts as $cart) { 
				$idhoa = $cart['id'];
				$slhoa = $cart['quantity'];
				//echo $slhoa;
				$sql_ctdh = "INSERT INTO chitietdonhang(MA_HOA, MA_DH, SOLUONG) VALUES ('$idhoa','$madh','$slhoa')";
				//echo $sql_ctdh;
				
				mysqli_query($con,$sql_ctdh);
			}
			unset($_SESSION['cart']);
			
			echo $tong;
		}
	

?>		