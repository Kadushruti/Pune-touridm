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
		                    <h1 itemprop="name">HOTELS LISTING</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Hotels Listing</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
			<section class="wrapper pt-5 pb-5">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
                <div class="row hotelList">
                	<?php
                	  $count_query = "SELECT count(*) as allcount FROM tbl_hotels";
				      $count_result = mysqli_query($conn,$count_query);
				      $count_fetch = mysqli_fetch_array($count_result);
				      $hotelCount = $count_fetch['allcount'];
				      $limit = 3;

				      $allhotelsql = "SELECT * FROM tbl_hotels ORDER BY created_at DESC limit 0,".$limit;
				      $allhotelresult = mysqli_query($conn,$allhotelsql);
				      if(mysqli_num_rows($allhotelresult) > 0)
				                {
				                  while($rowallhotel = mysqli_fetch_array($allhotelresult))
				                  {
                              $min_query = "SELECT MIN(price) as minprice FROM tbl_rooms where hotel_id = '".$rowallhotel['id']."'";
                              $min_result = mysqli_query($conn,$min_query);
                              $min_fetch = mysqli_fetch_array($min_result);
                              $minprice = $min_fetch['minprice'];

                              if (!empty($rowallhotel['coverimage']))
                                {
                                  $hotelimg = "admin/uploads/hotels/coverimage/".$rowallhotel['coverimage'];
                              }
                              else{
                                  $hotelimg = "admin/assets/dist/img/default.png";
                              }
                    ?> 
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="hotel-details.php?view=<?= $rowallhotel['id'];?>">
                            <img src="<?= $hotelimg ?>"  alt="<?= $rowallhotel['name'];?>" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="hotel-details.php?view=<?= $rowallhotel['id'];?>"> <?= $rowallhotel['name'];?>
                                  </a>
                                </h4>
                                 <div class="media d-flex">
                                  <div class="media-body text-left">
                                    <h3 style="color:#F78536;"><span style="font-size: 16px;">From</span> <strong>&#8377; <?php echo number_format((float)$minprice, 2);?></strong></h3>
                                    <span>Price / Night</span>
                                  </div>
                                  <div class="align-self-center">
                                    <a href="hotel-details.php?view=<?= $rowallhotel['id'];?>" class="btn btn-primary">More details</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
                </div>
                <div class="loadmore">
      <input type="button" class="btn btn-primary" id="loadBtn" value="Load More">
      <input type="hidden" id="row" value="0">
      <input type="hidden" id="hotelCount" value="<?php echo $hotelCount; ?>">
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
      var count = Number($('#hotelCount').val());
      var limit = 3;
      row = row + limit;
      $('#row').val(row);
      $("#loadBtn").val('Loading...');
 
      $.ajax({
        type: 'POST',
        url: 'fetchhotels.php',
        data: 'row=' + row,
        success: function (data) {
          var rowCount = row + limit;
          $('.hotelList').append(data);
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

