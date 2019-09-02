<?php
require_once('../class.function.php');

session_start();
$classroom = new DTFunction(); 
if($_POST["action"] == "classroom_add")
{	
	try
	{	$user_ID = $_SESSION['user_ID'];
		$classroom_course = $_POST["add_classroom_course"];
		$classroom_descr = $_POST["add_classroom_descr"];
		$classroom_password = $_POST["add_classroom_password"];

		$last_id = $classroom->insert_classroom($user_ID,$classroom_course,$classroom_descr,$classroom_password);
		$y = date("Y");
        $m = date("m");
        $d = date("d");
        $classcode = $y.$m.$d+$last_id;

        $sql ="SELECT * FROM `class_room` WHERE class_Code = '$classcode'";
        $smtp = $classroom->runQuery($sql);
		$chk_result = $smtp->execute();
		if($smtp->rowCount() == 1)
		{
			 $classcode += 1;
		}
	
		
		$sql = "UPDATE `class_room` SET `class_Code` = '".$classcode."' WHERE `class_ID` = ".$last_id;
		$smtp1 = $classroom->runQuery($sql);
		$update_result = $smtp1->execute();
		if(!empty($update_result))
		{
			echo 'Successfully Added';
		}
		

	}
	catch (PDOException $e)
	{	
	    echo "There is some problem in connection: " . $e->getMessage();
	}
	
}
if($_POST["action"] == "classroom_delete")
{	
	$classroom_ID = $_POST["classroom_ID"];
	$sql = "DELETE FROM `class_room` WHERE `class_room`.`class_ID` = $classroom_ID";
	$statement = $classroom->runQuery($sql);
			
	$result = $statement->execute();
	if(!empty($result))
	{
		echo 'Successfully Deleted';
	}
}

?>

