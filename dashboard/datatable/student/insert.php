<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "Add")
	{
		
		$student_num = $_POST["student_num"];
		$student_fname = $_POST["student_fname"];
		$student_mname = $_POST["student_mname"];
		$student_lname = $_POST["student_lname"];
		$student_suffix = $_POST["student_suffix"];
		$student_sex = $_POST["student_sex"];

		$sql = "SELECT * FROM `record_student_details` WHERE `rsd_StudNum`= :student_num;";
		$statement = $connection->prepare($sql);
		$statement->bindParam(':student_num', $student_num, PDO::PARAM_STR);
		$result = $statement->execute();
		$resultrows = $statement->rowCount();

		if (empty($resultrows)) {

				$sql ="INSERT INTO `record_student_details` (
				`rsd_ID`,
				 `user_ID`,
				  `rsd_StudNum`,
				   `rsd_FName`,
				    `rsd_MName`,
				     `rsd_LName`,
				      `suffix_ID`,
				       `rsd_Sex`) 
				VALUES (
				NULL,
				 NULL,
				  :student_num,
				   :student_fname,
				    :student_mname,
				     :student_lname,
				      :student_suffix,
				       :student_sex);";
				
				$statement = $connection->prepare($sql);
				
				$result = $statement->execute(
						array(
							':student_num'				=>	$student_num,
							':student_fname'	  		=>	$student_fname,
							':student_mname'	 		=>	$student_mname,
							':student_lname'	 		=>	$student_lname,
							':student_suffix'	 		=>	$student_suffix,
							':student_sex'	 			=>	$student_sex
						)
					);
				if(!empty($result))
				{
					echo 'Student Added';
				}

		}
		else {
		   // if Studennum is not available
			echo 'Studentnum is Already Use';

		}
	
	}
	if($_POST["operation"] == "Edit")
	{
		
		$rsd_ID = $_POST["rsd_ID"];
		
		$student_num = $_POST["student_num"];
		$student_fname = $_POST["student_fname"];
		$student_mname = $_POST["student_mname"];
		$student_lname = $_POST["student_lname"];
		$student_suffix = $_POST["student_suffix"];
		$student_sex = $_POST["student_sex"];

		$sql = "SELECT * FROM `record_student_details` WHERE `rsd_StudNum`= :student_num;";
		$statement = $connection->prepare($sql);
		$statement->bindParam(':student_num', $student_num, PDO::PARAM_STR);
		$result = $statement->execute();
		$resultrows = $statement->rowCount();

		if (empty($resultrows)) {

				$sql ="UPDATE `record_student_details` SET 

				`rsd_StudNum` = :student_num,
				`rsd_FName` = :student_fname,
				`rsd_MName` = :student_mname,
				`rsd_LName` = :student_lname,
				`suffix_ID` = :student_suffix,
				`rsd_Sex` = :student_sex

				WHERE `record_student_details`.`rsd_ID` = :rsd_ID;";
				
				$statement = $connection->prepare($sql);
				
				$result = $statement->execute(
						array(
							':rsd_ID'					=>	$rsd_ID,
							':student_num'				=>	$student_num,
							':student_fname'	  		=>	$student_fname,
							':student_mname'	 		=>	$student_mname,
							':student_lname'	 		=>	$student_lname,
							':student_suffix'	 		=>	$student_suffix,
							':student_sex'	 			=>	$student_sex
						)
					);
				if(!empty($result))
				{
					echo 'Data Updated';
				}

		} 
		else {
		   
		    $fetch = $statement->fetchAll();
			foreach($fetch as $row)
			{
				$chk_ID = $row["rsd_ID"];
				$chk_StudNum = $row["rsd_StudNum"];
			}

			if ($chk_StudNum == $student_num AND $chk_ID  == $rsd_ID) 
			{
				$sql ="UPDATE `record_student_details` SET 

				`rsd_StudNum` = :student_num,
				`rsd_FName` = :student_fname,
				`rsd_MName` = :student_mname,
				`rsd_LName` = :student_lname,
				`suffix_ID` = :student_suffix,
				`rsd_Sex` = :student_sex

				WHERE `record_student_details`.`rsd_ID` = :rsd_ID;";
				
				$statement = $connection->prepare($sql);
				
				$result = $statement->execute(
						array(
							':rsd_ID'					=>	$rsd_ID,
							':student_num'				=>	$student_num,
							':student_fname'	  		=>	$student_fname,
							':student_mname'	 		=>	$student_mname,
							':student_lname'	 		=>	$student_lname,
							':student_suffix'	 		=>	$student_suffix,
							':student_sex'	 			=>	$student_sex
						)
					);
				if(!empty($result))
				{
					echo 'Data Updated';
				}
				
			}
			
			else
			{
				// if Instructor ID is not available
				echo 'Studentnum is Already Use';
			}

		}
	
	}
}
?>
