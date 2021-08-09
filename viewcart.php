<?php include 'header.php'; ?>
<?php if(empty($_SESSION['cart'])){header('location:index.php');} ?>
<main id="main" class="container" style="margin: 10px auto; padding: 10px 0px;">
	<h2 class="text-center">Kiểm tra giỏ hàng của bạn</h2>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<caption>Kiểm tra giỏ hàng trước khi thanh toán..</caption>
					<thead>
						<tr>
							<th>#</th>
							<th>Tên hoa</th>
							<th>Số lượng</th>
							<th>Thành giá</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$cart = $_SESSION['cart']; 						
						if (count($cart) > 0) {
							$tongtien = 0;
							$i = 1;
							?>
							<?php foreach($cart as $bdt){?>
								<tr>
									<td><?php echo $i; $i++; ?></td>
									<td><?php echo $bdt['ten'];?></td>
									<td><?php echo $bdt['quantity'];?></td>
									<td><?php echo number_format($bdt['price']*$bdt['quantity']);?> VNĐ</td>
									<td><a href="unsetcartid.php?ma=<?php echo $bdt['id']?>"><button type="" class="btn btn-danger remove-s">X</button></td>
										<?php $tongtien += ($bdt['price']*$bdt['quantity']); ?>
									</tr>
								<?php }?>
								
								<?php		
							}else{
								echo "<tr> <td colspan='5'>";
								echo "<h4 class='text-center text-danger'>Không có sản phẩm nào ở đây</h4>";
								echo "<td><tr>";
							}
							?>
						</tbody>
						<?php if (isset($cart[1])) {?>
							<tfoot>
								<tr>
									<th colspan="5">Tổng: <?php echo number_format($tongtien)?> VNĐ</th>
								</tr>
							</tfoot>
						<?php } ?>
					</table>
					<div class="row">
						<div class="col-md-6">
							<!-- <button type="" class="btn btn-default btn-block">Nút này vui thôi</button> -->
						</div>	
						<div class="col-md-6">
							<a href="thanhtoan.php"><button type="" class="btn btn-primary1  btn-primary btn-block">Tiến hành thanh toán</button></a>
						</div>
						
					</div>
					
				</div>
				<div class="col-md-6">
					<h3 class="text-center title-thanhtoan"> Lời cảm ơn</h3>
					<p class="text-center">Cám ơn bạn đã mua hàng từ shop, ấn vào thanh toán nếu bạn muốn thanh toán đơn hàng này... Bạn có thể cập nhật sửa chữa tại đây trước khi qua trang thanh toán chính thức..</p>
					<p>Bạn có thể tiếp tục mua hàng nếu chưa đồng ý thanh toán</p>
					<a href="./index.php"><button type="" class="btn btn-primary">Tiếp tục mua hàng</button></a>
				</div>
			</div>
		</div>
	</main>

	<?php include 'footer.php'; ?>
