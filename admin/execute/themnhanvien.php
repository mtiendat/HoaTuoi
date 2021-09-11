

<?php
    include '../../connect.php';
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $type = $_POST['type'];
        $sex = $_POST['sex'];
        $username = $_POST['username'];
        $password = md5($_POST['pwd']);

        $SQL_CODE = "SELECT MAX(MA_NV) AS MA_NV FROM NHANVIEN";
        $QUERY_CODE = mysqli_query($con, $SQL_CODE);
        $CODE = mysqli_fetch_array($QUERY_CODE);
        $id = $CODE['MA_NV'] + 1;

        $insertTaiKhoan = "INSERT INTO TAIKHOAN(TEN_KH, USERNAME, PASSWORD, DIACHI_KH, SDT_KH, LOAI_TK) VALUES ('$name','$username','$password','$address','$phone', 1)";
      
        if(mysqli_query($con, $insertTaiKhoan)){
            $taikhoan = "SELECT * FROM TAIKHOAN WHERE USERNAME= '".$username."'";
            
            $QUERY_taikhoan = mysqli_query($con, $taikhoan);
            $result = mysqli_fetch_array($QUERY_taikhoan);
            $MA_KH =  $result['MA_KH'];
           
            $insert = "INSERT INTO NHANVIEN(MA_NV, MA_CV, TEN_NV, SDT_NV, DIACHI_NV, GIOITINH_NV, MA_KH, DISABLE) VALUES ('$id','$type','$name','$phone','$address',$sex, $MA_KH, 0)";
           
            mysqli_query($con, $insert);
            echo "Thêm thành công";
            
        }

        // header('location:admin.php?tab=nhanvien&success="Thêm thành công"');
    
?>