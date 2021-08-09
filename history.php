<?php include 'header.php'; ?>
<?php if(empty($_SESSION['username'])) {header('location:index.php');} ?>
<style>
    ul.timeline {
    list-style-type: none;
    position: relative;
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
        padding-left: 50px;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>

<?php 
    $USERNAME = $_SESSION['username'];
    $SQL = "SELECT * FROM TAIKHOAN WHERE USERNAME = '".$USERNAME."'";

    $QUERY = mysqli_query($con,$SQL);
    $USER =  mysqli_fetch_array($QUERY);
    $ID_KH =  $USER['MA_KH'];


   
?>

<div class="container">
    <h3>Lịch sử mua hàng</h3>
    <div class="row" style="min-height: 800px">
        <div class="col-md-6 offset-md-3">
            <ul class="timeline">
                <?php
                    $SQL_ORDER = "SELECT * FROM DONHANG WHERE MA_KH = '".$ID_KH."'";
                    $QUERY_ORDER = mysqli_query($con,$SQL_ORDER);
                    $count = mysqli_num_rows($QUERY_ORDER);
                    if($count > 0){
                    while($ORDERS =  mysqli_fetch_array($QUERY_ORDER)){
                ?>

                <li>
                    <h4>#<?php echo $ORDERS['MA_DH'] ?> - <?php echo $ORDERS['NGAYDAT_DH'] ?></h4>
                    <p>Trạng thái: <strong><?php
           
                        switch($ORDERS['DUYET']){
                            case 0: 
                                echo "Đang chờ xác nhận";
                                break;
                            case 1:
                                echo "Đơn hàng đã xác nhận";
                                break;
                            case 2:
                                echo "Đơn bị hủy";
                                break;
                            default: 
                            echo "Đơn bị hủy";
                            break;
                        }
                     
                    ?></strong></p>
                    <p>Người nhận: <strong><?php echo $ORDERS['TENKH_DH'] ?></strong></p>
                    <p>Nơi nhận: <strong><?php echo $ORDERS['DIACHI_DH'] ?></strong></p>
                    <p>Liên hệ: <strong><?php echo $ORDERS['SDT_DH'] ?></strong></p>
                    <a href="tracking.php?id=<?php echo $ORDERS['MA_DH']; ?>" class="float-right">Xem chi tiết</a>
                    <?php if($ORDERS['DUYET']  == 0){?>
                        <br/>
                        <a href="execute/cancel-order.php?id=<?php echo $ORDERS['MA_DH']; ?>" class="float-right">Hủy bỏ đơn</a>
                    <?php }?>
                </li>
                <?php }}else{?>
                    <div style="color:green; margin-top:50px"><center>Bạn chưa chưa có đơn hàng nào</center></div>
                    <?php }?>
            </ul>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>