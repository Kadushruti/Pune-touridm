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
	</head>
<?php 
if (isset($_GET['view'])) {
    $id = $_GET['view'];
       $results = mysqli_query($conn, "SELECT * FROM tbl_rooms WHERE id='$id'"); 
        $row = mysqli_fetch_array($results);
          if (!empty($row['coverimage']))
            {
              $roomimg = "admin/uploads/rooms/coverimage/".$row['coverimage'];
          }
          else{
              $roomimg = "admin/assets/dist/img/default.png";
          }
        }
?>  
	<body>
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
		                    <h1 itemprop="name">ROOM DETAILS</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Room Details</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
<div class="container mt-5">
<div class="row">
<div class="col-lg-8 col-md-12">
  <div class="card">
      <div class="media d-flex card-header">
          <div class="media-body text-left">
            <h4 class="card-title">
              <?= $row['name'];?> 
            </h4>
          </div>
          <div class="align-self-center">
            <a href="room-gallery.php?view=<?= $row['id'];?>" class="btn btn-primary"><i class="fas fa-images"></i> Gallery</a>
          </div>
      </div>
      <img src="<?= $roomimg ?>"  alt="<?= $row['name'];?>"  style="height: 100%;" />
      <div class="card-content">
          <div class="media d-flex card-header">
            <div class="media-body text-left">
              <h3 style="color:#F78536;"><span style="font-size: 16px;">From</span> <strong>&#8377; <?php echo number_format((float)$row['price'], 2);?></strong><span> / Night</span></h3>
              <span style="font-size: 16px;font-weight: bold;">Capacity: <i class="fas fa-male"></i> X <?= $row['max_people'];?></span>
            </div>
            <div class="align-self-center">
              <a href="booking.php?room=<?= $row['id'];?>" class="btn btn-primary">Book Now</a>
            </div>
          </div>
          <p class="mt-3">
            <?= $row['description'];?>
          </p>
              <p>Facilities : -</p>
          <ul>
            <?php  
               $facilitysql="SELECT * FROM tbl_facility WHERE facility_id IN(".$row['facility_ids'].")";
                $facilityresult = mysqli_query($conn,$facilitysql);
                      if(mysqli_num_rows($facilityresult) > 0)
                      { 
                        while($facilityrow = mysqli_fetch_array($facilityresult))
                        { 
                            ?>
                            <li><?=$facilityrow['facility_name']?></li>
                            <?php
                        }
                      }
                      else{
                        echo "<p>No Facilities Available</p>";
                      }
                      ?>
</ul>
      </div>
  </div>
</div>
<div class="col-lg-4 col-md-12">
<div class="card text-center">
  <h4 class="text-left" style="color:#F78536;"><b>Rooms : </b></h4>
  <?php
    $allroomsql = "SELECT * FROM tbl_rooms WHERE hotel_id = ".$row['hotel_id']." AND id != ".$row['id']." ORDER BY created_at DESC";
    $allroomsresult = mysqli_query($conn,$allroomsql);
    if(mysqli_num_rows($allroomsresult) > 0)
              {
                while($rowallrooms = mysqli_fetch_array($allroomsresult))
                {
                  if (!empty($rowallrooms['coverimage'])) {
                                             $roomimg = "admin/uploads/rooms/coverimage/".$rowallrooms['coverimage'];
                                         }
                                         else{
                                            $roomimg = "admin/assets/dist/img/default.png";
                                         }
          ?>
          <a href="room-details.php?view=<?= $rowallrooms['id'];?>">
              <div class="card shadow-none" style="flex-direction: row;align-items: center;">
                <img src="<?= $roomimg;?>" alt="<?= $rowallrooms['name'];?>" class="card-img-top" style=" width: 30%;height: 100px;
                border-top-right-radius: 0;border-bottom-left-radius: calc(0.25rem - 1px);" />
                <div class="card-body text-left">
                  <h5 class="card-title" style="color:#000;"> <?= $rowallrooms['name'];?></h5>
                  <p class="card-text"><span style="font-size: 16px;">From</span> <strong style="color:#F78536;">&#8377; <?php echo number_format((float)$rowallrooms['price'], 2);?></strong><br> Price / Night
                  </p>
                </div>
              </div>
            </a>
  <?php }}else{
                        echo "<p>No Other Rooms Available</p>";
                      }?>
  </div>
</div>
</div>
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