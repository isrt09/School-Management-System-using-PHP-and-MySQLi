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
				<div class="content1">
					<h3 class="text">Welcome <?php echo $_SESSION["username"]; ?></h3><br><hr><br>
					<h3 > Add Class Details</h3><br>
					<?php 
						if(isset($_POST['submit'])){
							$sql = "insert into tbl_class(class_name,class_section) values('{$_POST["class_name"]}','{$_POST["class_section"]}')";
							$result =$db->query($sql);
							if($result){
								echo "<div class='success'>Class Added Successfully!</div>";
							}else{
								echo "<div class='error'>Class Added Failed!</div>";
							}
						}
					 ?>	

					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Class Name</label><br>
						<select name="class_name"  required class="input2">
							<option value="">Select</option>
							<option value="I">I</option>
							<option value="II">II</option>
							<option value="III">III</option>
							<option value="IV">IV</option>
							<option value="V">V</option>
							<option value="VI">VI</option>
							<option value="VII">VII</option>
							<option value="VIII">VIII</option>
							<option value="IX">IX</option>
							<option value="X">X</option>						
						</select><br><br>
						<label>Class Name</label><br>
						<select name="class_section"  required class="input2">
							<option value="">Select</option>						
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
							<option value="E">E</option>
							<option value="F">F</option>						
						</select><br><br>
						<button type="submit" class="btn" name="submit">Add Class</button>
					</form>
					<div class="tbox">
						<h3 style="margin-top:30px;"> Class Details</h3><br>
						<table border="1px">
						<tr>
							<th>SL No</th>
							<th>Class Name</th>
							<th>Class Section</th>
							<th>Delete</th>							
						</tr>
						<?php 
							$sql    = "SELECT * FROM tbl_class";
							$result = $db->query($sql);
							if($result->num_rows>0){
								$i =0;
								while($row = $result->fetch_assoc())
								{
									$i++;
									echo "
									<tr>
										<td>{$i}</td>
										<td>{$row["class_name"]}</td>
										<td>{$row["class_section"]}</td>
										<td><a href='delete.php?id={$row['class_id']}' class='btnr'>Delete</a></td>
									</tr>";
								}								
							}

							if(isset($_GET['mes'])){
								echo "<div class='success'>Deleted Successfully</div>";
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