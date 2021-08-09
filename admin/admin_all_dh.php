<div class="container-fluid">
	<h3>Đơn hàng</h3>
	<div class="row">
		<div class="col-md-12">
			<h4>Tất Cả Đơn Hàng</h4>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>#Mã số</th>
						<th>Ngày Đặt</th>
						<th>Người đặt</th>
						<th>Địa chỉ</th>
						<th>SDT</th>
						<th>Chi tiết</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$SQL_ORDER = "SELECT * FROM DONHANG";
						$QUERY_ORDER = mysqli_query($con, $SQL_ORDER);
						while($ORDER = mysqli_fetch_array($QUERY_ORDER)){
					?>
					<tr style="background-color: #fff ">
						<td>Đơn #<?php echo $ORDER['MA_DH']; ?></td>
						<td><?php echo $ORDER['NGAYDAT_DH']; ?></td>
						<td><?php echo $ORDER['TENKH_DH']; ?></td>
						<td><?php echo $ORDER['DIACHI_DH']; ?> </td>
						<td><?php echo $ORDER['SDT_DH']; ?> </td>
						<td style="width: 300px">
							<?php
							  switch($ORDER['DUYET']){
								case 0: 
									echo "Đang chờ xác nhận";
									break;
								case 1:
									echo "Đơn hàng đã xác nhận";
									break;
								case 2:
									echo "Đơn bị hủy";
									break;
								default: 
								echo "Đơn bị hủy";
								break;
							}
							?>
						</td>	
					</tr>
					<tr class="align-middle">
						<?php
							$DO_ID = $ORDER['MA_DH'];
							$SQL_ORDER_DETAIL = "SELECT * FROM CHITIETDONHANG
							INNER JOIN HOA ON HOA.MA_HOA = CHITIETDONHANG.MA_HOA
							WHERE MA_DH = $DO_ID";
							$QUERY_ORDER_DETAIL = mysqli_query($con, $SQL_ORDER_DETAIL);
							while($ORDER_DETAIL = mysqli_fetch_array($QUERY_ORDER_DETAIL)){
						?>
						
							<td></td>
							<td colspan="5">
								<div class="row">
									<div class="col-md-1">
										<img src="<?php echo $ORDER_DETAIL['URL_IMG'] ?>" width="60px" style="border-radius: 5px"/>
									</div>
									<div class="col-md-2">
										<strong><?php echo $ORDER_DETAIL['TEN_HOA'] ?></strong>
									</div>
									<div class="col-md-2">
										<strong><?php echo $ORDER_DETAIL['SOLUONG'] ?></strong> đơn vị
									</div>
									<div class="col-md-2">
										<strong><?php echo number_format($ORDER_DETAIL['GIABAN']) ?></strong> đ
									</div>
									<div class="col-md-2">
										<strong><?php echo number_format($ORDER_DETAIL['SOLUONG'] * $ORDER_DETAIL['GIABAN']) ?></strong> đ
									</div>
								</div>
							</td>
							</tr>
						<?php }?>
					<tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>