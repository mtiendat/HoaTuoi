<?php
include '../connect.php';
if(isset($_POST['action']) && $_POST['action']=="add"){ 
	$quantity = $_POST['quantity'];
	$id=intval($_POST['id']); 

	if(isset($_SESSION['cart'][$id])){ 

				$_SESSION['cart'][$id]['quantity'] += $quantity;
		            // $_SESSION['cart'][$row_s['MA_HOA']]=array( 
		            //             "quantity" => $quantity, 
		            //             "price" => $row_s['GIABAN'],
		            //             "ten" => $row_s['TEN_HOA'],
		            //         ); 
		            //quay về trang chủ
		                    //header('location:single.php?id='.$id.'');
							echo 3;
		                }else{ 
		                	$sql_s="SELECT * FROM HOA WHERE MA_HOA = '".$id."'"; 
		                	$query_s=mysqli_query($con,$sql_s); 
		                	if(mysqli_num_rows($query_s)!=0){ 
		                		$row_s=mysqli_fetch_array($query_s); 

		                		$_SESSION['cart'][$row_s['MA_HOA']]=array( 
		                			"quantity" => $quantity, 
		                			"price" => $row_s['GIABAN'],
		                			"ten" => $row_s['TEN_HOA'],
		                			"id"=>$row_s['MA_HOA']
		                		);    
		                		echo 1;
		                		//header('location:single.php?id='.$id.'');
		                	}else{ 

		                		echo 2;  
		                	} 

		                } 

		            } 
?>