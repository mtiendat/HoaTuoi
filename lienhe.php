<?php include 'header.php'; ?> 
	<!-- main -->
	<main id="main">
		<div class="container">
			<h1 class="text-center">Liên hệ với chúng tôi</h1>
			<hr>
			
			<!-- <style>.embed-container {position: relative; padding-bottom: 80%; height: 0; max-width: 100%;} .embed-container iframe, .embed-container object, .embed-container iframe{position: absolute; top: 0; left: 0; width: 100%; height: 100%;} small{position: absolute; z-index: 40; bottom: 0; margin-bottom: -15px;}</style><div class="embed-container"><iframe width="500" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="Shop hoa tươi" src="//learngis2.maps.arcgis.com/apps/Embed/index.html?webmap=2fe7f8eeb0424c89acd4cbe4a00685ec&extent=105.9494,10.2338,105.9914,10.2499&zoom=true&previewImage=false&scale=true&search=true&searchextent=true&disable_scroll=true&theme=dark"></iframe></div> -->
			<div id="map" style="width: 100%; height: 500px"></div>
		
		<p>Hotline 1: 0939004357.</p>
		<p>Hotline 2: 0939006357.</p>
		</div>
	</main>
	<script>
		function getDataMap(){
			
		}
		

		let map;
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
										center: {lat: 10.246262845049362, lng: 105.96613354349448},
										zoom: 15,
										draggable: true
			});
			$.ajax({
			url: "execute/mapgis.php",
			method: "GET",
			data: { 
				
			},
			success : function(response){
				var js_array = $.parseJSON(response);//paste chuỗi trả về thành
				for (i in js_array){
				var data = js_array[i];
				var latlng =  new google.maps.LatLng(data.lat,data.lng);
				var dsCuaHang = new google.maps.Marker({
											position:  latlng,
											map: map,
											title: data.title,
											icon: "images/gps.png",
											content: 'dgfdgfdg'
				});
				var infowindow = new google.maps.InfoWindow();
				(function(dsCuaHang, data){
					var content = '<div id="iw-container">' +
					'<img height="200px" width="auto class="img-thumbnail"" src="images/'+data.hinhanh+'">'+
					'<h4><div class="iw-title" style="color: blue">' + data.tencuahang +'</div></h4>' +
					'<p><i class="fa fa-map-marker" style="color:#003352"></i> '+ data.diachi +'<br>'

					google.maps.event.addListener(dsCuaHang, "click", function(e){

					infowindow.setContent(content);
					infowindow.open(map, dsCuaHang);
                  // alert(data.title);
              		});
					})(dsCuaHang, data);
			}		
			 }
			});
		}
	</script>
	<script
   		 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2oJP3_VXNItY6NLi40u8WDpbR-GdCN4I&callback=initMap" async defer>
	</script>
<?php include 'footer.php';  ?>
