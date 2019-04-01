<?php

include('db.php');
include("function.php");

if(isset($_POST["rsd_ID"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM `record_student_details` WHERE rsd_ID = :rsd_ID"
	);
	$result = $statement->execute(
		array(
			':rsd_ID'	=>	$_POST["rsd_ID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>