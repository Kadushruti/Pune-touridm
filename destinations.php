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
<link rel="stylesheet" href="assets/css/cards.css">
	</head>
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
		                    <h1 itemprop="name">DESTINATIONS</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Destinations</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
<section class="wrapper pt-5 pb-5">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
                <div class="row destinationList">
                	<?php
                	  $count_query = "SELECT count(*) as allcount FROM tbl_destinations";
				      $count_result = mysqli_query($conn,$count_query);
				      $count_fetch = mysqli_fetch_array($count_result);
				      $destinationCount = $count_fetch['allcount'];
				      $limit = 3;

				      $alldestinationsql = "SELECT * FROM tbl_destinations ORDER BY created_at DESC limit 0,".$limit;
				      $alldestinationresult = mysqli_query($conn,$alldestinationsql);
				      if(mysqli_num_rows($alldestinationresult) > 0)
				                {
				                  while($rowalldestination = mysqli_fetch_array($alldestinationresult))
				                  {
                            if (!empty($rowalldestination['coverimage']))
                                  {
                                    $destinationimg = "admin/uploads/destinations/coverimage/".$rowalldestination['coverimage'];
                                }
                                else{
                                    $destinationimg = "admin/assets/dist/img/default.png";
                                }

                    ?> 
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="destination-details.php?view=<?= $rowalldestination['id'];?>">
                            <img src="<?= $destinationimg;?>" alt="<?= $rowalldestination['name'];?>" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="destination-details.php?view=<?= $rowalldestination['id'];?>"> <?= $rowalldestination['name'];?>
                                  </a>
                                </h4>
                                <p class="">
                                	<?php echo substr($rowalldestination['description'],0,150).'...';?>
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="destination-details.php?view=<?= $rowalldestination['id'];?>" class="btn-block">
                                     More Details
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
                </div>
                <div class="loadmore">
      <input type="button" class="btn btn-primary" id="loadBtn" value="Load More">
      <input type="hidden" id="row" value="0">
      <input type="hidden" id="destinationCount" value="<?php echo $destinationCount; ?>">
    </div> 
            </div>
        </div>
    </div>
</section>

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
<script>
  $(document).ready(function () {
    $(document).on('click', '#loadBtn', function () {
      var row = Number($('#row').val());
      var count = Number($('#destinationCount').val());
      var limit = 3;
      row = row + limit;
      $('#row').val(row);
      $("#loadBtn").val('Loading...');
 
      $.ajax({
        type: 'POST',
        url: 'fetchdestinations.php',
        data: 'row=' + row,
        success: function (data) {
          var rowCount = row + limit;
          $('.destinationList').append(data);
          if (rowCount >= count) {
            $('#loadBtn').css("display", "none");
          } else {
            $("#loadBtn").val('Load More');
          }
        }
      });
    });
  });
</script>
	</body>
</html>

