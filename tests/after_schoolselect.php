<!DOCTYPE HTML>
<html>
<head>
<style>
table {
	width: 100%;
	border-collapse: collapse;
}

table, td, th {
	border: 1px solid black;
	padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

	<?php


	$con = mysqli_connect('localhost','root','root','classes');
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"ajax_demo");
	$sql="SELECT * FROM courses_brooklyn;
	$result = mysqli_query($con,$sql);

	echo "<table>
	<tr>
	<th>Item</th>
	<th>Qty</th>
	<th>Price</th>
	<th>Supplier</th>
	</tr>";
	
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['Item'] . "</td>";
		echo "<td>" . $row['Qty'] . "</td>";
		echo "<td>" . $row['Price'] . "</td>";
		echo "<td>" . $row['Supplier'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);
	?>
	</body>
	</html>
