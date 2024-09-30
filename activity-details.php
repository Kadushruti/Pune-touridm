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
       $results = mysqli_query($conn, "SELECT * FROM tbl_activities WHERE id='$id'"); 
        $row = mysqli_fetch_array($results);
        if (!empty($row['coverimage'])) {
          $activityimg = "admin/uploads/activities/coverimage/".$row['coverimage'];
         }
         else{
            $activityimg = "admin/assets/dist/img/default.png";
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
		                    <h1 itemprop="name">ACTIVITY DETAILS</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Activity Details</span>
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
                <a href="activity-gallery.php?view=<?= $row['id'];?>" class="btn btn-primary"><i class="fas fa-images"></i> Gallery</a>
              </div>
          </div>
      <img src="<?= $activityimg;?>" alt="<?= $row['name'];?>" style="height: 100%"/>
      <div class="card-content">
          <div class="media d-flex card-header">
            <div class="media-body text-left">
              <h3 style="color:#F78536;"><span style="font-size: 16px;">From</span> <strong>&#8377; <?php echo number_format((float)$row['price'], 2);?></strong></h3>
              <span>Price / Person</span>
            </div>
            <div class="align-self-center">
              <a href="activity-booking.php?activity=<?= $row['id'];?>" class="btn btn-primary">Book Now</a>
            </div>
          </div>
          <p class="mt-3">
            <?= $row['description'];?>
          </p>
      </div>
  </div>
</div>
<div class="col-lg-4 col-md-12">
<div class="card">
<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>&output=embed"></iframe>
</div>

<div class="card text-center">
  <?php
    $allactivitessql = "SELECT * FROM tbl_activities WHERE id != ".$row['id']." ORDER BY created_at DESC";
    $allactivitesresult = mysqli_query($conn,$allactivitessql);
    if(mysqli_num_rows($allactivitesresult) > 0)
              {
                while($rowallactivites = mysqli_fetch_array($allactivitesresult))
                {
                    if (!empty($rowallactivites['coverimage'])) {
                         $rowactivityimg = "admin/uploads/activities/coverimage/".$rowallactivites['coverimage'];
                     }
                     else{
                        $rowactivityimg = "admin/assets/dist/img/default.png";
                     }
          ?>
          <a href="activity-details.php?view=<?= $rowallactivites['id'];?>">
              <div class="card shadow-none" style="flex-direction: row;align-items: center;">
                <img src="<?= $rowactivityimg;?>" alt="<?= $rowallactivites['name'];?>" class="card-img-top" style=" width: 30%;height: 100px;
                border-top-right-radius: 0;border-bottom-left-radius: calc(0.25rem - 1px);" />
                <div class="card-body text-left">
                  <h5 class="card-title" style="color:#000;"><?= $rowallactivites['name'];?></h5>
                  <p class="card-text">
                    <span style="font-size: 16px;">From</span> <strong style="color:#F78536;">&#8377; <?php echo number_format((float)$rowallactivites['price'], 2);?></strong><br>Price / Person
                  </p>
                </div>
              </div>
            </a>
  <?php }}else{
                        echo "<p>Activity Not Available</p>";
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