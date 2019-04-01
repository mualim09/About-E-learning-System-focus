<?php
include('db.php');
include('function.php');
if(isset($_POST["rid_ID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM `record_instructor_detail`
		WHERE rid_ID = '".$_POST["rid_ID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["instructor_num"] = $row["rid_EmpID"];
		$output["instructor_fname"] = $row["rid_FName"];
		$output["instructor_mname"] = $row["rid_MName"];
		$output["instructor_lname"] = $row["rid_LName"];
		$output["instructor_suffix"] = $row["suffix_ID"];
		$output["instructor_sex"] = $row["rid_Sex"];
	
	}
	echo json_encode($output);
}
?>