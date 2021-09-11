<?php
include '../connect.php';
$sql_cuahang = "SELECT * FROM CUAHANG";
$query_cuahang = mysqli_query($con, $sql_cuahang);

$dsLatLng = array();
while($cuahang = mysqli_fetch_array($query_cuahang)){
    array_push($dsLatLng, ["lat"=> $cuahang['lat'], "lng"=> $cuahang['long'], "tencuahang"=> $cuahang['tencuahang'], "diachi"=> $cuahang['diachi'], "hinhanh"=> $cuahang['hinhanh']]);   
}
$js_array = json_encode($dsLatLng);
echo $js_array;
?>