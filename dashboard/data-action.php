<?php 
include('../dbconfig.php');
session_start();
// print_r($_POST);
// print_r($_SESSION);
$user_id = $_SESSION["login_id"];


if (isset($_POST["comment"])) {
	$classPost_ID = $_POST["classPost_ID"];
	$new_comment = $_POST["comment"];
	$sql1 = "INSERT INTO `class_comment` (`comment_ID`, `user_ID`, `class_ID`, `comment_content`, `comment_Date`) VALUES (NULL, '$user_id', '$classPost_ID', '$new_comment', CURRENT_TIMESTAMP);";
	$query1 = mysqli_query($conn,$sql1);
}

if (isset($_POST['submit_createclass'])) {

		$class_Name = $_POST['class_Name'];
		$class_Description  = $_POST['class_Description'];
		$class_color  = $_POST['class_color'];
		

		
		$sql = "INSERT INTO `class_room` (`class_ID`, `user_ID`, `class_Code`, `class_Name`, `class_Description`, `class_Color`) VALUES (NULL, '$user_id', NULL, '$class_Name', '$class_Description', '$class_color');";

		if (mysqli_query($conn, $sql)) {
			$y = date("Y");
			$m = date("m");
			$d = date("d");
		    $last_id = mysqli_insert_id($conn);
		echo    $classcode = $y.$m.$d+$last_id;
		    $sql = "UPDATE `class_room` SET `class_Code` = '$classcode' WHERE `class_room`.`class_ID` = $last_id;";
		    mysqli_query($conn, $sql);
		    echo "<script>alert('Success');
											window.location='classroom';
										</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
}
if (isset($_POST['submit_disableclass'])) {
	$class_ID = $_POST['submit_disableclass'];
	echo $sql = "UPDATE `class_room` SET `class_status` = '0' WHERE `class_room`.`class_ID` = $class_ID;";
	if (mysqli_query($conn, $sql)) {
	 echo "<script>alert('Success');
											window.location='classroom';
										</script>";
		}
	else{
		echo "<script>alert('Error');
											window.location='classroom';
										</script>";
		}
}

if (isset($_POST['submit_enableclass'])) {
	$class_ID = $_POST['submit_enableclass'];
	echo $sql = "UPDATE `class_room` SET `class_status` = '1' WHERE `class_room`.`class_ID` = $class_ID;";
	if (mysqli_query($conn, $sql)) {
	 echo "<script>alert('Success');
											window.location='classroom';
										</script>";
		}
	else{
		echo "<script>alert('Error');
											window.location='classroom';
										</script>";
		}
}

if (isset($_POST['submit_joinclass'])) {

		$joinclasscode =  $_POST['joinclasscode'];
		$sql = "SELECT class_ID FROM `class_room` WHERE class_Code = '$joinclasscode'";
		if ($query = mysqli_query($conn, $sql)) {
			 while($classroom = mysqli_fetch_assoc($query)) {
			echo 	$class_ID = $classroom['class_ID'];
			}
			$sql = "SELECT * FROM `class_student` WHERE class_ID = '$class_ID' AND user_ID = '$user_id'";
			$query = mysqli_query($conn, $sql);
			// IF STUDENT ALREADY IN CLASS CANNOT BE ADD
			if (mysqli_num_rows($query) > 0) {
				echo "<script>alert('Already Join In Classroom ');
												window.location='classroom';
											</script>";
			}
			else{
				$sql = "INSERT INTO `class_student` (`classStudent_ID`, `user_ID`, `class_ID`) VALUES (NULL, '$user_id', '$class_ID');";
				if (mysqli_query($conn, $sql)) {
					echo "<script>alert('Success Fully Join W8 For Approval');
												window.location='classroom';
											</script>";
				}
				else{
					echo "<script>alert('Classroom Join Error');
												window.location='classroom';
											</script>";
				}

			}

				
		}
		else{
			echo "<script>alert('Classroom Code Error');
											window.location='classroom';
										</script>";
		}
		

		// insert join
}

if (isset($_POST['submit_postinClass'])) {
	print_r($_POST);
	$newpost_content = $_POST["newpost_content"];
	$sql = "INSERT INTO `class_post` (`classPost_ID`, `user_ID`, `class_ID`, `classTopic_ID`, `classPost_Name`, `classPost_Description`, `classPost_Date`) VALUES (NULL, NULL, NULL, NULL, '', '', CURRENT_TIMESTAMP);";
	# code...
}

if (isset($_POST['submit_createTopic'])) {

	}

if (isset($_POST['action'])) {
	if ($_POST["action"] == "userclassEnable") {
		$classStudent_ID = $_POST['classStudent_ID'];
		
		$sql = "UPDATE `class_student` SET `join_Stat` = '1' WHERE `class_student`.`classStudent_ID` = $classStudent_ID;";
		if (mysqli_query($conn, $sql)) {
			# code...
		}

	}
	if ($_POST["action"] == "classuserDisable") {
		
		$classStudent_ID = $_POST['classStudent_ID'];
		$sql = "UPDATE `class_student` SET `join_Stat` = '0' WHERE `class_student`.`classStudent_ID` = $classStudent_ID;";
		if (mysqli_query($conn, $sql)) {
			# code...
		}
	}
}
?>