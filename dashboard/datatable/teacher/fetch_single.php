<?php
include('db.php');
include('function.php');
if(isset($_POST["user_ID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM `user_accounts`
		WHERE user_ID = '".$_POST["user_ID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["level_ID"] = $row["level_ID"];
		$output["user_Name"] = $row["user_Name"];
		$output["user_Pass"] = decryptIt($row["user_Pass"]);
		$output["user_Email"] = $row["user_Email"];
		$output["user_status"] = $row["user_status"];
	
	}
	echo json_encode($output);
}
?>