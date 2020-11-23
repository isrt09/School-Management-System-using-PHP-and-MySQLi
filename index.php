<?php
	session_start();
    include 'dbconnect.php'; 	
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>School Management System - Tutor Joe's</title>
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include 'navbar.php'; ?>			
		<img src="img/b1.jpg" width="800">		
		<div class="login">
			<h1 class="heading">Admin Login</h1>
			<?php 
				if(isset($_POST['login'])){
					$sql = "select * from tbl_admin where admin_user='{$_POST["admin_user"]}' and admin_password='{$_POST["admin_password"]}'";
					$res = $db->query($sql);	
					if($res->num_rows>0)
					{
						$row = $res->fetch_assoc();
						$_SESSION['admin_id'] = $row['admin_id'];
						$_SESSION['username'] = $row['admin_user'];
						echo "<script>window.open('admin_home.php','_self');</script>";	
					}else{
						echo "<div class='error'>Invalid Username or Password</div>";
					}						
				}
				if(isset($_GET["mes"]))
				{
					echo "<div class='error'>{$_GET["mes"]}</div>";
				}			
			 ?>	
			<div class="log">				
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>User Name</label><br>
					<input type="text" name="admin_user" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="admin_password" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>
<?php include 'footer.php'; ?>		