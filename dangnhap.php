<?php include 'header.php'; ?>
	<div class="main-dangnhap">
		<div class="login">
			<?php if(isset($_SESSION['username'])){

				echo "<h5 class='text-center'>Bạn đã đăng nhập!!</h5>";
				echo "<p class='text-center'><a href='./index.php'>Quay về trang chủ</a></p>";
			}
			else{
			?>
			<h1>Đăng nhập</h1>
		    
		    	<input type="text" name="u" placeholder="Nhập tài khoản..." required="required" class="username orm-control" />
		        <input type="password" name="p" placeholder="Nhập mật khẩu..." required="required" class="password form-control" />
				<p id="error" hidden style="color: red">*Tên đăng nhập hoặc mật khẩu không chính xác</p>
		        <p>Bạn chưa có tài khoản? <a href="./dangky.php">Đăng ký?</a></p>
		        <button type="submit" class="btn btn-primary btn-block btn-large dangnhap">Đăng nhập.</button>
			<?php }?>

		</div>
	</div>
	<?php include 'footer.php'; ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.dangnhap').click(function(event) {
			var u = $('.username').val();
			var p = $('.password').val();
			if ( u =="" || p=="") {
				alert('Bạn cần nhập đầy đủ username & password!!!');
			}
			else{
				$.ajax({
				  url: "execute/xuly-dangnhap.php",
				  method: "POST",
				  data: { 
				  	u : u,
				   	p : p 
				   },
				  success : function(response){
				  	console.log(response);
					  var data = JSON.parse(response);
					 if(data[0]){
						alert(data[0]);
						if(data[1] == 1){ //admin
							window.location ="/hoatuoi/admin.php";//admin chuyển hướng đến admin
						
						}else window.location ="/hoatuoi";//user chuyển hướng đến trang chủ
					 }else $('#error').attr('hidden', false);
				  }
				});
			}
		});
		$('.username').keyup(function(event) {
			$('#error').attr('hidden', true);
		});
		$('.password').keyup(function(event) {
			$('#error').attr('hidden', true);
		});
	});

</script>