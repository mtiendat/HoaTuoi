<div class="tintuc">
	<h4 class="ketnoi">Sản phẩm mới</h4>
	<!-- 1 tin -->
	<?php 
	$sql1 = "SELECT * FROM HOA LIMIT 6";
	$query1 = mysqli_query($con,$sql1);
	while ($row1 = mysqli_fetch_array($query1)) {
		?>
		<div class="one-tintuc">
			<a href="single.php?id=<?php echo $row1['MA_HOA'];?>">
				<div class="subone-tintuc">
					<div class="hinh-tintuc">
						<img src="<?php echo $row1['URL_IMG'];?>" alt="" width="100%;">
					</div>
					<div class="content-tintuc">
						<h5 class="title-tintuc"><?php echo $row1['TEN_HOA'];?>"</h5>
						<p class="mota-tintuc"><?php echo number_format($row1['GIABAN']);?>" VNĐ</p>
					</div>
				</div>
			</a>
		</div>
	<?php  } ?>
	<!-- end 1 tin <--></-->
</div>	