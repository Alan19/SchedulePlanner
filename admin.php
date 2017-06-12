<!DOCTYPE HTML>
<html>
<head>
	<style>
	</style>
	<script>
		function filetest(){
			<?php
				$myfile = fopen("testfile.txt", "w") or die("unable to open");
				$txt = "John";
				fwrite($myfile, $txt);
				fclose($myfile);
			?>
		}
	</script>
</head>
<body>
	<button onclick = "filetest()">File Test</button>
</body>
</html>
