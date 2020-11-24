<?php 
	include 'dbconnect.php';
	$sql = "select * from tbl_staff where staff_name LIKE '%{$_POST["search"]}%'";
	$result = $db->query($sql);
	echo " <table border='1px' class='table'>
		 	<tr>
		 		<th>SL.No</th>
		 		<th>Staff Name</th>
		 		<th>Staff Qualification</th>
		 		<th>Staff Salary</th>
		 		<th>View</th>
		 		<th>Delete</th>
		 	</tr>
		 ";
	if($result->num_rows>0){
		$i = 0;
		while($row = $result->fetch_assoc()){
			$i++;
			echo "<tr>
					<td>$i</td>
					<td>{$row['staff_name']}</td>
					<td>{$row['staff_qualification']}</td>
					<td>{$row['staff_salary']}</td>
					<td><a href='' class='btnb'>View</a></td>
					<td><a href='' class='btnr'>Delete</a></td>
				</tr>";
		}
	}
	echo "</table><br><br>";
 ?>
