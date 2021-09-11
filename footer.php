<footer class="footer">
	<div class="footer-left col-md-4 col-sm-6">
		<p class="about">
			<span> Về chúng tôi</span> Mục đích chính của chúng tôi là đem lại giá trị tinh hoa về cái đẹp đến cho mọi người cùng thưởng thức, đến với chúng tôi mọi người sẽ được hòa mình vào thiên nhiên, tận hưởng được sự lãng mạn ngọt ngào của tạo hóa!
		</p>
		<div class="icons">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-google-plus"></i></a>
			<a href="#"><i class="fa fa-instagram"></i></a>
		</div>
	</div>
	<div class="footer-center col-md-4 col-sm-6">
		<div>
			<i class="fa fa-map-marker"></i>
			<p>Vĩnh Long, Việt Nam</p>
		</div>
		<div>
			<i class="fa fa-phone"></i>
			<p> (+84) 0939004357</p>
		</div>
		<div>
			<i class="fa fa-envelope"></i>
			<p><a href="#"> huynhchitdn@gmail.com</a></p>
		</div>
	</div>
	<div class="footer-right col-md-4 col-sm-6">
	<img width="20%" src="images/logo.png" alt="" class="logo-svg">
		<p class="menu">
			<a href="#"> Trang chủ</a> |
			<a href="#"> Sản phẩm</a> |
			<a href="#"> Giới Thiệu</a> |
			<a href="#"> Tin tức </a> |
			<a href="#"> Về chúng tôi</a> |
			<a href="#"> Liên hệ</a>
		</p>
	</div>
</footer>
</body>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>

  <!-- JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script type="text/javascript">
	$(document).ready(function() {
		$('.sub-slider').slick({
			arrows: false,
			dots: true,
			infinite: false,
			speed: 300
		});
		$('.prod-news').slick({
			dots: true,
			infinite: false,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		    ]
		});
		$('.sub-sanpham').slick({
			dots: true,
			infinite: false,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		    ]
		});
	});
    $('.btn-add-to-cart').click(function (event){
		var id = $(this).data('id');
		$.ajax({
			url: "execute/themvaogio.php",
			method: "POST",
			data: { 
				action : "add",
				id: id,
				quantity: 1
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
	//Gop ý
	$('#gopy').click(function (event){
		$('#modalGopY').modal('show');
	})
	$('#guigopy').click(function (event){
		$.ajax({
			url: "execute/xu-ly-gop-y.php",
			method: "POST",
			data: { 
				noidung: $("#noidunggopy").val()
			},
			success : function(response){
				if(response==1){
					alertify.success("Gửi thành công");
				}
				
			}
		});
	})

</script>

<?php ob_end_flush(); ?>