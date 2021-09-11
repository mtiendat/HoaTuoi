<div class="container-fluid">
<form method="POST" enctype="multipart/form-data">
    <h3>Thêm Cửa hàng</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="padding:10px;  background: #fff">
                    <label>Tên cửa hàng:</label>
                    <input required="true" type="text" name="tencuahang" value="" placeholder="Nhập tên cửa hàng" class="form-control">
                    
                    <label>Địa chỉ:</label>
                    <input required="true" type="text" id="diachi" name="diachi" value="" placeholder="Chọn trên bản đồ" class="form-control">
                
                    <input hidden type="text" name="lat"  id="lat" value="">  
                    <input hidden type="text" name="long" id="long" value=""> 

                    <label>Vị trí:</label>
                    <input required="true" disabled type="text" id="vitri" name="vitri" value="" placeholder="Chọn trên bản đồ..." class="form-control">  
                     <p></p>
                    <div id="map" style="width: 100%; height: 600px;"></div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="card" style="padding:10px;  backgrond: #fff">

                    <label>Chọn ảnh:</label>
                    <img id="imgPre" width="100%" src="" alt="no img" class="img-thumbnail" /> 
                    <input type="file"  required="true" id="file" name="fileToUpload">
                    <br/>
                    <button class="btn btn-primary" type="submit" name="add">THÊM MỚI</button>
                </div>
            </div>
           
        </div>
    </form>
</div>
<script>
    function initMap() {
        myLatlng = {lat: 10.246262845049362, lng: 105.96613354349448};
			map = new google.maps.Map(document.getElementById('map'), {
										center: myLatlng,
										zoom: 15,
										draggable: true
			});
    let infoWindow = new google.maps.InfoWindow({
        content: "Click để lấy tọa độ",
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

<!-- PROCESS ADD -->

<?php
    if (isset($_POST['add'])) {
        $tencuahang = $_POST['tencuahang'];
        $diachi = $_POST['diachi'];
        $long = $_POST['long'];
        $lat = $_POST['lat'];
        $target_dir = "images/";
        $img = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $img;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $insert = "INSERT INTO cuahang(`diachi`, `tencuahang`, `hinhanh`, `lat`, `long`) VALUES ('$diachi','$tencuahang','$img', '$lat','$long')";
                mysqli_query($con, $insert);
                header('location:admin.php?tab=cuahang&success="Thêm thành công"');
            }else {
                echo "Sorry, there was an error uploading your file.";
            }
        
    }
?>