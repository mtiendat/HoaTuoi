
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Hoa</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
	<script type="text/javascript" src="js/configs.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- CSS -->


<body>
	<header id="header" class="container-fluid">
		<div class="top-head container-fluid">
			<div class="row">
				<div class="col-md-6">
					<p class="head-description">SHOP BÁN HOA UY TÍN SỐ 1 TRÊN THẾ GIỚI...</p>
				</div>
				<div class="col-md-6">
				 	<p class="text-right text-right-2">
				 		<a href="" class="icon-social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				 		<a href="" class="icon-social"><i class="fa fa-google" aria-hidden="true"></i></a>
				 	</p>
				</div>
			</div>
		</div>
		<div class="content-head container-fluid">
			<div class="row">
				<div class="col-md-3 content-head-l">
					<a href="">
						<img  src="images/logo.png" alt="" class="logo-svg">
					</a>
				</div>
				<div class="col-md-6 content-head-c">
					<nav class="primary-menu">
						<ul class="ul-menu">
							<li><a href="./index.php" title="">Trang Chủ</a></li>
							<li><a href="./page.php" title="">Sản Phẩm</a></li>
							<li><a href="./lienhe.php" title="">Liên Hệ</a></li>
							<?php if(isset($_SESSION['username'])){?>
								<li><a href="./history.php" title="">Lịch Sử Mua Hàng</a></li>
								<li><a id="gopy" title="">Góp ý</a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
				<div class="col-md-3 content-head-r">
					<div class="row">
						<div class="col-md-6">
							 <!-- kiem tra nguoi dung co dang nhap hay chua, neu ton tai se hien thi ten user va co nut thoat -->
							<?php if(isset($_SESSION['username'])){?>
								<a href="thoat.php"><p class="text-center">Thoát</p></a>
								<p class="text-center">Hi! 	<?php echo $_SESSION['username'];?></p>
							<?php }else{?>
								<a href="dangnhap.php"><p class="icon-user text-center"><i class="fa fa-user" aria-hidden="true"></i></p>
								<p  class="text-center" style="font-size: 14px;">Bạn chưa đăng nhập.</p></a>
							<?php } ?>
						</div>
						<div class="col-md-6" id="cart">
							<p class="text-center"><a href="viewcart.php"><i class="fa fa-shopping-cart shopping-cart" aria-hidden="true"></i><span class="count-cart"><?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);} else{ echo "0";}?></span></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
</header><!-- /header -->
