<div class="container-fluid">
	<div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<h4>Danh Sách Hoa</h4>
				</div>
				<div class="col-md-4 text-right">
					<a href="/hoatuoi/admin.php?tab=add-product">
						<button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Hoa</button>
					</a>
				</div>
			</div>
			<table class="table table-bordered table-striped">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Hình ảnh</th>
						<th>Tên Hoa</th>
						<th>Loại Hoa</th>
						<th>Chủ Đề</th>
						<th>Nhà Cung Cấp</th>
						<th>Giá Bán</th>
						<th>Tùy chỉnh</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$SQL = "SELECT * FROM HOA 
								INNER JOIN LOAIHOA ON HOA.MA_LOAIHOA = LOAIHOA.MA_LOAIHOA
								INNER JOIN CHUDE ON HOA.MA_CD = CHUDE.MA_CD 
								INNER JOIN NHACUNGCAP ON HOA.MA_NCC = NHACUNGCAP.MA_NCC  
								WHERE HOA.DISABLE = 0";
						$QUERY = mysqli_query($con, $SQL);
						while($FLOWER = mysqli_fetch_array($QUERY)){
					?>
					<tr>
						<td><?php echo $i; $i++; ?></td>
						<td><img src="<?php echo $FLOWER['URL_IMG'];?>" style="width: 100px; height: 100"></td>
						<td><?php echo $FLOWER['TEN_HOA']; ?></td>
						<td><?php echo $FLOWER['TEN_LOAIHOA']; ?></td>
						<td><?php echo $FLOWER['TEN_CD']; ?></td>
						<td><?php echo $FLOWER['TEN_NCC']; ?></td>
						<td><?php echo number_format($FLOWER['GIABAN']); ?> VNĐ</td>
						<td>
							<div>
								<a href="admin/execute/edit.php?mahoa=<?php echo $FLOWER['MA_HOA'];?>">
									<button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
								</a>
								<a href="admin.php?tab=edit-product&id=<?php echo $FLOWER['MA_HOA'];?>">
									<button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button>
								</a>
							</div>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>