<?php 
include('../dbconfig.php');
session_start();
$user_ID = $_SESSION['login_id'];
if (isset($_POST['email'])) 
{
	$email = $_POST['email'];

	// print_r($_FILES);
	$sql = "UPDATE `user_accounts` SET `user_Email` = '$email' WHERE `user_accounts`.`user_ID` = $user_ID;";
	if (mysqli_query($conn, $sql)) {
	    echo "Succesfully Change Email";
	   
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}
else{
}


?>