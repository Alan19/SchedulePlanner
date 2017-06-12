<!DOCTYPE HTML>
<!-- Max Friedman -->
<html>
	<head>
		<title></title>
		<style></style>
		<script>
			<?php
				$conn = new PDO ("mysql:host=localhost:8000;dbname=classes", "root", "");
				$cmd  = "SELECT DISTINCT foodgroup from foods";

				$result = $conn->prepare($cmd);
				$result->execute();

				$data = $result->fetchAll(PDO::FETCH_NUM);

				echo "foodGroupList = ".json_encode($data).";";
			?>

			function initialize(){
				selectFoodGroup = document.getElementById("select_food_group");

				for (var i = 0; i < foodGroupList.length; i++){
					var nextOption = document.createElement("option");
					nextOption.value = foodGroupList[i][0];
					nextOption.innerHTML = nextOption.value;
					selectFoodGroup.add(nextOption);
				}
			}
		</script>
	</head>
	<body onload = "initialize();">
		<select name = "slct" id = "select_food_group">
			<option selected disabled>Select Food Group</option>
		</select>
	</body>
</html>
