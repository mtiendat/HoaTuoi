<?php include 'header.php'; ?>
<?php if(empty($_SESSION['username'])){
	header('location:dangnhap.php');
}?>
	<main id="main" class="container" style="margin: 10px auto; padding: 10px 0px; min-height: 400px;">

		<?php

		$cart = $_SESSION['cart']; 
		//var_dump($cart);
		if (count($cart) > 0) { ?>
		<h2 class="text-center">Giỏ hàng của bạn</h2>
		<hr>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-5">
					<?php $username = $_SESSION['username'];
						$sql_u = "SELECT * FROM TAIKHOAN WHERE username = '".$username."'";
						$query_u = mysqli_query($con,$sql_u);
						$row_u = mysqli_fetch_array($query_u);
						$makh = $row_u['MA_KH'];
					?>

					<h5 class="text-center">Vui lòng hoàn thành thông tin dưới đây để hoàn tất việc mua hàng</h5>
					<hr>
					
						<lable>Tên của bạn:</lable>
						<input type="text" id="makh" value="<?php echo $makh;?>" hidden>
						<input type="text" name="ten" id="ten" value="<?php echo $row_u['TEN_KH'];?>" placeholder="" class="form-control"><br>
						<lable>Địa chỉ của bạn:</lable>
						<input type="text" name="diachi" id="diachi" value="<?php echo $row_u['DIACHI_KH'];?>" placeholder="" class="form-control"><br>
						<lable>Số điện thoại của bạn:</lable>
						<input type="text" name="sdt"  id="sdt" value="<?php echo $row_u['SDT_KH'];?>" placeholder="" class="form-control"><br>
						<button type="submit" class="btn btn-primary1  btn-primary btn-block" id="thanhtoan" name="thanhtoan">Tiến hành thanh toán</button>
					
						
				</div>
				<div class="col-md-7">
					<h4 class="text-center">Thông tin đơn hàng</h4>
					<table class="table">
						<caption>Giỏ hàng của bạn</caption>
						<thead>
							<tr>
								<th>#</th>
								<th>Tên hoa</th>
								<th>Số lượng</th>
								<th>Giá</th>
								<th>Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								
								//var_dump($cart);
								
									$tongtien = 0;
									$i = 1;
							?>
							<?php foreach($cart as $bdt){?>
								<tr>
									<td><?php echo $i; $i++; ?></td>
									<td><?php echo $bdt['ten'];?></td>
									<td><?php echo $bdt['quantity'];?></td>
									<td><?php echo number_format($bdt['price']);?> VNĐ</td>
									<td><?php echo number_format($bdt['price'] *$bdt['quantity']);?> VNĐ</td>
										
									<?php $tongtien +=$tongtien + ($bdt['price'] *$bdt['quantity']); ?>
								</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5">Tổng: <?php echo number_format($tongtien);?> VNĐ</th>
							</tr>
						</tfoot>
					
					</table>
					<div class="row">
						<div class="col-md-12">
							
						</div>							
					</div>
				</div>
				
			</div>
		</div>
		<?php }else{
						echo "<h1 class='text-center'>Giỏ hàng rỗng</h1>";
					}?>
	</main>
	
	<!-- XỮ LÝ THANH TOÁN -->
<script>
	$('#thanhtoan').click(function (event){
	$.ajax({
		url: "execute/thanhtoan.php",
		method: "POST",
		data: { 
			idkh: $("#makh").val(),
			ten : $("#ten").val(),
			diachi: $("#diachi").val(),
			sdt: $("#sdt").val()
		},
		success : function(response){
			
				alertify
					.alert("Thông báo","Đặt hàng thành công", function(){
						window.location ="/hoatuoi/";
					});
			
		}
		});
	})
</script>

<?php include 'footer.php'; ?>
