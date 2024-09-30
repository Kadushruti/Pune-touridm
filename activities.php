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
		                    <h1 itemprop="name">ACTIVITIES</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Activities</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		
			<section class="wrapper pt-5 pb-5">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
                <div class="row activityList">
                	<?php
                	  $count_query = "SELECT count(*) as allcount FROM tbl_activities";
				      $count_result = mysqli_query($conn,$count_query);
				      $count_fetch = mysqli_fetch_array($count_result);
				      $activityCount = $count_fetch['allcount'];
				      $limit = 3;

				      $allactivitysql = "SELECT * FROM tbl_activities ORDER BY created_at DESC limit 0,".$limit;
				      $allactivityresult = mysqli_query($conn,$allactivitysql);
				      if(mysqli_num_rows($allactivityresult) > 0)
				                {
				                  while($rowallactivity = mysqli_fetch_array($allactivityresult))
				                  { 
                            if (!empty($rowallactivity['coverimage'])) {
                                             $activityimg = "admin/uploads/activities/coverimage/".$rowallactivity['coverimage'];
                                         }
                                         else{
                                            $activityimg = "admin/assets/dist/img/default.png";
                                         }
                    ?> 
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="activity-details.php?view=<?= $rowallactivity['id'];?>">
                            <img src="<?= $activityimg;?>" alt="<?= $rowallactivity['name'];?>" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="activity-details.php?view=<?= $rowallactivity['id'];?>"> <?= $rowallactivity['name'];?>
                                  </a>
                                </h4>
                                <div class="media d-flex">
                                  <div class="media-body text-left">
                                    <h3 style="color:#F78536;"><span style="font-size: 16px;">From</span> <strong>&#8377; <?php echo number_format((float)$rowallactivity['price'], 2);?></strong></h3>
                                    <span>Price / Person</span>
                                  </div>
                                  <div class="align-self-center">
                                    <a href="activity-details.php?view=<?= $rowallactivity['id'];?>" class="btn btn-primary">More details</a>
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
      <input type="hidden" id="activityCount" value="<?php echo $activityCount; ?>">
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
      var count = Number($('#activityCount').val());
      var limit = 3;
      row = row + limit;
      $('#row').val(row);
      $("#loadBtn").val('Loading...');
 
      $.ajax({
        type: 'POST',
        url: 'fetchactivities.php',
        data: 'row=' + row,
        success: function (data) {
          var rowCount = row + limit;
          $('.activityList').append(data);
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