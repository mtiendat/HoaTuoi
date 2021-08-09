<?php
include '../connect.php';
    $noidung = $_POST['noidung'];
	$makh = $_SESSION['userid'];
	$insert = "INSERT INTO gopy(MA_KH, noidung,trangthai) VALUES ('$makh','$noidung', 0)";
	$query = mysqli_query($con, $insert) or die(mysqli_error($con));
    echo 1;
?>