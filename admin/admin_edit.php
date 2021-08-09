<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>

<?php 
    $SQL = "SELECT * FROM HOA WHERE MA_HOA = $id";
    $QUERY = mysqli_query($con,$SQL);
    $PRODUCT =  mysqli_fetch_array($QUERY);
?>



<div class="container-fluid">
    <form method="POST" enctype="multipart/form-data">
    <h3>Chỉnh Sửa Hoa: #<?php echo $id; ?></h3>
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <input type="hidden" value="<?php echo $PRODUCT['MA_HOA'] ?>" name="id"/>

                    <label>Tên Hoa:</label>
                    <input required="true" value="<?php echo $PRODUCT['TEN_HOA'] ?>" type="text" name="name" value="" placeholder="Nhập tên hoa.." class="form-control">
                    <?php echo $PRODUCT['YNGHIA'] ?>
                    <label>Ý nghĩa:</label>
                    <textarea required="true" name="mean" class="form-control" class="mota"><?php echo $PRODUCT['YNGHIA'] ?></textarea>
                
                    
                    <label>Nội dung:</label>
                    <script src="ckeditor/ckeditor.js"></script>
                    <textarea required="true" name="content" class="form-control" class="content">
                        <?php echo $PRODUCT['CHITIET'] ?>
                    </textarea>
                    <script>
                        CKEDITOR.config.height = 450; 
                        CKEDITOR.replace('content');
                    </script>  
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Màu Sắc:</label>
                    <input value="<?php echo $PRODUCT['MAUSAC'] ?>" required="true" type="text" name="color" value="" placeholder="Nhập màu hoa.." class="form-control">
                    
                    
                    <label>Giá:</label>
                    <input value="<?php echo $PRODUCT['GIABAN'] ?>" required="true" type="text" name="price" value="" placeholder="Nhập giá bán." class="form-control">


                    <label for="">Chọn loại hoa:</label>
                    <select required="true" name="type" class="form-control">
                        <?php 
                            $SQL_TYPE = "SELECT * FROM LOAIHOA";
                            $QUERY_TYPE = mysqli_query($con, $SQL_TYPE);
                            while($TYPE = mysqli_fetch_array($QUERY_TYPE)){
                        ?>
                        <option value="<?php echo $TYPE['MA_LOAIHOA'];?>"  <?php  if($PRODUCT['MA_LOAIHOA'] == $TYPE['MA_LOAIHOA']){ ?> selected <?php } ?> ><?php echo $TYPE['TEN_LOAIHOA']; ?></option>
                        <?php }?>
                    </select>
                
                    <label for="">Chọn Chủ đề hoa:</label>
                    <select required="true" name="chude" class="form-control">
                        <?php 
                            $SQL_CHUDE = "SELECT * FROM CHUDE";
                            $QUERY_CHUDE = mysqli_query($con, $SQL_CHUDE);
                            while($CHUDE = mysqli_fetch_array($QUERY_CHUDE)){
                        ?>
                        <option  value="<?php echo $CHUDE['MA_CD'];?>" <?php  if($PRODUCT['MA_CD'] == $CHUDE['MA_CD']){ ?> selected <?php } ?>><?php echo $CHUDE['TEN_CD']; ?></option>
                        <?php }?>
                    </select>

                
                                
                    <label for="">Chọn Nhà cung cấp:</label>
                    <select name="provider" class="form-control">
                        <?php 
                            $SQL_PROVIDER = "SELECT * FROM NHACUNGCAP";
                            $QUERY_PROVIDER = mysqli_query($con, $SQL_PROVIDER);
                            while($PROVIDER = mysqli_fetch_array($QUERY_PROVIDER)){
                        ?>
                        <option value="<?php echo $PROVIDER['MA_NCC'];?>" <?php  if($PRODUCT['MA_NCC'] == $PROVIDER['MA_NCC']){ ?> selected <?php } ?> ><?php echo $PROVIDER['TEN_NCC']; ?></option>
                        <?php }?>
                    </select>

                    <label>Ảnh hiện tại</label>
                    <img src="<?php echo $PRODUCT['URL_IMG'];?>" style="width: 120px; height: 120px">


                    <label>Chọn ảnh:</label>
                    <input type="file" name="fileToUpload">

                    <br/>
                    <br/>
                    <p class="text-center">
                        <button class="btn btn-primary" type="submit" name="edit">Chỉnh sửa</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- PROCESS ADD -->

<?php
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $mean = $_POST['mean'];
        $price = $_POST['price'];
        $content = $_POST['content'];
        $chude = $_POST['chude'];
        $color = $_POST['color'];
        $provider = $_POST['provider'];
        $type = $_POST['type'];


        if ($name =="" || $mean == "" || $price =="" || $content == "") {
            echo "<h5 class='text-danger'>Bạn cần nhập đầy đủ thông tin</h5>";
        }
        else{
            if($_FILES['fileToUpload']['name'] == "") {
                $SQL_UPDATE = "UPDATE  hoa SET MA_CD = '$chude', MA_LOAIHOA = '$type', MA_NCC = '$provider', TEN_HOA = '$name', MAUSAC = '$color', GIABAN = '$price', YNGHIA = '$mean', CHITIET = '$content' WHERE  MA_HOA = $id";
                echo $SQL_UPDATE;
                mysqli_query($con, $SQL_UPDATE);
            }else{
               
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

               
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $SQL_UPDATE = "UPDATE  hoa SET MA_CD = '$chude', MA_LOAIHOA = '$type', MA_NCC = '$provider', TEN_HOA = '$name', MAUSAC = '$color', GIABAN = '$price', YNGHIA = '$mean', CHITIET = '$content', URL_IMG = '$target_file' WHERE  MA_HOA = $id";
                    echo  $SQL_UPDATE;
                    mysqli_query($con, $SQL_UPDATE);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
?>