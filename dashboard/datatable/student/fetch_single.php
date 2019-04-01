<?php
include('db.php');
include('function.php');
if(isset($_POST["rsd_ID"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM `record_student_details`
		WHERE rsd_ID = '".$_POST["rsd_ID"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{

		$output["student_num"] = $row["rsd_StudNum"];
		$output["student_fname"] = $row["rsd_FName"];
		$output["student_mname"] = $row["rsd_MName"];
		$output["student_lname"] = $row["rsd_LName"];
		$output["student_suffix"] = $row["suffix_ID"];
		$output["student_sex"] = $row["rsd_Sex"];
	
	}
	echo json_encode($output);
}
?>