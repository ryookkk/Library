<?php
	require_once 'conn.php';

	if(ISSET($_POST['save'])){
		$id = $_POST['id'];
		$BookName = $_POST['BookName'];
		$Cat = $_POST['Cat'];
		$Author = $_POST['Author'];
		$ISBNNumber = $_POST['ISBNNumber'];
		$BookPrice = $_POST['BookPrice'];
		$RegDate = $_POST['RegDate'];
		
		$conn->query("INSERT INTO `library` 
		VALUES('$id', 
			'$BookName', 
			'$Cat', 
			'$Author', 
			'$ISBNNumber'
			'$BookPrice',
			'$RegDate')
			") or die(mysqli_errno());
		
		header('location: index.php');
	}
?>