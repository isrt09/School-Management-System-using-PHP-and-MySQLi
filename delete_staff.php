<?php 
	include 'dbconnect.php';
	session_start();
	$sql = "delete from tbl_staff where staff_id = {$_GET["id"]}";
	$db->query($sql);
	echo "<script>window.open('add_staff.php?msg=Staff Deleted','_self')</script>";	
 ?>
 