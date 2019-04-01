<?php 
include('../dbconfig.php');
include('../data-md5.php');
session_start();
$user_ID = $_SESSION['login_id'];
if (isset($_FILES['profileimg']['tmp_name'])) 
{
	$new_img = addslashes(file_get_contents($_FILES['profileimg']['tmp_name']));

	// print_r($_FILES);
	$sql = "UPDATE `user_accounts` SET `user_img` = '$new_img' WHERE `user_accounts`.`user_ID` = $user_ID ;";
	if (mysqli_query($conn, $sql)) {
	    echo "Profile Image Succesfully";
	   
	} else {
	    echo "Error updating record: " . mysqli_error($conn);
	}
}
else{
	$new_img = '';
}


?>