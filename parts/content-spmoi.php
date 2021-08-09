<!-- content san pham moi -->
<section class="sec-pro1">
	<h3 class="title-sec title-sec-1">Sản Phẩm Mới</h3>
	<div class="prod-news">
		<!-- 8  Sản phẩm mới -->
		<?php 
		$sql = "SELECT * FROM HOA  ORDER BY MA_HOA LIMIT 8";
		$query = mysqli_query($con,$sql);
		while ($row = mysqli_fetch_array($query)) {
			?>
			<div class="one-prod">

					<div class="row-ne  shop-product-card">
							<div class="shop-overlay-product"></div>
                            <div type="button"  data-id="<?php echo $row['MA_HOA']; ?>"  class="shop-cart-link btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</div>
                            <a href="single.php?id=<?php echo $row['MA_HOA']; ?>" class="shop-detail-link"><i class="fa fa-link"></i> Xem chi tiết</a>
						<div class="img-one-prod">
							<img src="<?php echo $row['URL_IMG']; ?>" alt="">
						</div>
						<div class="content-one-prod">
							<h4 class="title-one-prod"><?php echo $row['TEN_HOA']; ?></h4>
							<p class="gia-one-prod"><?php echo number_format($row['GIABAN']); ?> VNĐ</p>
						</div>
							<!-- Thêm vào giỏ và xem chi tiết -->
                            
					</div>
			
			</div>
			<!-- Sản phẩm mới -->
		<?php }?>
	</div>
</section>
