<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$user_ID = $_POST['user_ID'];
	$user_Name = $_POST['editName'];
	$user_Email = $_POST['editEmail'];
	$user_status = $_POST['editStatus'];

	$sql = "UPDATE user_accounts SET user_ID = '$user_ID', user_Name = '$user_Name', user_Email = '$user_Email', user_status = '$user_status' WHERE user_ID = $user_ID";
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