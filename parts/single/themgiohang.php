<?php
echo "string";
	if (isset($_GET['id'])) {
		echo "chạy";
		$id =  $_GET['id'];
		echo $id;
	}else{
		header('location:index.php');
	}



?>