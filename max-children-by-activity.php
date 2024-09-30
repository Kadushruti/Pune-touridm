<?php
 include("dbconfig/config.php");
$activity_id = $_POST["activity_id"];
$resultMaxChildren = mysqli_query($conn,"SELECT * FROM tbl_activities where id = $activity_id");
$rowresultMaxChildren = mysqli_fetch_array($resultMaxChildren);
?>
<?php
for($i = 0; $i <= $rowresultMaxChildren['max_children']; $i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
          }
?>