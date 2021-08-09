<?php 
if(isset($message)){ 
	echo "<h2>$message</h2>"; 
} 
?>	
<?php 
/*lay du lieu san pham*/
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

$sql1 = "SELECT * FROM HOA WHERE MA_HOA = '".$id."' LIMIT 8";
$query1 = mysqli_query($con,$sql1);
while ($row1 = mysqli_fetch_array($query1)) {
	?>
	<div class="col-md-5">
		<img src="<?php echo $row1['URL_IMG'];?>" alt="" width="100%">
	</div>
	<div class="col-md-7">
			<h1 class="stitle-hoa"><?php echo $row1['TEN_HOA'];?></h1>
			<p class="smota-hoa"><?php echo $row1['YNGHIA'];?></p>
			<p><strong>Giá:</strong> <span class="gia-one-prod"><?php echo number_format($row1['GIABAN']);?> VNĐ </span></p>
			<div class="smota-dai">
				<h4><span>Giới thiệu</span></h4>
				<?php echo $row1['CHITIET'];?>
			</div>
			<div class="add">
				<input id="mahoa" hidden value="<?php echo $row1['MA_HOA'] ?>"/>
				<input type="number" id="quantity" name="quantity" value="1" size="2" /> <input type="submit" class="btn btn-add btn-add-to-cart" value="Thêm vào giỏ">
			</div>
		
	</div>
<?php }?>
<script type="text/javascript">
//nút thêm giỏ hàng của chi tiết, có số lượng
$('.btn-add').click(function (event){
	$.ajax({
		url: "execute/themvaogio.php",
		method: "POST",
		data: { 
			action : "add",
			id: $("#mahoa").val(),
			quantity: $("#quantity").val()
		},
		success : function(response){
			var total =  parseInt($("#cart span").text());//lấy số sp trong giỏ hàng cũ
			if(response == 1){
				alertify.success('Đã thêm vào giỏ hàng');
				$("#cart span").text(total+1); //tăng thêm 1
			}else if(response == 3){
				alertify.success('Đã cập nhật số lượng sản phẩm này trong giỏ hàng');
			}else if(response == 2){
				alertify.error('Có lỗi xảy xa, thử lại sau');
			}
			
			
		}
		});
	})
</script>
</script>
<!-- nút thêm giỏ hàng của sp liên quan ở footer.php-->

