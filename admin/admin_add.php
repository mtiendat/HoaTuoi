<div class="container-fluid">
<form method="POST" enctype="multipart/form-data">
    <h3>Thêm Hoa</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Tên Hoa:</label>
                    <input required="true" type="text" name="name" value="" placeholder="Nhập tên hoa.." class="form-control">
                    
                    <label>Ý nghĩa:</label>
                    <textarea required="true" name="mean" class="form-control" class="mota"></textarea>
                
                    
                    <label>Nội dung:</label>
                    <script src="ckeditor/ckeditor.js"></script>
                    <textarea style="height: 400px" required="true" name="content" class="form-control" class="content"></textarea>
                    <script>
                        CKEDITOR.config.height = 450; 
                        CKEDITOR.replace('content');
                    </script>  
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Màu Sắc:</label>
                    <input required="true" type="text" name="color" value="" placeholder="Nhập màu hoa.." class="form-control">
                    
                    
                    <label>Giá:</label>
                    <input required="true" type="text" name="price" value="" placeholder="Nhập giá bán."  onkeypress="return isNumberKey(event)" class="form-control">


                    <label for="">Chọn loại hoa:</label>
                    <select required="true" name="type" class="form-control">
                        <?php 
                            $SQL_TYPE = "SELECT * FROM LOAIHOA";
                            $QUERY_TYPE = mysqli_query($con, $SQL_TYPE);
                            while($TYPE = mysqli_fetch_array($QUERY_TYPE)){
                        ?>
                        <option value="<?php echo $TYPE['MA_LOAIHOA'];?>" ><?php echo $TYPE['TEN_LOAIHOA']; ?></option>
                        <?php }?>
                    </select>
                
                    <label for="">Chọn Chủ đề hoa:</label>
                    <select required="true" name="chude" class="form-control">
                        <?php 
                            $SQL_CHUDE = "SELECT * FROM CHUDE";
                            $QUERY_CHUDE = mysqli_query($con, $SQL_CHUDE);
                            while($CHUDE = mysqli_fetch_array($QUERY_CHUDE)){
                        ?>
                        <option value="<?php echo $CHUDE['MA_CD'];?>" ><?php echo $CHUDE['TEN_CD']; ?></option>
                        <?php }?>
                    </select>

                
                                
                    <label for="">Chọn Nhà cung cấp:</label>
                    <select name="provider" class="form-control">
                        <?php 
                            $SQL_PROVIDER = "SELECT * FROM NHACUNGCAP";
                            $QUERY_PROVIDER = mysqli_query($con, $SQL_PROVIDER);
                            while($PROVIDER = mysqli_fetch_array($QUERY_PROVIDER)){
                        ?>
                        <option value="<?php echo $PROVIDER['MA_NCC'];?>" ><?php echo $PROVIDER['TEN_NCC']; ?></option>
                        <?php }?>
                    </select>

                    <label>Chọn ảnh:</label>
                    <input type="file" name="fileToUpload" required>
                    <br/>
                    <button class="btn btn-primary" type="submit" name="add">THÊM MỚI</button>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- PROCESS ADD -->

<?php
    if (isset($_POST['add'])) {
        $manv = 1;
        $name = $_POST['name'];
        $mean = $_POST['mean'];
        $price = $_POST['price'];
        $content = $_POST['content'];
        $chude = $_POST['chude'];
        $color = $_POST['color'];
        $provider = $_POST['provider'];
        $type = $_POST['type'];


        $SQL_CODE = "SELECT MAX(MA_HOA) AS MA_HOA FROM HOA";
        $QUERY_CODE = mysqli_query($con, $SQL_CODE);
        $CODE = mysqli_fetch_array($QUERY_CODE);
        $ID = $CODE['MA_HOA'] + 1;

        if ($name =="" || $mean == "" || $price =="" ) {
            echo "<h5 class='text-danger'>Bạn cần nhập đầy đủ thông tin</h5>";
        }
        else{
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $insert = "INSERT INTO hoa(MA_HOA, MA_CD, MA_LOAIHOA, MA_NCC, TEN_HOA, MAUSAC, GIABAN, YNGHIA, CHITIET, URL_IMG, DISABLE) VALUES ('$ID','$chude','$type','$provider','$name','$color','$price','$mean','$content','$target_file',0)";
                mysqli_query($con,$insert);
                header('location:admin.php?tab=qlsp&success="Thêm thành công"');
            } else {
                echo "Bạn cần chọn ảnh";
            }
        }
    }
?>
<script>
    //Giá chỉ cho nhập số
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>