<?php if(empty($_GET['id'])) {header('location:index.php');} ?>
<?php
    include '../connect.php';
    $id = $_GET['id'];
	$UPDATE = "UPDATE DONHANG SET DUYET = 3 WHERE MA_DH = '".$id."'";
	mysqli_query($con, $UPDATE);
	header('location:../history.php');
?>