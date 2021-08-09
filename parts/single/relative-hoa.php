<!-- san pham lien quan -->
<section class="sanpham-relative">
	<h3 class="title-hoa">Sản phẩm liên quan</h3>

	<div class="sub-sanpham">
		<?php 
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}
		
		$sql1 = "SELECT * FROM HOA LIMIT 8";
		$query1 = mysqli_query($con,$sql1);
		while ($row1 = mysqli_fetch_array($query1)) {
			?>
			<div class="one-prod">
				
				<div class="row-ne shop-product-card">
								<div class="shop-overlay-product"></div>
								<div type="button" data-id="<?php echo $row1['MA_HOA']; ?>"  class="shop-cart-link btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</div>
								<a href="single.php?id=<?php echo $row1['MA_HOA']; ?>" class="shop-detail-link"><i class="fa fa-link"></i> Xem chi tiết</a>
						<div class="img-one-prod">
							<img src="<?php echo $row1['URL_IMG'];?>" alt="">
						</div>
						<div class="content-one-prod">
							<h4 class="title-one-prod"><?php echo $row1['TEN_HOA'];?></h4>
							<p class="gia-one-prod"><?php echo number_format($row1['GIABAN']);?> VNĐ</p>
						</div>
					</div>
			</div>
		<?php }?>
	</div>
	
</section>
<!-- end -->

<!-- phần code thêm giỏ hàng bằng ajax ở footer.php-->