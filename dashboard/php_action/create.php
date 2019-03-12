<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$name = $_POST['name'];
	$email = $_POST['email'];
	$status = $_POST['status'];

	$sql = "INSERT INTO `user_accounts` (`user_ID`, `level_ID`, `user_Name`, `user_Pass`, `user_Email`, `user_Registered`, `user_status`) VALUES (NULL, NULL, '$name', '', '$email', CURRENT_TIMESTAMP, '$status');";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}