<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "Add")
	{
		
		$instructor_num =   $_POST["instructor_num"];
		$instructor_fname = $_POST["instructor_fname"];
		$instructor_mname = $_POST["instructor_mname"];
		$instructor_lname = $_POST["instructor_lname"];
		$instructor_suffix = $_POST["instructor_suffix"];
		$instructor_sex = $_POST["instructor_sex"];

		$sql = "SELECT * FROM `record_instructor_detail` WHERE `rid_EmpID`= :instructor_num;";
		$statement = $connection->prepare($sql);
		$statement->bindParam(':instructor_num', $instructor_num, PDO::PARAM_STR);
		$result = $statement->execute();
		$resultrows = $statement->rowCount();

		if (empty($resultrows)) {

				$sql ="INSERT INTO `record_instructor_detail` (
				`rid_ID`,
				 `rid_EmpID`,
				  `rid_FName`,
				   `rid_MName`,
				    `rid_LName`,
				     `suffix_ID`,
				      `rid_Sex`) 
				      VALUES (
				      NULL,
				       :instructor_num,
				        :instructor_fname,
				         :instructor_mname,
				          :instructor_lname,
				           :instructor_suffix,
				            :instructor_sex);";
				
				$statement = $connection->prepare($sql);
				
				$result = $statement->execute(
						array(
							':instructor_num'			=>	$instructor_num,
							':instructor_fname'	  		=>	$instructor_fname,
							':instructor_mname'	 		=>	$instructor_mname,
							':instructor_lname'	 		=>	$instructor_lname,
							':instructor_suffix'	 	=>	$instructor_suffix,
							':instructor_sex'	 		=>	$instructor_sex
						)
					);
				if(!empty($result))
				{
					echo 'Teacher Added';
				}

		}
		else {
		   // if Instructor ID is not available
			echo 'Instructor ID Number is Already Use';

		}
	
	}
	


	if($_POST["operation"] == "Edit")
	{
		
		$rid_ID = $_POST["rid_ID"];
		
		$instructor_num =   $_POST["instructor_num"];
		$instructor_fname = $_POST["instructor_fname"];
		$instructor_mname = $_POST["instructor_mname"];
		$instructor_lname = $_POST["instructor_lname"];
		$instructor_suffix = $_POST["instructor_suffix"];
		$instructor_sex = $_POST["instructor_sex"];

		$sql = "SELECT * FROM `record_instructor_detail` WHERE `rid_EmpID`= :instructor_num;";
		$statement = $connection->prepare($sql);
		$statement->bindParam(':instructor_num', $instructor_num, PDO::PARAM_STR);
		$result = $statement->execute();
		$resultrows = $statement->rowCount();

		if (empty($resultrows)) {

				$sql ="UPDATE `record_instructor_detail` 
				SET 
				`rid_EmpID` = :instructor_num,
				 `rid_FName` = :instructor_fname,
				  `rid_MName` = :instructor_mname,
				  `rid_LName` = :instructor_lname,
				   `suffix_ID` = :instructor_suffix,
				    `rid_Sex` = :instructor_sex
				     WHERE `record_instructor_detail`.`rid_ID` = :rid_ID;";
				
				$statement = $connection->prepare($sql);
				
				$result = $statement->execute(
						array(
							':rid_ID'					=>	$rid_ID,
							':instructor_num'			=>	$instructor_num,
							':instructor_fname'	  		=>	$instructor_fname,
							':instructor_mname'	 		=>	$instructor_mname,
							':instructor_lname'	 		=>	$instructor_lname,
							':instructor_suffix'	 	=>	$instructor_suffix,
							':instructor_sex'	 		=>	$instructor_sex
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
				$chk_ID = $row["rid_ID"];
				$chk_EmpID = $row["rid_EmpID"];
			}
			if ($chk_EmpID == $instructor_num AND $chk_ID  == $rid_ID) 
			{
				$sql ="UPDATE `record_instructor_detail` 
				SET 
				`rid_EmpID` = :instructor_num,
				 `rid_FName` = :instructor_fname,
				  `rid_MName` = :instructor_mname,
				  `rid_LName` = :instructor_lname,
				   `suffix_ID` = :instructor_suffix,
				    `rid_Sex` = :instructor_sex
				     WHERE `record_instructor_detail`.`rid_ID` = :rid_ID;";
				
				$statement = $connection->prepare($sql);
				
				$result = $statement->execute(
						array(
							':rid_ID'					=>	$rid_ID,
							':instructor_num'			=>	$instructor_num,
							':instructor_fname'	  		=>	$instructor_fname,
							':instructor_mname'	 		=>	$instructor_mname,
							':instructor_lname'	 		=>	$instructor_lname,
							':instructor_suffix'	 	=>	$instructor_suffix,
							':instructor_sex'	 		=>	$instructor_sex
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
			echo 'Instructor ID Number is Already Use';
			}
		   

		}
	
	}
}
?>
