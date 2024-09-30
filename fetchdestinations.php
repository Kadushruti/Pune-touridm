<?php
 include("dbconfig/config.php");

if (isset($_POST['row'])) {
  $start = $_POST['row'];
  $limit = 3;
  $query = "SELECT * FROM tbl_destinations ORDER BY created_at desc LIMIT ".$start.",".$limit;
  $result = mysqli_query($conn,$query);
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (!empty($row['coverimage']))
        {
          $destinationimg = "admin/uploads/destinations/coverimage/".$row['coverimage'];
      }
      else{
          $destinationimg = "admin/assets/dist/img/default.png";
      }
      ?>
      <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="destination-details.php?view=<?= $row['id'];?>">
                            <img src="<?= $destinationimg;?>" alt="<?= $row['name'];?>" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="destination-details.php?view=<?= $row['id'];?>"> <?= $row['name'];?>
                                  </a>
                                </h4>
                                <p class="">
                                  <?php echo substr($row['description'],0,150).'...';?>
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="destination-details.php?view=<?= $row['id'];?>" class="btn-block">
                                    More Details
                                </a>
                            </div>
                        </div>
                    </div>
    <?php }
  }
}

 
?>