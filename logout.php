<?php session_start();
include('../dbconfig/config.php');
mysqli_close($conn);
$_SESSION=array();
session_unset();
session_destroy();
?>
<script type="text/javascript">
	window.location="../login.php"; 
</script>