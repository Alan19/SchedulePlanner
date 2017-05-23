<!DOCTYPE HTML>
<html>
<head>
<style>
</style>
</head>
<body>


	<?php


	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "classes";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT Prefix, course_num, course_name FROM courses_brooklyn";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<select id = 'courses_unselected'>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$val = $row["Prefix"] . $row["course_num"];
			$cn = $row["course_name"];
			echo "<option id = $val value = $val>" . $row["Prefix"]. " " . $row["course_num"] . " ";
			echo $cn;
			echo  "</option>";

		}
		echo "</select>";
	} else {
		echo "0 results";
	}
	?>
</body>
</html>
