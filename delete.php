<?php 
	include"dbconnect.php";
	session_start();
	$sql = "delete from tbl_class where class_id ='{$_GET["id"]}'";
	$db->query($sql);
	echo "<script>window.open('add_class.php?mes=Data Deleted','_self')</script>";

 ?>
