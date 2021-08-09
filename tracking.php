<?php include 'header.php'; ?>
<?php if(empty($_GET['id'])) {header('location:index.php');} ?>

<div class="container" style="min-height: 800px">
    <h3>Hóa Đơn #<?php echo $_GET['id'] ?></h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Hoa</th>
                <th>Số Lượng</th>
                <th>Giá Tiền</th>
                <th>Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0; 
                $total = 0;
                $ID = $_GET['id'];
                $SQL = "SELECT * FROM CHITIETDONHANG
                INNER JOIN HOA ON CHITIETDONHANG.MA_HOA = HOA.MA_HOA
                WHERE MA_DH = '".$ID."'";
                $QUERY = mysqli_query($con,$SQL);
                while($ORDER =  mysqli_fetch_array($QUERY)){
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $ORDER['TEN_HOA']; ?></td>
                <td><?php echo $ORDER['SOLUONG']; ?></td>
                <td><?php echo number_format($ORDER['GIABAN']); ?> đ</td>
                <td><?php echo number_format($ORDER['GIABAN'] * $ORDER['SOLUONG']); ?> đ</td>
                <?php  $total +=  ($ORDER['GIABAN'] * $ORDER['SOLUONG']);  ?>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">
                    <h6>Thành Tiền <strong><?php echo number_format($total) ?> đ</strong></h6>
                </th>
            </tr>
        </tfoot>
    </table>
</div>
<?php include 'footer.php'; ?>