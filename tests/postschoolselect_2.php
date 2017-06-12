<!DOCTYPE HTML>
<html>
<head>
<style>
</style>
<script>
	function addToSelectedList(){
		var unselectedList = document.getElementById("courses_unselected");
		var selectedList = document.getElementById("selected_courses_list");


		var x = getSelectedOption(unselectedList);
		x.disabled = true;
		// var xText = unselectedList.options[sel.selectedIndex].text;
		var xText = x.text;
		// alert(xText);

		var entry = document.createElement('LI');
		entry.id = x.value;
		// entry.appendChild(document.createTextNode(firstname));
		// entry.innerHTML = "" + x + " " + y + " " + z;
		// entry.innerHTML = "hi";
		entry.innerHTML = xText;

		if(!selectedList.innerHTML.includes(xText)) {

			document.getElementById('selected_courses_list').appendChild(entry);
		}

alert(selectedList.innerHTML);
		updateSatisfiedRequirements(selectedList.innerHTML);


	}

	function getSelectedOption(sel) {
        var opt;
        for ( var i = 0, len = sel.options.length; i < len; i++ ) {
            opt = sel.options[i];
            if ( opt.selected === true ) {
                break;
            }
        }
        return opt;
    }

	function listToString(str){
		var outString = "";
		while (str.indexOf("<li") > -1) {
			var a = str.indexOf("<li") + 3;
			str = str.substring(a);
			a = str.indexOf(">") + 1;
			var b = str.indexOf("</li>");
			var c = b + 5;

			outString = outString + str.substring(a, b) + "[]";
			str = str.substring(c);
		}
		return outString;
		// return "a";
	}
	function listToArray(str){
		var arr = [];
		while (str.indexOf("<li") > -1) {
			var a = str.indexOf("<li") + 3;
			str = str.substring(a);
			a = str.indexOf(">") + 1;
			var b = str.indexOf("</li>");
			var c = b + 5;

			arr.push(str.substring(a, b));
			str = str.substring(c);
		}

		return arr;
	}

   	function updateSatisfiedRequirements(str) {
		str = listToString(str);
		// alert(str);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("lulz").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "satisfied.php?q=" + str, true);
		xmlhttp.send();
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
						$val = $row["Prefix"];
						$val = $val . $row["course_num"];
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
	<hr>
	<div id = "lulz">
	</div>
</body>
</html>
