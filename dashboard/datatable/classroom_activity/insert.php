<?php
require_once('../class.function.php');
$account = new DTFunction(); 
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "test_submit")
	{	
		try
		{
			

			$class_ID = $_POST["class_ID"];
			$test_name = $_POST["test_name"];
			$test_expired = $_POST["test_expired"];
			$test_timer = $_POST["test_timer"];
			$test_type = $_POST["test_type"];
			$test_status = $_POST["test_status"];
		
		
			
			$sql = "INSERT INTO `class_room_test` (`test_ID`, `class_ID`, `test_Name`, `test_Added`, `test_Expired`, `test_Timer`, `status_ID`, `tstt_ID`) 
			VALUES (
			NULL,
			 :class_ID,
			  :test_name,
			   CURRENT_TIMESTAMP,
			    :test_expired,
			     :test_timer,
			      :test_status,
			       :test_type);";
			$statement = $account->runQuery($sql);
				
			$result = $statement->execute(
			array(

					':class_ID'		=>	$class_ID ,
					':test_name'		=>	$test_name ,
					':test_expired'		=>	$test_expired ,
					':test_timer'		=>	$test_timer ,
					':test_status'		=>	$test_status ,
					':test_type'		=>	$test_type ,
				)
			);
			if(!empty($result))
			{
				echo 'Successfully Added';
			}
			

		}
		catch (PDOException $e)
		{
		    echo "There is some problem in connection: " . $e->getMessage();
		}
		
	}

	if($_POST["operation"] == "test_edit")
	{
		
		try
		{
			

			$class_ID = $_POST["class_ID"];
			$test_ID = $_POST["test_ID"];
			$test_name = $_POST["test_name"];
			$test_expired = $_POST["test_expired"];
			$test_timer = $_POST["test_timer"];
			$test_type = $_POST["test_type"];
			$test_status = $_POST["test_status"];
		

			$sql = "UPDATE `class_room_test` 
			SET 
			`test_Name` = :test_name,
			`test_Expired` = :test_expired,
			`test_Timer` = :test_timer,
			`status_ID` = :test_status,
			`tstt_ID` = :test_type
			 WHERE `test_ID` = :test_ID AND `class_ID` = :class_ID";
			$statement = $account->runQuery($sql);
				
			$result = $statement->execute(
			array(

					':class_ID'		=>	$class_ID ,
					':test_ID'		=>	$test_ID ,
					':test_name'		=>	$test_name ,
					':test_expired'		=>	$test_expired ,
					':test_timer'		=>	$test_timer ,
					':test_type'		=>	$test_type ,
					':test_status'		=>	$test_status ,

				)
			);
			if(!empty($result))
			{
				echo 'Successfully Added';
			}
		}
		catch (PDOException $e)
		{
		    echo "There is some problem in connection: " . $e->getMessage();
		}
	
	}

	if($_POST["operation"] == "test_delete")
	{
		try{
			$statement = $account->runQuery(
			"DELETE FROM `class_room_test` WHERE `test_ID` = :test_ID"
			);
			$result = $statement->execute(
				array(
					':test_ID'	=>	$_POST["test_ID"]
				)
			);
			
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
}
?>

