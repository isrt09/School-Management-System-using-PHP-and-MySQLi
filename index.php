<!DOCTYPE html>
<html>
	<head>
		<title>School Management System - Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<div class="navbar">
			<ul class="list">
				<b style="color:white;float:left;line-height:50px;margin-left:15px;font-family:Cooper Black;">
				School Management System</b>				
				<li><a href="admin_home.php">Admin Home</a></li>
				<li><a href="change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>									
				<li><a href="teacher_home.php">Teacher Home</a></li>
				<li><a href="teacher_change_pass.php">Settings</a></li>
				<li><a href="logout.php">Logout</a></li>									
				<li><a href="index.php">Admin</a></li>
				<li><a href="teacher_login.php">Teacher</a></li>
				<li><a href="contact.php">Contact Us</a></li>';			
			</ul>
		</div>		
		<img src="img/b1.jpg" width="800">		
		<div class="login">
			<h1 class="heading">Admin Login</h1>
			<div class="log">					
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>User Name</label><br>
					<input type="text" name="aname" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="apass" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>
		<div class="footer">
			<footer><p>Copyright &copy; Tutor Joe's </p></footer>
		</div>
		<script src="js/jquery.js"></script>
		<script>
			$(document).ready(function(){
				$(".error").fadeTo(1000, 100).slideUp(1000, function(){
						$(".error").slideUp(1000);
				});
				
				$(".success").fadeTo(1000, 100).slideUp(1000, function(){
						$(".success").slideUp(1000);
				});
			});
		</script>					
	</body>
</html>