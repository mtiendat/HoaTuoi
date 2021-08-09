					<?php
						if (isset($_GET['id'])) {
									$idcd = $_GET['id'];
									$sql2 = "SELECT * FROM HOA WHERE MA_CD = '".$idcd."'";
									$query2= mysqli_query($con,$sql2);
									//lấy tên chủ đề
									$sql_getname = "SELECT * FROM CHUDE WHERE MA_CD = '".$idcd."'";
									$query_getname = mysqli_query($con,$sql_getname);
									$row_getname = mysqli_fetch_assoc($query_getname);

							}
					?>
						<!-- Sản phẩm -->
					<div class="col-md-9">
						<h3 class="title-hoa"><?php echo $row_getname['TEN_CD'];?></h3>
						<div class="row">
							<?php 
								while ($row1 = mysqli_fetch_array($query2)) {
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
											<div class="content-one-prod">
												<h4 class="title-one-prod"><?php echo $row1['TEN_HOA'];?></h4>
												<p class="gia-one-prod"><?php echo number_format($row1['GIABAN']);?> VNĐ</p>
											</div>
										</div>
									
								</div>
							</div>
							<?php  } ?>
						</div>
					</div>	