<?php session_start();
include("dbconfig/config.php"); 
include("dbconfig/validate-user.php");
$settings = mysqli_query($conn, "SELECT * from tbl_settings"); 
$settingsrow = mysqli_fetch_array($settings);
?>
<!DOCTYPE html>
<html class="no-js">
	<head>
 <?php
include('include/head.php');
?>
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
		                    <h1 itemprop="name">CONTACT</h1>
		            </div>
		            <div class="col-md-4 hidden-xs">
		                <div itemprop="breadcrumb" class="breadcrumb clearfix"> 
		                    <a href="index.php">Home</a>
		                    <span>Contact</span>
		                </div>
		            </div>
		        </div>
		    </div>
		</header>
		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3><strong>Contact Information</strong></h3>
					</div>
				</div>
					<div class="row animate-box">
						<div class="col-md-6">
							<h3 class="section-title">Contact Us</h3>
							<ul class="contact-info">
								<li><i class="icon-location-pin"></i><?php echo $settingsrow['address']; ?></li>
								<li><i class="icon-phone2"></i><?php echo $settingsrow['mobile_number']; ?></li>
								<li><i class="icon-mail"></i><a href="#"><?php echo $settingsrow['email']; ?></a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<form id="contact-form" action="#" method="post" role="form">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="name" required="" class="form-control" placeholder="Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" name="email" required="" class="form-control" placeholder="Email" style="height: 50px;">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="message" required="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<button type="submit" name="sendmessage" class="btn btn-primary">Send Message</button>
									</div>
								</div>

							</div>
						</div>
					</div>
			</div>
		</div>
		    <div class="row">
    	<div class="col-md-12">
<div class="card">
<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $settingsrow['latitude']; ?>,<?php echo $settingsrow['longitude']; ?>&output=embed"></iframe>
</div>
</div>
    </div>
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
<?php 
if (isset($_POST['sendmessage'])) 
{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
    
       $sql = "INSERT INTO tbl_contact (name,email,message) VALUES ('$name', '$email', '$message')";  
    $success = mysqli_query($conn,$sql);
    if($success)
    {
        ?>
        <script type="text/javascript">
          swal({title: "Success", text: "Thank You For Contact Us..!", type: "success"},
             function(){ 
                 window.location = "contact.php";
             }
          );
        </script>
        <?php
    }
    else
    {
        ?>
       <script type="text/javascript">
          swal("Sorry!","Some Thing Went Wrong, Please Try Again..!","error");
        </script>
      
        <?php
    }

}
?>