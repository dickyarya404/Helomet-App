<?php
	$conn=mysqli_connect("localhost", "root", "", "hellomet");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>