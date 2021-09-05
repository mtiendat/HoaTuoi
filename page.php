<?php include 'header.php'; ?>

	<!-- main -->
	<main id="main">
		<div class="container">
			<!-- HOA TƯƠI -->
			<section class="hoatuoi">
				<div class="row">
					<?php include 'parts/content-page.php';?>
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
							<p class="d-ketnoi">Hãy là một người bạn của cửa hàng hoa để cùng nhau san sẽ mọi kiến thức về hoa, kết nối với chúng tôi để có thêm nhiều thông tin nhất....</p>
							<p class="text-center"><button type="" class="btn btn90">Kết nối</button></p>
						</div>
				
						
						<!-- quang cao -->
					
						<!-- end qc -->
					</div>
					
				</div>
			</section>
			<div class="phantrang">
				<p>Chọn trang tiếp theo để xem thêm sản phẩm</p>
			
				<div class="pagination pagination-number">	
					<ul>
					  <li class="inactive"><a href="/">1</a></li>
					  <li class="inactive"><a href="/">2</a></li>
					  <li class="inactive"><a href="/">3</a></li>
					  <li class="active"><a href="/">4</a></li>
					  <li class="inactive"><a href="/">5</a></li>
					  <li class="inactive"><a href="/">›</a></li>
					  <li class="inactive"><a href="/">»</a></li>
					</ul>
				</div>
			</div>
			<!-- END HOA TUOI -->
		</div>
	</main>
<?php include 'footer.php'; ?>
