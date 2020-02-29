<?php
	session_start();
	include 'includes/conn.php';;

	if(isset($_SESSION['admin'])){
		$query = $conn -> prepare("SELECT * FROM admin WHERE id = ? ");
		$query -> bind_param("s", $variable);
		$variable = $_SESSION['admin'];
		$query -> execute();
		$result = $query->get_result();
		$user = mysqli_fetch_assoc($result);
	}
	else{
		header('location: index.php');
		exit();
	}
	
?>