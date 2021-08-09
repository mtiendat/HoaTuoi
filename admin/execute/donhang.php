<?php
	if (isset($_GET['madon'])) {
		$madon = $_GET['madon'];
	}
		
?>
<div class="container">
		<?php 
			$sql1 = "SELECT * FROM DONHANG WHERE MA_DH = '".$madon."'";
			$query1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_array($query1);
		?>
		<h3 class="text-center">Bạn đang kiểm duyệt đơn hàng #<?php echo $row1['MA_DH'];?></h3>
		<p><strong>Khách hàng:</strong> <?php echo $row1['TENKH_DH'];?></p>
		<p><strong>Địa chỉ:</strong> <?php echo $row1['DIACHI_DH'];?></p>
		<p><strong>SĐT:</strong> <?php echo $row1['SDT_DH'];?></p>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Tên Hoa</th>
					<th>Giá Bán</th>
					<th>SL</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = "SELECT * FROM DONHANG INNER JOIN CHITIETDONHANG ON DONHANG.MA_DH = CHITIETDONHANG.MA_DH INNER JOIN HOA ON HOA.MA_HOA = CHITIETDONHANG.MA_HOA WHERE DONHANG.MA_DH = '".$madon."'";
					$query = mysqli_query($con,$sql);
					$i = 1;
					$tong = 0;
					while ($row = mysqli_fetch_array($query)) {
				?>
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo $row['TEN_HOA']; ?></td>
					<td><?php echo number_format($row['GIABAN']); ?> VNĐ</td>
					<td><?php echo $row['SOLUONG'];  ?></td>
					<td><?php echo number_format($row['GIABAN']*$row['SOLUONG']); ?> VNĐ</td>
					<?php $tong += $tong + ($row['GIABAN']*$row['SOLUONG']);?>
				</tr>
				<?php }?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5">Tổng tiền: <?php echo number_format($tong);?> VNĐ</td>
				</tr>
			</tfoot>
		</table>
		<a href="admin/execute/duyetdonne.php?madon=<?php  echo $madon;?>"><button type="" class="btn btn-primary">Duyệt đơn hàng này</button></a>
</div>