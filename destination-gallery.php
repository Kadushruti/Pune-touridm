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
<link rel="stylesheet" href="assets/css/gallery.css">
	</head>
<?php 
if (isset($_GET['view'])) {
    $id = $_GET['view'];
       $resultName = mysqli_query($conn, "SELECT * FROM tbl_destinations WHERE id='$id'"); 
        $rowName = mysqli_fetch_array($resultName);
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
		                    <h1 itemprop="name">DESTINATION GALLERY</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Destination Gallery</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
<div class="container mt-5">
  <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
            <h4><strong><?php echo $rowName['name'];?><strong></h4>
          </div>
        </div>
<div class="row gallery">
  <?php
      $sql = "SELECT * FROM tbl_destinations_gallery  WHERE destination_id ='".$id."' ORDER BY gallery_id DESC";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0)
      {
          while($row = mysqli_fetch_array($result))
          {
              $imageURL = 'admin/uploads/destinations/gallery/'.$row["file_name"];
      ?>
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
      <a href="<?php echo $imageURL; ?>?random=<?php echo $row["gallery_id"]?>">
        <figure><img class="img-fluid img-thumbnail" src="<?php echo $imageURL; ?>?random=<?php echo $row["gallery_id"]?>" alt="Random Image"></figure>
      </a>
    </div>
    <?php }
    }else{ ?>
      <div class="col-md-12 text-center">
        <p class="text-danger"><strong>No image(s) found...</strong></p>
      </div>
    <?php } ?>
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
<script type="text/javascript">
  $(document).ready(function() {
  $(".gallery").magnificPopup({
    delegate: "a",
    type: "image",
    tLoading: "Loading image #%curr%...",
    mainClass: "mfp-img-mobile",
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  });
});
</script>
	</body>
</html>