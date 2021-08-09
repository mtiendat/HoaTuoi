<!DOCTYPE html>
<html>
<head>
	<?php session_start();?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/admin.css">
</head>
<body>
	<div class="login">
		<h1>Login quản trị</h1>
	    <form method="post">
	    	<input type="text" name="u" placeholder="Username" required="required" />
	        <input type="password" name="p" placeholder="Password" required="required" />
	        <button type="submit" class="btn btn-primary btn-block btn-large" name="dangnhap">Đăng nhập</button>
	    </form>
	</div>
	<?php
		if (isset($_SESSION['admin'])) {
			header('location:admin.php?tab=tongquan');
		}
		if (isset($_POST['dangnhap'])) {
			$p = $_POST['p'];
			$u = $_POST['u'];
			if ($p == 'admin' && $u == 'admin') {
				$_SESSION['admin'] = $p;
				header('location:admin.php');
			}else{
				echo "Đăng nhập thất bại!";
			}
		}
	?>
</body>
</html>