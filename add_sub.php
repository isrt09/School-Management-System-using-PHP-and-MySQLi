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
					<h3 > Add Subject Details</h3><br>
					<?php 
						if(isset($_POST['submit'])){
							$sql = "insert into tbl_subject(subject_name) values('{$_POST["subject_name"]}')";
							$result =$db->query($sql);
							if($result){
								echo "<div class='success'>Subject Added Successfully!</div>";
							}else{
								echo "<div class='error'>Subject Added Failed!</div>";
							}
						}
					 ?>	

					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Subject Name</label><br>
						<input type="text" name="subject_name">
						<button type="submit" class="btn" name="submit">Add Subject</button>
					</form>
					<div class="tbox">
						<h3 style="margin-top:30px;"> Class Details</h3><br>
						<table border="1px">
						<tr>
							<th>SL No</th>
							<th>Subject Name</th>							
							<th>Delete</th>							
						</tr>
						<?php 
							$sql    = "SELECT * FROM tbl_subject";
							$result = $db->query($sql);
							if($result->num_rows>0){
								$i =0;
								while($row = $result->fetch_assoc())
								{
									$i++;
									echo "
									<tr>
										<td>{$i}</td>
										<td>{$row["subject_name"]}</td>				
										<td><a href='delete.php?id={$row['subject_id']}' class='btnr'>Delete</a></td>
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