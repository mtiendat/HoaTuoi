<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-8">
		<h4>Danh Sách Nhân Viên</h4>
		</div>
			<div class="col-md-4 text-right">
			<?php if(!isset($_SESSION['chucvu'])){
				echo '
					<a href="/hoatuoi/admin.php?tab=add-nhanvien">
						<button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Nhân Viên</button>
					</a>';
				
			}?>
			</div>
			<table class="table table-bordered" style="margin-top: 8px">
				<thead class="thead-dark">
					<tr>
						<th>#Mã số</th>
						<th>Chức vụ</th>
						<th>Họ Tên</th>
                        <th>SDT</th>
					    <th>Địa chỉ</th>
						<th>Giới Tính</th>
                        <th>Tùy chỉnh</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$SQL_NHANVIEN = "SELECT * FROM NHANVIEN WHERE DISABLE = 0";
						$QUERY_NHANVIEN = mysqli_query($con, $SQL_NHANVIEN);
						while($NHANVIEN = mysqli_fetch_array($QUERY_NHANVIEN)){
					?>
					<tr style="background-color: #fff ">
						<td>#<?php echo $NHANVIEN['MA_NV']; ?></td>
						<td><?php 
                        $SQL_CV = "SELECT TEN_CV FROM CHUCVU WHERE MA_CV =".$NHANVIEN['MA_CV'];
                        $QUERY_CV = mysqli_query($con, $SQL_CV);
                        echo  mysqli_fetch_array($QUERY_CV)['TEN_CV'];
                         ?>
                        </td>
						<td><?php echo $NHANVIEN['TEN_NV']; ?></td>
						<td><?php echo $NHANVIEN['SDT_NV']; ?> </td>
						<td><?php echo $NHANVIEN['DIACHI_NV']; ?> </td>
                        <td><?php 
                            if($NHANVIEN['GIOITINH_NV']==1)
                            echo 'Nữ'; 
                         else  echo 'Nam'; 
                        
                        ?> </td>
						<td style="width: 300px">
						
						<?php if(!isset($_SESSION['chucvu'])){ //tài khoản là bán hàng k được xóa sửa
							echo '
							<div>
								<button class="btn btn-danger" onclick="deleteCuaHang('.$NHANVIEN["MA_NV"].')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
								
								<a href="admin.php?tab=edit-nhanvien&id='.$NHANVIEN["MA_NV"].'">
									<button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button>
								</a>
							</div>
						';
						}else echo '--'
								  ?>
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
            url: 'admin/execute/xoanhanvien',
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