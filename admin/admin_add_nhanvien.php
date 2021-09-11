<div class="container-fluid">
    <h3>Thêm Nhân Viên</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Họ và Tên:</label>
                    <input required="true" type="text" id="name" value="" placeholder="Nhập Họ và Tên..." class="form-control">
                    
                    <label>Số Điện Thoại:</label>
                    <input required="true" type="text" id="phone" value="" placeholder="Nhập số điện thoại.." class="form-control">
                
                    
                    <label>Địa chỉ:</label>
                    <input required="true" type="text" id="address" value="" placeholder="Nhập địa chỉ.." class="form-control"> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Giới tính:</label>
                    <select required="true" id="sex" class="form-control">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                    


                    <label for="">Chức vụ:</label>
                    <select required="true" id="type" class="form-control">
                        <?php 
                            $SQL_TYPE = "SELECT * FROM CHUCVU";
                            $QUERY_TYPE = mysqli_query($con, $SQL_TYPE);
                            while($TYPE = mysqli_fetch_array($QUERY_TYPE)){
                        ?>
                        <option value="<?php echo $TYPE['MA_CV'];?>" ><?php echo $TYPE['TEN_CV']; ?></option>
                        <?php }?>
                    </select>
                        <p></p>
                    <button class="btn btn-primary themtaikhoan" type="submit" id="add">THÊM MỚI</button>
                </div>
            </div>
             <div class="col-md-9"style="margin-top:10px">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Tài khoản:</label>
                    <input required="true" type="text" id="username" value="" placeholder="Nhập username..." class="form-control">
                    
                    <label>Password:</label>
                    <input required="true" type="password" id="pwd" value="" placeholder="Nhập password..." class="form-control">

                    <label>Nhập lại password:</label>
                    <input required="true" type="password" id="pwd1" value="" placeholder="Nhập password..." class="form-control">
                    <p id="error" hidden style="color: red">*Tên tài khoản đã được sử dụng</p>
                </div>
            </div>
        </div>
   
</div>
<script>
    $(document).ready(function() {
				$('#username').keyup(function(event) {
						var user = $('#username').val();
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

                $('#pwd').keyup(function(event) {
					clearValidate($('#pwd'));			
				});
				$('#pwd1').keyup(function(event) {
					clearValidate($('#pwd1'));			
				});
                $('#phone').keyup(function(event) {
                    clearValidate($('#phone'));
                });
				$('.themtaikhoan').click(function(event) {
					if(validateDangKy() == true){
						var username = $('#username').val();
						var pwd = $('#pwd').val();
						var address = $('#address').val();
						var phone = $('#phone').val();
						var name = $('#name').val();
                        var type = $('#type').val();
                        var sex = $('#sex').val();
                      
						$.ajax({
							url: "admin/execute/themnhanvien.php",
							method: "POST",
							data: { 
								username : username,
								pwd : pwd,
								address : address,
								phone : phone,
								name : name,
                                type: type,
                                sex: sex
							},
							success : function(response){
								console.log(response);
								if(response == "4"){
									$('#error').attr('hidden', false); //hiện lỗi
								}else{
									if(response.indexOf("Duplicate entry")>=0){
										$('#error').attr('hidden', false); //hiện lỗi
									}else {
										
										window.location ="admin.php?tab=nhanvien&success="+response;
									}
								}
							}
						});
					}
				});
				$('.reset').click(function (event){
					$("#name").val("");
					$("#username").val("");
					$("#phone").val("");
					$("#address").val("");
					$("#pwd").val("");
					$("#pwd1").val("");
				});
					
				function validateDangKy(){
					var kiemtra = true;
					var rexPhone =/^(\+84|0)+([3|5|7|8|9])+([0-9]{8})$/;
					
					
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
					if($("#phone").val()==""){
						if(!jQuery('#phone').hasClass('required')){
							$("#phone").addClass('required');
							var required = $('<span style="color:red">Số điện thoại không được để trống</span>');
							$("#phone").after(required);
						}
						kiemtra = false;
					}else if($("#phone").val().length > 10){
						if(!jQuery('#phone').hasClass('required1')){
							$("#phone").addClass('required1');
							var required1 = $('<span style="color:red">số điện thoại không hợp lệ</span>');
							$("#phone").after(required1);
						}
						kiemtra = false;
					}else if(!$("#phone").val().match(rexPhone)){
						if(!jQuery('#phone').hasClass('required2')){
							$("#phone").addClass('required2');
							var required2 = $('<span style="color:red">số điện thoại phải là số Việt Nam</span>');
							$("#phone").after(required2);
						}
						kiemtra = false;
					}
					return kiemtra;
				}
                function clearValidate(id){
                    if(id.hasClass('required')){
                        id.removeClass('required');
                        id.next().remove();
                    }
                }
			});
</script>



