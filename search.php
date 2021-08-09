<?php include 'header.php'; ?>

<!-- main -->
<main id="main">
	<div class="container">
		<!-- HOA TƯƠI -->
		<section class="hoatuoi">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
					<h3 class="title-hoa"><?php echo 'Kết quả tìm kiếm của từ khóa "'.$_GET['key'].'"'?></h3>
						<?php if (isset($_GET['key'])) {
							$key = $_GET['key'];
							$sqlkey = "SELECT * FROM HOA WHERE TEN_HOA LIKE '%$key%'";
							$querykey = mysqli_query($con,$sqlkey);
							while ($rowkey = mysqli_fetch_array($querykey)) {?>
								<div class="col-md-3">
									<div class="one-prod">
										<div class="row-ne shop-product-card">
											<div class="shop-overlay-product"></div>
											<div type="button" data-id="<?php echo $rowkey['MA_HOA']; ?>"  class="shop-cart-link btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</div>
											<a href="single.php?id=<?php echo $rowkey['MA_HOA']; ?>" class="shop-detail-link"><i class="fa fa-link"></i> Xem chi tiết</a>
												<div class="img-one-prod">
													<img src="<?php echo $rowkey['URL_IMG'];?>" alt="">
												</div>
												<div class="content-one-prod">
													<h4 class="title-one-prod"><?php echo $rowkey['TEN_HOA'];?></h4>
													<p class="gia-one-prod"><?php echo number_format($rowkey['GIABAN']);?> VNĐ</p>
												</div>
											</div>
										
									</div>
								</div>
								
							<?php }}?>
						</div>
					</div>
					<!-- Quảng cáo -->
					<div class="col-md-3">
						<div class="danhmuc">
							<h4 class="title-danhmuc">Danh mục sản phẩm</h4>
							<ul class="sub-danhmuc">
								<?php 
								$sql1 = "SELECT * FROM CHUDE";
								$query1 = mysqli_query($con,$sql1);
								while ($row1 = mysqli_fetch_array($query1)) {
									?>
									<li><a href="category.php?id=<?php  echo $row1['MA_CD'];?>" class="tag1"><span><?php echo $row1['TEN_CD']; ?></span></a></li>
								<?php }?>
							</ul>
						</div>
						<div class="lienket">
							<h4 class="ketnoi">Kết nối với chúng tôi</h4>
							<p class="d-ketnoi">Hãy là một người bạn của shop hoa  để cùng nhau san sẽ mọi kiến thức về hoa, kết nối với chúng tôi để có thêm nhiều thông tin nhất....</p>
							<p class="text-center"><button type="" class="btn btn90">Kết nối</button></p>
						</div>
		
						
						<!-- quang cao -->
						
						<!-- end qc -->
					</div>
					
				</div>
			</section>
			<!-- END HOA TUOI -->
		</div>
	</main>
	<?php include 'footer.php'; ?>
