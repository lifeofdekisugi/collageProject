<html>
<head>
	<title>Home</title>
</head>
<body>


<?php 
	require_once 'process.php'; 
?>
<form action="process.php" method="POST">

	<label>Name</label>
	<br>

	<input type="text" name="name" placeholder="Enter your name">
	<br>

	<label>Location</label>
	<br>

	<input type="text" name="location" placeholder="Enter your location">
	<br>
	<br>

	<button type="submit" name="save">Save</button>



</form>

</body>