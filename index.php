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
	</head>
	<style type="text/css">
		.banner {
    background-image: url("https://preview.colorlib.com/theme/gotrip/assets/img/hero/h1_hero.jpg.webp");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    /*overflow: hidden;*/
    width: 100%;
    height: 100vh;
    text-align: center;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.banner::before {
    content: '';
    position: absolute;
    display: block;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.2);
    /*background-size: 100%;*/
}

.banner-text-item {
    position: absolute;
    width: 100%;
    text-align: center;
    display: flex;
    flex-flow: column wrap;
    justify-content: center;
    align-items: center;
}

.banner-heading {
    flex: 1;
}

.banner-heading h1 {
    font-size: 100px;
    font-weight: normal;
    color: #F78536;
    font-family: Satisfy;
    text-shadow: 2px 2px #000;
}

.banner-text-item .form {
    flex: 1;
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    width: 70%;
    padding: 1% 2%;
}

.banner-text-item select,
.banner-text-item .date,
.banner-text-item .book {
    padding: 15px;
    margin-right: 10px;
    font-size: 18px;
    font-family: Roboto;
    border-radius: 5px;
    outline: 0;
    border: none;
}

.banner-text-item select {
    width: 50%;
    flex: 2;
}

.banner-text-item .date {
    width: 20%;
    flex: 1;
}

.banner-text-item .book {
    width: 20%;
    flex: 1;
}

.banner-text-item .book {
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
    padding: 15px;
    cursor: pointer;
    background-color: #F78536;
    font-size: 16px;
    font-weight: normal;
    font-family: "Barlow Condensed";
    width: 20%;
}
	</style>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
<?php
include('include/header.php');
?>
		<!-- end:header-top -->
	
	<section class="banner">
    <div class="banner-text-item">
        <div class="banner-heading">
            <h1>Find your Next tour!</h1>
        </div>
        <form class="form" method="POST" action="search.php">
            <select name="destination_id" required="">
            	<option value="">Where would you like to go?</option>
            	 <?php
            $destinationsql="SELECT * FROM tbl_destinations";
            $destinationresult = mysqli_query($conn,$destinationsql);
                      if(mysqli_num_rows($destinationresult) > 0)
                      { 
                        while($destinationrow = mysqli_fetch_array($destinationresult))

                        {?>
                <option value="<?php echo $destinationrow['id'];?>"><?php echo $destinationrow['name'];?></option>
                <?php  }
                      }
                      ?>
            </datalist>
            <input type="date" name="checkin" class="date"  min="<?php echo date("Y-m-d"); ?>" required>
            <button type="submit" class="book">book</button>
        </form>
    </div>
</section>
		
		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3><strong>OUR HOTELS</strong></h3>
					</div>
				</div>
				<div class="row">
					<?php
				      $allhotelsql = "SELECT * FROM tbl_hotels ORDER BY created_at DESC limit 0,3";
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
					<div class="col-md-4">
						<div class="card" style="height: 200px;">
						  <img class="card-img" src="<?= $hotelimg;?>" alt="<?= $rowallhotel['name'];?>" style="height: 100%;" />
						  <div class="card-img-overlay text-white text-center"  style="background-color: rgb(132,132,132,0.5);">
						    <h2 class="card-title mt-5"><strong><?= $rowallhotel['name'];?></strong></h2>
						    <p class="card-text text-white"><span>From</span> <strong style="font-size: 26px;">&#8377; <?php echo number_format((float)$minprice, 2);?></strong>
                                    <span>Price / Night</span></p>
						    <a href="hotel-details.php?view=<?= $rowallhotel['id'];?>" class="btn btn-primary">More details</a>
						  </div>
						</div>
					</div>
					 <?php } }?>
					<div class="col-md-12 mt-5 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="hotels.php">See All Hotels <i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
			</div>
		</div>


<div id="fh5co-tours" class="fh5co-section-gray" style="background-color: #f7ebe3;">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3><strong>FIND OUT OUR ACTIVITIES</strong></h3>
					</div>
				</div>
				<div class="row">
					<?php
				      $allactivitysql = "SELECT * FROM tbl_activities ORDER BY created_at DESC limit 0,3";
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
					<div class="col-md-4">
						<div class="card" style="height: 200px;">
						  <img class="card-img" src="<?= $activityimg;?>" alt="<?= $rowallactivity['name'];?>" style="height: 100%;" />
						  <div class="card-img-overlay text-white text-center" style="background-color: rgb(132,132,132,0.5);">
						    <h2 class="card-title mt-5"><strong><?= $rowallactivity['name'];?></strong></h2>
						    <p class="card-text text-white"><span>From</span> <strong style="font-size: 26px;">&#8377; <?php echo number_format((float)$rowallactivity['price'], 2);?></strong>
                                    <span>Price / Person</span></p>
						    <a href="activity-details.php?view=<?= $rowallactivity['id'];?>" class="btn btn-primary">More details</a>
						  </div>
						</div>
					</div>
					 <?php } }?>
					<div class="col-md-12 mt-5 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="activities.php">See All Activities <i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3><strong>TOP DESTINATIONS<strong></h3>
					</div>
				</div>
				<div class="row">
					<?php
				      $alldestinationsql = "SELECT * FROM tbl_destinations ORDER BY created_at DESC limit 0,3";
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
					<div class="col-md-4">
						<div class="card" style="height: 200px;">
						  <img class="card-img" src="<?= $destinationimg;?>" alt="<?= $rowalldestination['name'];?>" style="height: 100%;" />
						  <div class="card-img-overlay text-white text-center"  style="background-color: rgb(132,132,132,0.5);">
						    <h2 class="card-title mt-5"><strong><?= $rowalldestination['name'];?></strong></h2>
						    <p class="card-text  text-white"><?php echo substr($rowalldestination['description'],0,80).'...';?></p>
						    <a href="destination-details.php?view=<?= $rowalldestination['id'];?>" class="btn btn-primary">More details</a>
						  </div>
						</div>
					</div>
					 <?php } }?>
					<div class="col-md-12 mt-5 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="destinations.php">See All Destinations <i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
			</div>
		</div>
		
	
		<!-- fh5co-blog-section -->
		<div id="fh5co-testimonial" style="background-color:#f7ebe3;">
		<div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3><strong>HAPPY CLIENTS<strong></h3>
					</div>
				</div>

			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote" style="background-color: #F78536"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author text-muted">John Doe</p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote" style="background-color: #F78536"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
						</blockquote>
						<p class="author text-muted">John Doe</p>
					</div>
					
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote" style="background-color: #F78536"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author text-muted">John Doe</p>
					</div>
					
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

