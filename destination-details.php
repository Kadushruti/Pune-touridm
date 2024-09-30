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
       $results = mysqli_query($conn, "SELECT * FROM tbl_destinations WHERE id='$id'"); 
        $row = mysqli_fetch_array($results);
        if (!empty($row['coverimage']))
            {
              $destinationimg = "admin/uploads/destinations/coverimage/".$row['coverimage'];
            }
          else{
              $destinationimg = "admin/assets/dist/img/default.png";
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
		                    <h1 itemprop="name">DESTINATION DETAILS</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Destination Details</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
<div class="container mt-5">
<div class="row">
<div class="col-lg-8 col-md-12">
  <div class="card">
      <div class="media d-flex  card-header">
              <div class="media-body text-left">
                <h4 class="card-title">
             <?= $row['name'];?>
          </h4>
              </div>
              <div class="align-self-center">
                <a href="destination-gallery.php?view=<?= $row['id'];?>" class="btn btn-primary"><i class="fas fa-images"></i> Gallery</a>
              </div>
            </div>
      <img src="<?= $destinationimg;?>" alt="<?= $row['name'];?>" style="height: 100%;"/>
      <div class="card-content">
          <p class="mt-3">
            <?= $row['description'];?>
          </p>
      </div>
  </div>
                <div class="row">
                	<?php
				      $allhotelsql = "SELECT * FROM tbl_hotels WHERE destination_id ='".$row['id']."' ORDER BY created_at DESC";
				      $allhotelresult = mysqli_query($conn,$allhotelsql);
				      if(mysqli_num_rows($allhotelresult) > 0)
				                {
				                  while($rowallhotel = mysqli_fetch_array($allhotelresult))
				                  {
                            if (!empty($rowallhotel['coverimage']))
                                {
                                  $hotelimg = "admin/uploads/hotels/coverimage/".$rowallhotel['coverimage'];
                              }
                              else{
                                  $hotelimg = "admin/assets/dist/img/default.png";
                              }
                    ?> 
                    <div class="col-xs-12">
                        <div class="card" style="flex-direction: row;align-items: center;">
                          <img  src="<?= $hotelimg ?>"  alt="<?= $rowallhotel['name'];?>" class="card-img-top" style=" width: 30%;height: 150px;
                          border-top-right-radius: 0;border-bottom-left-radius: calc(0.25rem - 1px);" />
                          <div class="card-body">
                            <h5 class="card-title"><?= $rowallhotel['name'];?><?php 
                for ($i = 0; $i < $rowallhotel['stars']; $i++)
                {
                    echo ' <i class="star"></i>';
                }?></h5>
                            <p class="card-text">
                              <?php echo substr($rowallhotel['description'],0,150).'...';?>
                            </p>
                            <a href="hotel-details.php?view=<?= $rowallhotel['id'];?>" class="btn btn-primary">
                                    More Details
                            </a>
                            <!-- <a href="book-hotel.php?view=<?= $rowallhotel['id'];?>" class="btn btn-success">
                                    Book Now
                            </a> -->
                          </div>
                        </div>
                      </div>
                    <?php } }else{
                      ?><div class="col-xs-12">
                        <div class="card" style="flex-direction: row;align-items: center;">
                          <div class="card-body">
                            <h5 class="card-title text-center text-danger"><strong>Hotels Not Available</strong></h5>
                          </div>
                        </div>
                      </div>
                      <?php
                      }?>
                </div>
</div>
<div class="col-lg-4 col-md-12">
<div class="card">
<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $row['latitude']; ?>,<?php echo $row['longitude']; ?>&output=embed"></iframe>
</div>
<div class="card text-center">
  <?php
    $alldestinationsql = "SELECT * FROM tbl_destinations WHERE id != ".$row['id']." ORDER BY created_at DESC";
    $alldestinationresult = mysqli_query($conn,$alldestinationsql);
    if(mysqli_num_rows($alldestinationresult) > 0)
              {
                while($rowalldestination = mysqli_fetch_array($alldestinationresult))
                {
                    if (!empty($rowalldestination['coverimage'])) {
                         $rowactivityimg = "admin/uploads/destinations/coverimage/".$rowalldestination['coverimage'];
                     }
                     else{
                        $rowactivityimg = "admin/assets/dist/img/default.png";
                     }
          ?>
          <a href="destination-details.php?view=<?= $rowalldestination['id'];?>">
              <div class="card shadow-none" style="flex-direction: row;align-items: center;">
                <img src="<?= $rowactivityimg;?>" alt="<?= $rowalldestination['name'];?>" class="card-img-top" style=" width: 30%;height: 100px;
                border-top-right-radius: 0;border-bottom-left-radius: calc(0.25rem - 1px);" />
                <div class="card-body text-left">
                  <h5 class="card-title" style="color:#000;"><?= $rowalldestination['name'];?></h5>
                </div>
              </div>
            </a>
  <?php }}else{
                        echo "<p>Destinations Not Available</p>";
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