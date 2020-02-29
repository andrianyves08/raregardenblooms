<?php
	$conn = mysqli_connect('localhost', 'root', '', 'raregardenblooms');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>