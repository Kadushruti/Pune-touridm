<?php
 include("dbconfig/config.php");

if (isset($_POST['row'])) {
  $start = $_POST['row'];
  $limit = 3;
  $query = "SELECT * FROM tbl_activities ORDER BY created_at desc LIMIT ".$start.",".$limit;
  $result = mysqli_query($conn,$query);
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (!empty($row['coverimage'])) {
                                             $activityimg = "admin/uploads/activities/coverimage/".$row['coverimage'];
                                         }
                                         else{
                                            $activityimg = "admin/assets/dist/img/default.png";
                                         }
      ?>
      <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="activity-details.php?view=<?= $row['id'];?>">
                            <img src="<?= $activityimg;?>" alt="<?= $row['name'];?>" alt="<?= $row['name'];?>" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="activity-details.php?view=<?= $row['id'];?>"> <?= $row['name'];?>
                                  </a>
                                </h4>
                                <div class="media d-flex">
                                  <div class="media-body text-left">
                                    <h3 style="color:#F78536;"><span style="font-size: 16px;">From</span> <strong>&#8377; <?php echo number_format((float)$row['price'], 2);?></strong></h3>
                                    <span>Price / Person</span>
                                  </div>
                                  <div class="align-self-center">
                                    <a href="activity-details.php?view=<?= $row['id'];?>" class="btn btn-primary">More details</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php }
  }
}

 
?>