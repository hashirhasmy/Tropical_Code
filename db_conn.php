<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASSWORD", "");
	define("DATABASE", "registration");

	$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE)
		or die("Couldn't connect");

	if($conn){
		echo "Successfully connected!";
	}

?>