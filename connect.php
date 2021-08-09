<?php
	
	//khởi tạo session
	session_start();
	//tạo bộ nhớ đệm
	ob_start();
	//mở kết nối đến csdl hoa
	$con = mysqli_connect('localhost','root','','hoatuoimoi') or die('Có lỗi xãy ra! Kết nối CSDL thất bại');

	//chuyển về bản mã UTF-8
	mysqli_set_charset($con,"utf8");

?>