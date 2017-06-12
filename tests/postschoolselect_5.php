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
		// x.disabled = true;
		// var xText = unselectedList.options[sel.selectedIndex].text;
		var xText = x.text;
		// alert(xText);

		var entry = document.createElement('LI');
		entry.id = x.value;
		// entry.appendChild(document.createTextNode(firstname));
		// entry.innerHTML = "" + x + " " + y + " " + z;
		// entry.innerHTML = "hi";

		if(!selectedList.innerHTML.includes(xText)) {
			var btn = document.createElement('BUTTON');
			btn.innerHTML = "Remove";

			// btn.id = "aaaa";
			btn.setAttribute("onclick","removeCourse(this)");
			entry.appendChild(btn);
			entry.innerHTML += " " + xText;

			document.getElementById('selected_courses_list').appendChild(entry);

			// document.getElementById("aaaa").onclick = "removeCourse(this);";
			// btn.id = "";
		}

// alert(selectedList.innerHTML);
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

		// var s = '<button onclick="removeCourse(this)">Remove</button>';


		while (str.indexOf("<li") > -1) {

			// str.replace('<button onclick="removeCourse(this)">Remove</button>', "");

			var a = str.indexOf("<li") + 3;
			str = str.substring(a);
			a = str.indexOf(">") + 1;
			var b = str.indexOf("</li>");
			var c = b + 5;

			outString = outString + str.substring(a, b) + "[]";
			str = str.substring(c);
		}

		// <button onclick="removeCourse(this)">Remove</button>
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

		var str2 = str;
		while (str2.indexOf('</button>') > -1) {
			// alert("Hi");
			var txt = str2.replace('<button onclick="removeCourse(this)">Remove</button>', );
			str2 = txt;
		}

		str = listToString(str2);
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

	function removeCourse(b) {
		var a = b.parentElement;
		a.parentElement.removeChild(a);

		var selectedList = document.getElementById("selected_courses_list");
		updateSatisfiedRequirements(selectedList.innerHTML);

	}

</script>
</head>
<body>

	<!-- <select id = 'courses_unselected' onchange = "addToSelectedList()"> -->
	<!-- <select id = 'courses_unselected'> -->
			<?php

			$q = $_REQUEST["schools"];
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

				// $school_db = "courses_" . $q;

				switch ($q) {
					case 'brooklyn':
						$sql = "SELECT Prefix, course_num, course_name FROM courses_brooklyn";
						break;

					case 'ccny':
						$sql = "SELECT Prefix, course_num, course_name FROM courses_ccny";
						break;


					case 'hunter':
						$sql = "SELECT Prefix, course_num, course_name FROM courses_hunter";
						break;

					case 'queens':
						$sql = "SELECT Prefix, course_num, course_name FROM courses_queens";
						break;
				}

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					echo "<select id = 'courses_unselected'>";

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
					echo "<button onclick='addToSelectedList()';>Add course</button>";
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
