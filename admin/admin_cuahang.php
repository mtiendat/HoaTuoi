
<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-8">
		<h4>Danh Sách Cửa Hàng</h4>
		</div>
			<div class="col-md-4 text-right">
			<?php if(!isset($_SESSION['chucvu'])){
				echo '<a href="/hoatuoi/admin.php?tab=add-cuahang">
							<button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Cửa Hàng</button>
						</a>';
			}?>
				</div>
			<table class="table table-bordered" style="margin-top: 8px">
				<thead class="thead-dark">
					<tr>
						<th>#Mã số</th>
						<th>Tên Cửa Hàng</th>
						<th>Địa Chỉ</th>
						<th>Hình Ảnh</th>
                        <th>Tùy chỉnh</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$SQL_CUAHANG = "SELECT * FROM CUAHANG";
						$QUERY_CUAHANG = mysqli_query($con, $SQL_CUAHANG);
						while($CUAHANG = mysqli_fetch_array($QUERY_CUAHANG)){
					?>
					<tr style="background-color: #fff ">
						<td>#<?php echo $CUAHANG['id']; ?></td>
						<td><?php echo $CUAHANG['tencuahang']; ?></td>
						<td><?php echo $CUAHANG['diachi']; ?> </td>
						<td><?php echo $CUAHANG['hinhanh']; ?> </td>
						<td style="width: 300px">
						<?php if(!isset($_SESSION['chucvu'])){

							echo '<div>
								
							<button class="btn btn-danger" onclick="deleteCuaHang('.$CUAHANG['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
							
							<a href="admin.php?tab=edit-cuahang&id='. $CUAHANG['id'].'">
								<button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button>
							</a>
						</div>
					';
						 }else echo '--'?>
						</td>
					</tr>
					
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
	if (isset($_POST['checker'])) {
        $id = $_POST['id'];
		$status = $_POST['status'];
		$UPDATE = "UPDATE DONHANG SET DUYET = $status WHERE MA_DH = '".$id."'";
		mysqli_query($con, $UPDATE);
		header("Refresh:0");
    }
?>
<script>
function deleteCuaHang(id){
	var r = confirm("Bạn có muốn xóa?");
	if (r == true) {
		$.ajax({
            url: 'admin/execute/xoacuahang.php',
            method: 'GET',
            data: {
                'id': id
            },
            success:function(data){
               if(data == 1){
				   location.reload()
			   }
            }
        });
	}
}
</script>
