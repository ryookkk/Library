<?php
	$conn = new mysqli('localhost', 'root', '', 'library');
	
	if(!$conn){
		die("Error: Can't connect to database");
	}
?>