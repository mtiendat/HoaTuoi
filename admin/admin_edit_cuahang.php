<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>

<?php 
    $SQL = "SELECT * FROM CUAHANG WHERE id = $id";
    $QUERY = mysqli_query($con, $SQL);
    $CUAHANG =  mysqli_fetch_array($QUERY);
?>

<div class="container-fluid">
<form method="POST" enctype="multipart/form-data">
    <h3>Chỉnh Sửa Thông Tin Cửa hàng</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="padding:10px;  backgrond: #fff">
                    <label>Tên cửa hàng:</label>
                    <input type="text" name="tencuahang" value="<?php echo $CUAHANG['tencuahang']?>" placeholder="Nhập tên cửa hàng" class="form-control">
                    <input type="text" name="id" value="<?php echo $CUAHANG['id']?>" hidden>
                    <label>Địa chỉ:</label>
                    <input required="true" type="text" id="diachi" name="diachi" value="<?php echo $CUAHANG['diachi'] ?>" placeholder="Chọn trên bản đồ" class="form-control">
                
                    <input hidden type="text" name="lat"  id="lat"  value="<?php echo $CUAHANG['lat']?>">  
                    <input hidden type="text" name="long" id="long" value="<?php echo $CUAHANG['long']?>"> 

                    <label>Vị trí:</label>
                    <input required="true" disabled type="text" id="vitri" name="vitri"  value="<?php echo $CUAHANG['lat'].', '.$CUAHANG['long']?>" placeholder="Chọn trên bản đồ..." class="form-control">  
                     <p></p>
                    <div id="map" style="width: 100%; height: 600px;"></div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="card" style="padding:10px;  backgrond: #fff">

                    <label>Chọn ảnh:</label>
                    <img id="imgPre" width="100%" src="images/<?php echo $CUAHANG['hinhanh']?>" alt="no img" class="img-thumbnail" /> 
                    <input type="file" id="file" name="fileToUpload">
                    <br/>
                    <button class="btn btn-primary" type="submit" name="edit">Cập Nhật</button>
                </div>
            </div>
           
        </div>
    </form>
</div>
<script>
    function initMap() {
        var lat = parseFloat($("#lat").val());
        var long = parseFloat($("#long").val());
       
        myLatlng = {lat: lat, lng: long};
			map = new google.maps.Map(document.getElementById('map'), {
										center: myLatlng,
										zoom: 15,
										draggable: true
			});
    let infoWindow = new google.maps.InfoWindow({
        content: $("#diachi").val(),
        map: map,
        position: myLatlng,
            });
    infoWindow.open(map);

  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
    var address = "Đang tải..";
    var geocoder= new google.maps.Geocoder();
    geocoder.geocode({
        'latLng': mapsMouseEvent.latLng
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
            var address = results[0].formatted_address;
            $("#diachi").val(address);
            infoWindow.setContent(
            JSON.stringify(address)
            );
        }
        }
    });
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    infoWindow.setContent(
      JSON.stringify(address)
    );
    $("#lat").val(mapsMouseEvent.latLng.toJSON().lat);
    $("#long").val(mapsMouseEvent.latLng.toJSON().lng);
    $("#vitri").val(mapsMouseEvent.latLng.toJSON().lat +", "+mapsMouseEvent.latLng.toJSON().lng);
    infoWindow.open(map);
  });
    }
</script>

<script
   		 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2oJP3_VXNItY6NLi40u8WDpbR-GdCN4I&callback=initMap" async>
</script>
<script>
    $('#file').change(function () {
        readURL(this, '#imgPre');
    });
    function readURL(input, idImg) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(idImg).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    
</script>

<!-- PROCESS EDIT -->

<?php
    if (isset($_POST['edit'])) {
        $tencuahang = $_POST['tencuahang'];
        $diachi = $_POST['diachi'];
        $long = $_POST['long'];
        $lat = $_POST['lat'];
        $id = $_POST['id'];
        if($_FILES['fileToUpload']['name'] == "") {
            $update = "UPDATE cuahang SET `diachi` = '$diachi', `tencuahang` = '$tencuahang', `lat` = $lat, `long` = $long WHERE id = $id";
            $s = mysqli_query($con, $update);
            header('location:admin.php?tab=cuahang&success="Cập nhật thành công"');
        }else{
            $target_dir = "images/";
            $img = basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $img;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $update = "UPDATE cuahang SET`diachi` = '$diachi', `tencuahang` = '$tencuahang', `hinhanh` = '$img', `lat` = $lat, `long` = $long WHERE id = $id";
                mysqli_query($con, $update);
                header('location:admin.php?tab=cuahang&success="Cập nhật thành công"');
            }else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
        
    }
?>