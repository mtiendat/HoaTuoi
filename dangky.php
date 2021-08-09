<?php include 'header.php'; ?>
	<div class="main-dangnhap">
		<div class="login">
			
			<?php if(isset($_SESSION['username'])){

				echo "<h6 style='color:#fff;'>Hello! <strong style='text-transform:uppercase;'>".$_SESSION['username'] . "</strong> dường như bạn đang lạc đường...</h6> ";
				echo "<p class='text-center'><a href='index.php'>Quay về nào!!!</a></p>";
			}else{
			?>
			<h1>Đăng ký</h1>
		    
		    	<input type="text" name="ten" id="ten"  placeholder="Nhập  tên tài khoản..." class="ten form-control" required="required" />
		    	<input type="text" name="user" id="user"   placeholder="Nhập tài khoản..." class="username form-control" required="required" />
		        <input type="password" name="pwd" id="pwd"   placeholder="Nhập mật khẩu..." class="pwd form-control" required="required" />
		        <input type="password" name="pwd1" id="pwd1"   placeholder="Nhập lại mật khẩu..." class="pwd1 form-control" required="required" />
		        <input type="text" name="diachi"  id="diachi"  placeholder="Nhập địa chỉ..." class="diachi form-control" required="required" />
		        <input type="phone" name="sdt" id="sdt"  placeholder="Nhập số điện thoại..." class="sdt form-control" required="required" />
		        <p id="error" hidden style="color: red">*Tên tài khoản đã được sử dụng</p>
				<p>Bạn đã có tài khoản? <a href="./dangnhap.php">Đăng nhập?</a></p>
		        <div class="row">
		        	<div class="col-md-6">
		        		<button type="button" class="btn btn-primary btn-block btn-large dangky">Đăng ký.</button>
		        	</div>
		        	<div class="col-md-6">
		        		<button type="reset" class="btn btn-default btn-block btn-large reset">Nhập lại.</button>
		        	</div>
		        </div>   
		    
		    <?php }?>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.username').keyup(function(event) {
						var user = $('#user').val();
						//alert(user);
						$.ajax({
						  url: "execute/check-username.php",
						  method: "POST",
						  data: { user : user },
						  success : function(response){
							console.log(response);
						  	if (response == 1) {
								$('#error').attr('hidden', false);		
						  	}if(response == 0){
								$('#error').attr('hidden', true);	
						  	}
						  }
						});
				});
				$('.pwd1').keyup(function(event) {
					var pwd = $('.pwd').val();
					var pwd1 = $('.pwd1').val();
					if (pwd != pwd1) {
						$('.pwd').css({
						  	'background-color': '#ff00007a'
						 });
						$('.pwd1').css({
						  	'background-color': '#ff00007a'
						 });
					}else{
						$('.pwd').css({
						  	'background-color': '#087b086e'
						 });
						$('.pwd1').css({
						  	'background-color': '#087b086e'
						 });
					}			
				});
				$('.dangky').click(function(event) {
					//alert('click');
					if(validateDangKy() == true){
						var username = $('.username').val();
						var pwd = $('.pwd').val();
						var pwd1 = $('.pwd1').val();
						var diachi = $('.diachi').val();
						var sdt = $('.sdt').val();
						var ten = $('.ten').val();
						$.ajax({
							url: "execute/xuly-dangky.php",
							method: "POST",
							data: { 
								username : username,
								pwd : pwd,
								pwd1 : pwd1,
								diachi : diachi,
								sdt : sdt,
								ten : ten
							},
							success : function(response){
								console.log(response);
								if(response == "4"){
									$('#error').attr('hidden', false); //hiện lỗi
								}else{
									if(response.indexOf("Duplicate entry")>=0){
										$('#error').attr('hidden', false); //hiện lỗi
									}else {
										alert(response);
										window.location ="/hoatuoi/dangnhap";
									}
								}
							}
						});
					}
				});
				$('.reset').click(function (event){
					$("#ten").val("");
					$("#user").val("");
					$("#sdt").val("");
					$("#diachi").val("");
					$("#pwd").val("");
					$("#pwd1").val("");
				});
					
				function validateDangKy(){
					var kiemtra = true;
					var rexPhone =/^(\+84|0)+([3|5|7|8|9])+([0-9]{8})$/;
					if($("#ten").val()==""){
						if(!jQuery('#ten').hasClass('required')){
							$("#ten").addClass('required');
							var required = $('<span style="color:red">Họ tên không được để trống</span>');
							$("#ten").after(required);	
						}
						kiemtra = false;
					}
					if($("#user").val()==""){
						if(!jQuery('#user').hasClass('required')){
							$("#user").addClass('required');
							var required = $('<span style="color:red">Tên tài khoản không được để trống</span>');
							$("#user").after(required);
						}
						kiemtra = false;
					}
					
					if($("#diachi").val()==""){
						if(!jQuery('#diachi').hasClass('required')){
							$("#diachi").addClass('required');
							var required = $('<span style="color:red">Địa chỉ không được để trống</span>');
							$("#diachi").after(required);
						}
						kiemtra = false;
					}
					if($("#pwd").val()==""){
						if(!jQuery('#pwd').hasClass('required')){
						$("#pwd").addClass('required');
						var required = $('<span style="color:red">Password không được để trống</span>');
						$("#pwd").after(required);
						}
						kiemtra = false;
					}
					if($("#pwd1").val()==""){
						if(!jQuery('#pwd1').hasClass('required')){
							$("#pwd1").addClass('required');
							var required = $('<span style="color:red">Xác nhận Password không được để trống</span>');
							$("#pwd1").after(required);
						}
						kiemtra = false;
					}else if($("#pwd1").val() != $("#pwd").val()){
						if(!jQuery('#pwd1').hasClass('required1')){
							$("#pwd1").addClass('required1');
							var required1 = $('<p><span style="color:red">Xác nhận Password không chính xác</span></p>');
							$("#pwd1").after(required1);
						}
						kiemtra = false;
					}
					if($("#sdt").val()==""){
						if(!jQuery('#sdt').hasClass('required')){
							$("#sdt").addClass('required');
							var required = $('<span style="color:red">Số điện thoại không được để trống</span>');
							$("#sdt").after(required);
						}
						kiemtra = false;
					}else if($("#sdt").val().length>10){
						if(!jQuery('#sdt').hasClass('required1')){
							$("#sdt").addClass('required1');
							var required1 = $('<span style="color:red">SDT không hợp lệ</span>');
							$("#sdt").after(required1);
						}
						kiemtra = false;
					}else if(!$("#sdt").val().match(rexPhone)){
						if(!jQuery('#sdt').hasClass('required2')){
							$("#sdt").addClass('required2');
							var required2 = $('<span style="color:red">SDT phải là số Việt Nam</span>');
							$("#sdt").after(required2);
						}
						kiemtra = false;
					}
					return kiemtra;
				}
			});
		</script>
	</div>
	<?php include 'footer.php'; ?>