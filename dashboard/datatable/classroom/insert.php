<?php
require_once('../class.function.php');

session_start();
$classroom = new DTFunction(); 
if($_POST["action"] == "classroom_add")
{	
	try
	{	$user_ID = $_SESSION['user_ID'];
		$classroom_course = $_POST["classroom_course"];
		$classroom_descr = $_POST["classroom_descr"];
		$classroom_password = $_POST["classroom_password"];

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
	try
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
	catch (PDOException $e)
	{	
	    echo "There is some problem in connection: " . $e->getMessage();
	}
}

if($_POST["action"] == "classroom_edit")
{
	try
	{
		$classroom_ID = $_POST["classroom_ID"];
		$classroom_course = $_POST["classroom_course"];
		$classroom_descr = $_POST["classroom_descr"];
		$classroom_password = $_POST["classroom_password"];
		$class_status = $_POST["class_status"];

		$sql = "UPDATE `class_room` 
		SET 
		`class_Name` = '$classroom_course',
		`class_Description` = '$classroom_descr',
		`status_ID` = '$class_status',
		`class_Password` = '$classroom_password' 
		WHERE `class_room`.`class_ID` =  $classroom_ID";
		$statement = $classroom->runQuery($sql);
				
		$result = $statement->execute();
		if(!empty($result))
		{
			echo 'Successfully Enable';
		}
	}
	catch (PDOException $e)
	{	
	    echo "There is some problem in connection: " . $e->getMessage();
	}
	
}
if($_POST["action"] == "enable_classroom")
{
	try
	{
		$classroom_ID = $_POST["classroom_ID"];

		$sql = "UPDATE `class_room` SET `status_ID` = '1' WHERE `class_room`.`class_ID` = $classroom_ID";
		$statement = $classroom->runQuery($sql);
				
		$result = $statement->execute();
		if(!empty($result))
		{
			echo 'Successfully Enable';
		}
	}
	catch (PDOException $e)
	{	
	    echo "There is some problem in connection: " . $e->getMessage();
	}
	
}
if($_POST["action"] == "disabled_classroom")
{
	try
	{
		$classroom_ID = $_POST["classroom_ID"];

		$sql = "UPDATE `class_room` SET `status_ID` = '2' WHERE `class_room`.`class_ID` = $classroom_ID";
		$statement = $classroom->runQuery($sql);
				
		$result = $statement->execute();
		if(!empty($result))
		{
			echo 'Successfully Disabled';
		}
	}
	catch (PDOException $e)
	{	
	    echo "There is some problem in connection: " . $e->getMessage();
	}
}




?>

