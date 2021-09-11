<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>

<?php 
    $SQL = "SELECT * FROM NHANVIEN WHERE MA_NV = $id";
    $QUERY = mysqli_query($con, $SQL);
    $NHANVIEN =  mysqli_fetch_array($QUERY);
   
?>

<div class="container-fluid">
<form method="POST" enctype="multipart/form-data">
    <h3>Sửa Thông Tin Nhân Viên</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Họ và Tên:</label>
                    <input required="true" type="text" name="name" value=" <?php echo $NHANVIEN['TEN_NV'] ?>" placeholder="Nhập Họ và Tên..." class="form-control">
                    <input type="text" hidden name="id" value="<?php echo $NHANVIEN['MA_NV'] ?>">
                    <label>Số Điện Thoại:</label>
                    <input required="true" type="text" name="phone"  value="<?php echo $NHANVIEN['SDT_NV'] ?>" placeholder="Nhập số điện thoại.." class="form-control">
                
                    
                    <label>Địa chỉ:</label>
                    <input required="true" type="text" name="address" value="<?php echo $NHANVIEN['DIACHI_NV'] ?>" placeholder="Nhập địa chỉ.." class="form-control"> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Giới tính:</label>
                    <select required="true" name="sex" class="form-control">
                    <?php 
                    if($NHANVIEN['GIOITINH_NV'] == 0) {
                        echo '<option value="0" selected>Nam</option>
                        <option value="1">Nữ</option>';
                    }else {
                        echo '<option value="0">Nam</option>
                        <option value="1" selected>Nữ</option>';
                    }
                    
                    ?>
                        
                    </select>
                    


                    <label for="">Chức vụ:</label>
                    <select required="true" name="type" class="form-control">
                        <?php 
                            $SQL_TYPE = "SELECT * FROM CHUCVU";
                            $QUERY_TYPE = mysqli_query($con, $SQL_TYPE);
                            while($TYPE = mysqli_fetch_array($QUERY_TYPE)){
                                if($NHANVIEN['MA_CV'] == $TYPE['MA_CV'])
                                    echo '<option value="'. $TYPE['MA_CV'].'" selected>'.$TYPE['TEN_CV'].'</option>';
                                else  echo '<option value="'.$TYPE['MA_CV'].'">'.$TYPE['TEN_CV'].'</option>';
                                }
                                ?>
    
                    
                    </select>
                        <p></p>
                    <button class="btn btn-primary" type="submit" name="edit">THÊM MỚI</button>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- PROCESS EDIT -->

<?php
    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $type = $_POST['type'];
        $sex = $_POST['sex'];

        $id = $_POST['id'];

        $update = "UPDATE NHANVIEN SET `TEN_NV` = '$name', `DIACHI_NV` = '$address', `SDT_NV` = '$phone', `GIOITINH_NV` = $sex, `MA_CV` = $type WHERE MA_NV = $id";
        $s = mysqli_query($con, $update);
        header('location:admin.php?tab=nhanvien&success="Cập nhật thành công"');
    
    }
?>