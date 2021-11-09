<?php include 'connect.php';?>

<?php if (!isset($_SESSION['admin'])) {header('location:index.php');} ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/bootstrap1.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
</head>
<body>
  <div class="header">
    <a href="#" id="menu-action">
      <i class="fa fa-bars"></i>
      <span>Đóng</span>
    </a>
    <div class="logo">
      Quản Lý Shop Hoa <button type="button" id="btn-logout" class="btn btn-danger" style="float:right; margin-top:6px; margin-right:14px"><i class="fa fa-sign-out"> Đăng xuất</i></button>
    </div>
  </div>
  <div class="sidebar">
    <ul>
      <li><a href="admin.php?tab=qlsp"><i class="fa fa-archive"></i><span>Quản lý Hoa</span></a></li>
      <li><a href="admin.php?tab=donhang"><i class="fa fa-envelope"></i><span>Đơn hàng</span></a></li>
      <li><a href="admin.php?tab=nhanvien"><i class="fa fa-user"></i><span>Nhân viên</span></a></li>
      <li><a href="admin.php?tab=cuahang"><i class="fa fa-map"></i><span>Cửa hàng</span></a></li>
      <li><a href="admin.php?tab=gopy"><i class="fa fa-envelope-open"></i><span>Thư góp ý</span></a></li>
  </div>

  <!-- Content -->
  <div class="main">
    <?php
				if(!empty($_GET['success'])){
					echo '<input type= "text" id="status" hidden value = '.$_GET['success'].'>';
				}
			?>

      <?php 
          if (empty($_GET['tab'])) {
            include 'admin/admin_qlsp.php';
          }
          else{
            if ($_GET['tab'] == 'qlsp') {
              include 'admin/admin_qlsp.php';
            }
            if ($_GET['tab'] == 'add-product') {
              include 'admin/admin_add.php';
            }
            if ($_GET['tab'] == 'edit-product') {
              include 'admin/admin_edit.php';
            }
            if ($_GET['tab'] == 'donhang') {
              include 'admin/admin_duyetdonhang.php';
            }
            if ($_GET['tab'] == 'nhanvien') {
              include 'admin/admin_nhanvien.php';
            }
            if ($_GET['tab'] == 'edit-nhanvien') {
              include 'admin/admin_edit_nhanvien.php';
            }
            if ($_GET['tab'] == 'cuahang') {
              include 'admin/admin_cuahang.php';
            }
            if ($_GET['tab'] == 'add-cuahang') {
              include 'admin/admin_add_cuahang.php';
            }
            if ($_GET['tab'] == 'edit-cuahang') {
              include 'admin/admin_edit_cuahang.php';
            }
            if ($_GET['tab'] == 'duyetdonhang') {
              include 'admin/execute/donhang.php';
            }
            if ($_GET['tab'] == 'tatcadonhang') {
              include 'admin/admin_all_dh.php';
            }
            if ($_GET['tab'] == 'add-nhanvien') {
              include 'admin/admin_add_nhanvien.php';
            }
            if ($_GET['tab'] == 'gopy') {
              include 'admin/admin_gopy.php';
            }

          }
          ?>
  </div>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('#menu-action').click(function() {
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
    $(this).toggleClass('active');

    if ($('.sidebar').hasClass('active')) {
      $(this).find('i').addClass('fa-close');
      $(this).find('i').removeClass('fa-bars');
    } else {
      $(this).find('i').addClass('fa-bars');
      $(this).find('i').removeClass('fa-close');
    }

    
  });

  // Add hover feedback on menu
  $('#menu-action').hover(function() {
      $('.sidebar').toggleClass('hovered');
  });
  //dang xuat
  $('#btn-logout').click(function (event){
   
      $.ajax({
							url: "admin/execute/dangxuat.php",
							method: "POST",
							data:{},
							success : function(response){
								if(response == "1"){
									alert("Đăng xuất thành công")
                  window.location = "/hoatuoi/dangnhap.php"
								}
							}
						});
    })
  });
  
</script>
 <!-- JavaScript -->
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script>
	if($("#status").val() != null){
		alertify.success($("#status").val());
    $("#status").val(null);
	}
</script>