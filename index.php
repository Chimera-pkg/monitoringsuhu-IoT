<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript"> 
	<script type="jquery-latest.js"></script>
	<script>
		$(document).ready(function() {
		$(document).ready(function() {
			$("#konten").load("home.php");
			var refreshid = setInterval(function() {
			$("#konten").load('home.php');
		}, 1000);
		$.ajaxSetup({ cache: false});
			});
		});
</script>
</head>
<body>
<center>
	<div id="konten"></div>
</center>
</body>
</html>