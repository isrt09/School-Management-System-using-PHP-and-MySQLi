<?php
	include"dbconnect.php";
	session_start();
	if(!isset($_SESSION["admin_id"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">		
	</head>
	<body>	
		<?php include"navbar.php";?><br>				
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">			
			<div id="section">			
				<?php include"sidebar.php";?><br>
				
				<div class="error"></div>
				<div class="content1">
					<h3 class="text">Welcome <?php echo $_SESSION["username"]; ?></h3><br><hr><br>
					<h3 > Add Staff Details</h3><br>					
					<?php 
						if(isset($_POST['stuff'])){
	$sql = "insert into tbl_staff(staff_name,staff_password,staff_qualification,staff_salary) values('{$_POST["staff_name"]}','1234','{$_POST["staff_qualification"]}','{$_POST["staff_salary"]}')";
							$result = $db->query($sql);							
							if($result){
								echo "<div class='success'>Staff Added Successfully</div>";
							}else{
								echo "<div class='error'>Failed to Save</div>";
							}
						}
					 ?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Staff Name</label><br>
						<input type="text" name="staff_name" class="input"><br><br>		
						<label>Qualification</label><br>
						<input type="text" name="staff_qualification" class="input"><br><br>
						<label>Salary</label><br>
						<input type="text" name="staff_salary" class="input">				
						<input type="submit" name="stuff" value="Add Staff" class="btn">
					</form>
					<div class="tbox">
						<h3 style="margin-top:30px;"> Staff Details</h3><br>
						<table border="1px">
						<tr>
							<th>SL No</th>
							<th>Staff Name</th>							
							<th>Qualification</th>							
							<th>Salary</th>							
							<th>Action</th>							
						</tr>
						<?php 
							$sql    = "select * from tbl_staff";
							$result = $db->query($sql);
							if($result->num_rows>0){
								$i=0;
								while($row=$result->fetch_assoc()){
									$_SESSION['staff_id'] = $row['staff_id'];
									$i++;
									echo"<tr>
											<td>$i</td>
											<td>{$row['staff_name']}</td>
											<td>{$row['staff_qualification']}</td>
											<td>{$row['staff_salary']}</td>
											<td>
												<a href='delete_staff.php?id={$row["staff_id"]}' class='btnr'>Delete</a>
											</td>
										</tr>";
								}
							}
							if(isset($_GET['msg'])){
								echo "<div class='success'>{$_GET['msg']}</div>";
							}
						 ?>																
					</table>
					<br>														
					</div>					
				</div>				
			</div>	
		<?php include"footer.php";?>
	</body>
</html>