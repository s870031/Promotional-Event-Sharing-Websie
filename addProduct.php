<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 300px }
    </style> 
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <!--<link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">
  -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
    <script>
      var map;
      var infowindow;
      var taipei = new google.maps.LatLng(25.09108, 121.5598);

      function initialize() {

		map = new google.maps.Map(document.getElementById('map-canvas'), {
		  mapTypeId: google.maps.MapTypeId.ROADMAP,
		  zoom: 15
		});

		// Try W3C Geolocation (Preferred)
		if(navigator.geolocation) {
		  browserSupportFlag = true;
		  navigator.geolocation.getCurrentPosition(function(position) {
			initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
			map.setCenter(initialLocation);
			
		  }, function() {
			handleNoGeolocation(browserSupportFlag);
		  });
		}
		// Browser doesn't support Geolocation
		else {
		  browserSupportFlag = false;
		  handleNoGeolocation(browserSupportFlag);
		}
		
		function handleNoGeolocation(errorFlag) {
		  if (errorFlag == true) {
			alert("地圖定位失敗");
		  } else {
			alert("您的瀏覽器不支援定位服務");
		  }
		initialLocation = taipei;
		  map.setCenter(initialLocation);
		}

		var request = {
		  location: initialLocation,
		  radius: 500
		};
		infowindow = new google.maps.InfoWindow();
		var service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request, callback);
      }

      function callback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
          //window.alert(place.name + "\n" + place.geometry.location);
		  productForm.addLocation.value=place.name;
		  productForm.keyword.value=place.name;
          //寫入資料庫的地方
        });
      }

      function searchKeyword(){
        var request = {
          location: initialLocation,
          radius: 500,
          keyword: document.getElementById('keyword').value
        };
        infowindow = new google.maps.InfoWindow();
        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<script type="text/javascript">
	function check_name_empty(){
		if(productForm.addProductName.value=="")
			alert("請輸入商品名稱");
		else{
			productForm.submit();
		}
	}
</script>
</head>
<body style="background-image:url(png/back1.png); background-position:center; background-repeat:repeat; background-attachment:fixed; font-family:Microsoft JhengHei,arial; font-weight:bold">
	<center>
	<img src="png/upperPage.png" height=30 onclick="history.back()" align=left/>
	<img src="png/backIN.png" width=150>
	<form name="productForm" action=addProduct_mysql.php method=post enctype="multipart/form-data">
	<br/>
	*商品名稱:<input type=text name=addProductName style="background: rgba(255, 255, 255, .3);border-style: solid;border-width: 0px 0px 1px 0px;"></input><br/><br/>
	*優惠資訊:<input type=text name=addDiscountInfo style="background: rgba(255, 255, 255, .3);border-style: solid;border-width: 0px 0px 1px 0px;"><br/><br/>
	*商品種類:<select name=addProductCatagory><br/><option></option>
													 <option>飲食</option>
													 <option>3c電子、周邊</option>
													 <option>家電用品</option>
													 <option>男女服裝</option>

													 <option>生活用品</option>
													 <option>其他</option></select><br/><br/>
	*截止日期:<select name=addDeadline_year><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option></select>年
			 <select name=addDeadline_month><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option></select>月
			 <select name=addDeadline_day><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select>日<br/><br/>
	照片上傳:<input type="file" name="file" id="file"/><br/><br/>
	地點:<input id="keyword" name='keyword' type="text" style="background: rgba(255, 255, 255, .3);border-style: solid;border-width: 0px 0px 1px 0px;"/>
		 <img src="png/search.png" height=40 onclick="searchKeyword()"><br/><br/>
		 <div id="map-canvas" style="width:250px ;height:250px"></div><br/>
	more to say:<input type=text name=addComment style="background: rgba(255, 255, 255, .3);border-style: solid;border-width: 0px 0px 1px 0px;"><br/><br/>
	<img src="png/share.png" name='share' onclick="check_name_empty()" width=150>
	
	<input type=hidden name=upperPage></input><!--上一頁-->
	<input type=hidden name=addLocation></input><!--傳地名-->
	<input type=hidden name=coordinate></input><!--傳經緯度-->
	</form>
	<br/>
	</center>
</body>
</html>
<?php
	//記錄上一頁的位置
	echo "<script type='text/javascript'>
		productForm.upperPage.value='".$_SERVER['HTTP_REFERER'] ."';
	</script>";
?>


