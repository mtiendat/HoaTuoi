<?php include 'header.php'; ?> 
<?php include 'slider.php'; ?> 
	
	<!-- main -->
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-3 sidebar">
					<div class="danhmuc">
						<h4 class="title-danhmuc">Danh mục sản phẩm</h4>
						<ul class="sub-danhmuc">
							<?php 
								$sql1 = "SELECT * FROM CHUDE";
								$query1 = mysqli_query($con,$sql1);
								while ($row1 = mysqli_fetch_array($query1)) {
							?>
							<li><a href="category.php?idcd=<?php  echo $row1['MA_CD'];?>" class="tag1"><span><?php echo $row1['TEN_CD']; ?></span></a></li>
							<?php }?>
							
						</ul>
					</div>
				</div>
				<div class="col-md-9 mainchinh">
					<?php include 'parts/content-spmoi.php';?>
				</div>
			</div>
			<section class="hello">
						<h2 class="hello-title">Vì em xứng đáng với những điều tốt đẹp nhất!</h2>
						<p class="hello-description">Anh sẽ là người nhìn vào mắt em và nói rằng em là người tuyệt vời nhất mà anh từng gặp, và có lẽ đó sẽ là lần đầu tiên trong cuộc đời, em thực sự tin rằng...</p>
			</section>
			<?php include 'parts/content-hoa-one.php';?>
			<section class="banner">
				<div class="sub-banner">
					<h3 class="text-center padding-banner">Luôn có một người đang đứng đợi, và thương em...</h3>
					<p class="text-center ">Có ai đó đã từng nói với tôi rằng, khi bạn yêu một ai đó chưa chắc bạn đã thương người ta, nhưng khi bạn thương một người thì chắc chắn bạn đã yêu người ta mất rồi...</p>
				</div>
			</section>
			<?php include 'parts/content-hoa-two.php';?>
		</div>
	</main>
	<div class="modal fade" id="modalGopY" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hộp thư góp ý</h4>
        </div>
        <div class="modal-body">
		<div class="col-mb-3">
			<label class="mb-5 fw-600">Nội dung</label>
			<textarea class="form-control" style="height: 150px;" type='text' id='noidunggopy' name="noidung" placeholder='Nhập nội dung'></textarea>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-success" id="guigopy">Gửi</button>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php';  ?>
