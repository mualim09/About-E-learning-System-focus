<?php

	require_once("scripts/connect_db.php");

	if(isset($_POST['total_ques']) && $_POST['total_ques'] != ""){
		$total_questions = $_POST["total_ques"];

		$questIDs='';


		for($i=1 ; $i <= $total_questions ; $i++) {
	        @$fetch_ID = "qu".$i;

	        if(isset($_POST[$fetch_ID])) {
				@$php_id = $_POST[$fetch_ID];

				if($php_id){
					$check_sql = mysqli_query($conn,"SELECT quiz_id FROM questions 
	                                            WHERE question_id='$php_id'") or die(mysqli_error());
					$qz_id_array = mysqli_fetch_array($check_sql);
	            	$qz_id = $qz_id_array[0];

					mysqli_query($conn,"DELETE FROM questions 
									WHERE question_id='$php_id'")or die(mysqli_error());
					mysqli_query($conn,"DELETE FROM answers 
									WHERE question_id='$php_id'")or die(mysqli_error());

					mysqli_query($conn,"UPDATE quizes SET total_questions=total_questions-1 
									WHERE quiz_id='$qz_id' LIMIT 1")or die(mysqli_error());
					$questIDs .= $i.', ';

				}
			}
		}

		$user_msg = 'Questions, \ '.$questIDs.' \ have been deleted!';
	    header('location: admin.php?msg='.$user_msg.'');
	}else{
		$user_msg = 'Sorry, but Something went wrong';
		header('location: admin.php?msg='.$user_msg.'');
    }
?>







