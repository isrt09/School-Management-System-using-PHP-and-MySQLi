<?php
	include 'dbconnect.php';	
	session_start();	
	if(!isset($_SESSION["admin_id"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
 ?>

 <!DOCTYPE html>
<html>
	<head>
		<title>School Management System - Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include 'navbar.php'; ?>		
		<img src="img/b1.jpg" width="800">		
		<div class="container">
			<h3 class="text">Welcome <?php echo $_SESSION["username"]; ?></h3><br><hr><br>
				<h3 > School Information</h3><br>
			<img src="img/home.jpg" class="imgs">
			<p class="para">
				School Management System is a is a complete school management software designed to automate a school's diverse operations from classes, exams to school events calendar. 
			</p>
			
			<p class="para">
				This school software has a powerful online community to bring parents, teachers and students on a common interactive platform. It is a paperless office automation solution for today's modern schools. The School Management System provides the facility to carry out all day to day activities of the school.
			</p>
		</div>					
<?php include 'footer.php'; ?>		