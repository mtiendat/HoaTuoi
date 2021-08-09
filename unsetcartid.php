<?php
	if (isset($_GET['ma'])){
		session_start();
		$mane = $_GET['ma'];
		unset($_SESSION['cart'][$mane]);
		header('location:viewcart.php');
	}
?>