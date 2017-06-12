<?php

$q = $_REQUEST["q"];
$qCopy = $q;


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


	$sql = "SELECT DISTINCT Prefix, course_num, course_name FROM courses_" . $q;
	
	$result = $conn->query($sql);



	function newCourseLI ($prefix, $course_num, $course_name) {
		echo "<option";
		echo " data-prefix = " . $prefix;
		echo " data-course-num = " . $course_num;
		echo " data-course-name = \"" . $course_name . "\"";
		echo ">" . $prefix . " " . $course_num . " " . $course_name . "</option>";
	}


	if ($result->num_rows > 0) {



		// output data of each row
		while($row = $result->fetch_assoc()) {
			$val = $row["Prefix"];
			$val = $val . $row["course_num"];
			$cn = $row["course_name"];
			newCourseLI($row["Prefix"], $row["course_num"], $row["course_name"]);

		}


	} else {
		echo "0 results";
	}
?>
