<?php
include('dbconfig/config.php');
if(isset($_POST['email']))
{
 $email=$_POST['email'];

 $checkdata=" SELECT email FROM tbl_users WHERE email='$email' ";

 $query=mysqli_query($conn,$checkdata);

 if(mysqli_num_rows($query)>0)
 {
  echo "<p class='text-danger'>Email Already Exist</p>";
 }
 else
 {
 
 }
 exit();
}

?>