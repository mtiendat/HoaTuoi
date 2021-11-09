<div class="container-fluid">
	<div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<h4>Hộp Thư Góp Ý Từ Khách Hàng</h4>
				</div>
			</div>
			<table class="table table-bordered table-striped" style="margin-top: 8px">
				<thead class="thead-dark">
					<tr>
						<th>#ID</th>
						<th>Tên Tài Khoản</th>
						<th>Nội Dung</th>
						<th>Tùy chỉnh</th>
					</tr>
				</thead>
                <tbody>
					<?php 
						$i = 1;
						$SQL_GOPY = "SELECT * FROM GOPY";
						$QUERY_GOPY = mysqli_query($con, $SQL_GOPY);
						while($GOPY = mysqli_fetch_array($QUERY_GOPY)){
					?>
					<tr style="background-color: #fff ">
						<td><?php echo $GOPY['id']; ?></td>
						<td><?php 
                        $SQL_CV = "SELECT TEN_KH FROM TAIKHOAN WHERE MA_KH =".$GOPY['MA_KH'];
                        $QUERY_CV = mysqli_query($con, $SQL_CV);
                        echo  mysqli_fetch_array($QUERY_CV)['TEN_KH'];
                         ?>
                        </td>
						<td><?php echo $GOPY['noidung']; ?></td>
						<td style="width: 300px">
							<?php
							  switch($GOPY['trangthai']){
								case 1: 
									echo '
                                    <button onClick="duyetGopY('.$GOPY['MA_KH'].')" class="btn btn-danger">Duyệt</button>';
									break;
								case 0:
									echo '
                                    <button class="btn btn-success">Đã Duyệt</button>';
									break;
								default: 
								echo "Chưa đọc";
								break;
							}
							?>
						</td>	
					</tr>
				
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<script>
function duyetGopY(id){
	
		$.ajax({
            url: 'admin/execute/gopy.php',
            method: 'GET',
            data: {
                'id': id
            },
            success:function(data){
				console.log(data);
               if(data == 1){
				   location.reload()
			   }
            }
        });
	
}
</script>