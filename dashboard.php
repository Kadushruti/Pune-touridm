<?php session_start();
if(!isset($_SESSION['logged_in_user_id']))
{
?>
  <script>window.location.assign("../login.php");</script>
<?php
}
else
{
  include("../dbconfig/config.php");
  include("../dbconfig/validate.php");
  include("include/counts.php");
?>
<!doctype html>
<html lang="en">
<head>
        <?php
include('include/head.php');
?>
    </head>
    <body class="fixed">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
include('include/sidebar.php');
?>
            <!-- Page Content  -->
            <div class="content-wrapper">
                <div class="main-content">
                    <!--/.navbar-->
                    <?php
include('include/header.php');
?>
                    <!--Content Header (Page header)-->
                    <div class="content-header row align-items-center m-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="fas fa-home"></i></div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                      <div class="row mt-5">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="bookings.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fa fa-gamepad"></i>
                                        </div>
                                        <h3 class="card-title fs-18 font-weight-bold">
                                            <?= $total_bookings; ?>
                                        </h3>
                                    </div>
                                    <div class="card-footer p-3">
                                         <div class="stats font-weight-bold text-dark">Total Bookings
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="managehotels.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <h3 class="card-title fs-21 font-weight-bold"><?= $total_hotels; ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats text-dark font-weight-bold">
                                           Total Hotels
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="managerooms.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-bed"></i>
                                        </div>
                                        <h3 class="card-title fs-21 font-weight-bold"><?= $total_rooms; ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats font-weight-bold text-dark">
                                            Total Rooms
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="managedestinations.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-map-marked"></i>
                                        </div>
                                        <h3 class="card-title fs-21 font-weight-bold"><?= $total_destinations; ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats font-weight-bold text-dark">
                                           Total Destinations
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="manageactivities.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-skiing-nordic"></i>
                                        </div>
                                        <h3 class="card-title fs-21 font-weight-bold"><?= $total_activities; ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats font-weight-bold text-dark">
                                           Total Activities
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="contact.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </div>
                                        <h3 class="card-title fs-21 font-weight-bold"><?= $total_contacts; ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats font-weight-bold text-dark">
                                           Total Contacts
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="manageusers.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <h3 class="card-title fs-21 font-weight-bold"><?= $total_users; ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats font-weight-bold text-dark">
                                           Total Users
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <a href="managefacilites.php">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-wrench"></i>
                                        </div>
                                        <h3 class="card-title fs-21 font-weight-bold"><?= $total_facilities; ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats font-weight-bold text-dark">
                                           Total Facilities
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>  
                    </div><!--/.body content-->
                </div><!--/.main content-->
                <?php
include('include/footer.php');
?>
                <!--/.footer content-->
                <div class="overlay"></div>
            </div><!--/.wrapper-->
        </div>
        <!--Global script(used by all pages)-->
        <?php
include('include/script.php');
?>
    </body>

</html>
<?php
}
?>