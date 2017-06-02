<!DOCTYPE HTML>
<html>
<head>
<style>
</style>
<script>
	function addToSelectedList(){
		var unselectedList = document.getElementById("courses_unselected");
		var selectedList = document.getElementById("selected_courses_list");

		var chosenOption = document.getElementById(unselectedList.value);

		var a = chosenOption.innerHTML;
		alert(unselectedList.value);


		var entry = document.createElement('LI');
		entry.id = unselectedList.value;
		// entry.appendChild(document.createTextNode(firstname));
		// entry.innerHTML = "" + x + " " + y + " " + z;
		// entry.innerHTML = "hi";
		entry.innerHTML = a;

		alert(a);

		var x = true;




		// var liNodes = [];
		//
		// for (var i = 0; i < selectedList.childNodes.length; i++) {
		// 	if (selectedList.childNodes[i].nodeName == "LI") {
		// 		liNodes.push(selectedList.childNodes[i]);
		// 	}
		// }
		//
		// // alert(liNodes.length);
		//
		//
		// if (liNodes.length > 0) {
		//
		// }

		if(!selectedList.innerHTML.includes(a)) {

			document.getElementById('selected_courses_list').appendChild(entry);
		}



	}
</script>
</head>
<body>

	<select id = 'courses_unselected' onchange = "addToSelectedList()">
		<!-- <select id = 'courses_unselected'> -->
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

					// output data of each row
					while($row = $result->fetch_assoc()) {
						$val = $row["Prefix"] . " " . $row["course_num"];
						$cn = $row["course_name"];
						echo "<option  id = $val value = $val>" . $row["Prefix"]. " " . $row["course_num"] . " ";
						echo $cn;
						echo  "</option>";

					}
					echo "</select>";
				} else {
					echo "0 results";
				}
			?>

	<div id = "selected_courses_div">
		<ul id = "selected_courses_list">
		</ul>
	</div>
</body>
</html>
