<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
 <?php
include('include/head.php');
?>
<link rel="stylesheet" href="assets/css/hotel-details.css">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW8p3qVvJBoFq27ic_Ekkwr5yy1NBzOFs"></script>
<?php
$facilitysql="SELECT * FROM tbl_hotels";
$facilityresult = mysqli_query($conn,$facilitysql);                        
$array = array();
while($facilityrow = mysqli_fetch_array($facilityresult)){
  $array[] = $facilityrow;
}
?>
    <script type="text/javascript">
        var locations = <?php echo json_encode($array); ?>;
        function InitMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2,
                center: new google.maps.LatLng(locations[0][11], locations[0][10]),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var infowindow = new google.maps.InfoWindow();
            var marker, i;
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][11], locations[i][10]),
                    map: map
                });
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][1]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    </script>
	</head>
	<body onload="InitMap();">
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
<?php
include('include/header.php');
?>
		<!-- end:header-top -->
	
		<header class="page-header">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-8">                  
		                    <h1 itemprop="name">HOTELS ON MAP</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Hotels On Map</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
    <div id="map" style="height: 500px; width: auto;">
    </div>
<?php
include('include/footer.php');
?>		
	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->
<?php
include('include/script.php');
?>
	</body>
</html>