<?php
 include("dbconfig/config.php");
$activity_id = $_POST["activity_id"];
$resultMaxAdults = mysqli_query($conn,"SELECT * FROM tbl_activities where id = $activity_id");
$rowresultMaxAdults = mysqli_fetch_array($resultMaxAdults);
?>
<?php
for($i = 0; $i <= $rowresultMaxAdults['max_adults']; $i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
          }
?>