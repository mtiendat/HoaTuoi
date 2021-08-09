<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

$sql1 = "SELECT * FROM TINTUC INNER JOIN nhanvien ON tintuc.MA_NV = nhanvien.MA_NV WHERE MA_TIN = '".$id."'";
$query1 = mysqli_query($con,$sql1);
while ($row1 = mysqli_fetch_array($query1)) {
	?>

	<div class="col-md-9">
		<h1 class="stitle-hoa"><?php echo $row1['TIEUDE_TIN'];?></h1>
		<p><strong>Đăng bởi:</strong><span> <?php echo $row1['TEN_NV']; ?></span> 	- <strong>Ngày đăng: </strong><span><?php echo $row1['NGAYDANG_TIN']; ?></span></p>
		<p class="smota-hoa"><?php echo $row1['TOMTAT_TIN'];?></p>
		<div class="noidungtin">
			<?php echo $row1['NOIDUNG_TIN'];?>
		</div>
		
	</div>
	<div class="col-md-3">
		<?php include 'parts/getpostnew.php';?>
	</div>
	<?php }?>