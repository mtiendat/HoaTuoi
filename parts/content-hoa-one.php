<!-- HOA TƯƠI -->
			<section class="hoatuoi">
				<div class="row">
					<!-- Sản phẩm -->
					<div class="col-md-9">
						<h3 class="title-hoa"><a href="page.php?idlh=1">Hoa Tươi</a></h3>
						<div class="row">
							<?php 
								$sql1 = "SELECT * FROM HOA WHERE MA_LOAIHOA = 1 LIMIT 8";
								$query1 = mysqli_query($con,$sql1);
								while ($row1 = mysqli_fetch_array($query1)) {
							?>
							<div class="col-md-3">
								<div class="one-prod">
							
									<div class="row-ne shop-product-card">
											<div class="shop-overlay-product"></div>
											<div type="button" data-id="<?php echo $row1['MA_HOA']; ?>"  class="shop-cart-link btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</div>
											<a href="single.php?id=<?php echo $row1['MA_HOA']; ?>" class="shop-detail-link"><i class="fa fa-link"></i> Xem chi tiết</a>
											<div class="img-one-prod">
												<img src="<?php echo $row1['URL_IMG'];?>" alt="">
											</div>
											<div class="content-one-prod" >
												<h4 class="title-one-prod"><?php echo $row1['TEN_HOA'];?></h4>
												<p class="gia-one-prod"><?php echo number_format($row1['GIABAN']);?> VNĐ</p>
											</div>
										</div>
								
								</div>
							</div>
						<?php } ?>
							<!-- end -->
						</div>
						
					</div>
					<!-- Quảng cáo -->
					<div class="col-md-3">
						<div class="lienket">
							<h4 class="ketnoi">Kết nối với chúng tôi</h4>
							<p class="d-ketnoi">Hãy là một người bạn của shop hoa  để cùng nhau san sẽ mọi kiến thức về hoa, kết nối với chúng tôi để có thêm nhiều thông tin nhất....</p>
							<p class="text-center"><button type=""  class="btn btn90">Kết nối</button></p>
						</div>
						<!-- quang cao -->
						<div class="quangcaogif">
							<h4 class="ketnoi">Đối tác đồng hành</<h4></h4>
							<div class="row">
								<div class="col-md-6">
									<img src="images/qc1.jpg" alt="" width="100%;">
								</div>
								<div class="col-md-6">
									<img src="images/qc2.png" alt="" width="100%;">
								</div>
								<div class="col-md-6">
									<img src="images/qc3.jpg" alt="" width="100%;">
								</div>
								<div class="col-md-6">
									<img src="images/qc4.png" alt="" width="100%;">
								</div>
								<div class="col-md-6">
									<img src="images/qc1.jpg" alt="" width="100%;">
								</div>
								<div class="col-md-6">
									<img src="images/qc2.png" alt="" width="100%;">
								</div>
							</div>
						</div>
						<!-- end qc -->
					</div>
					
				</div>
			</section>
			<!-- END HOA TUOI -->