<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
			<h4>Danh Sách Nhân Viên</h4>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>#Mã số</th>
						<th>Chức vụ</th>
						<th>Họ Tên</th>
                        <th>SDT</th>
					    <th>Địa chỉ</th>
						<th>Giới Tính</th>
                        <th></th>
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
                        <button class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</button>
                        <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
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