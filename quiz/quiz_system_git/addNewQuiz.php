<?php

	include('scripts/connect_db.php');

        if(isset($_POST['quizName']) && $_POST['quizName'] != ""
        && isset($_POST['quizTime']) && $_POST['quizTime'] != ""
        && isset($_POST['numQues']) && $_POST['numQues'] != ""){

            $qName=mysqli_real_escape_string($conn,$_POST['quizName']);
            $qTime=mysqli_real_escape_string($conn,$_POST['quizTime']);
            $nQues=mysqli_real_escape_string($conn,$_POST['numQues']);

            $qTime = preg_replace('/[^0-9]/', "", $qTime);
            $nQues = preg_replace('/[^0-9]/', "", $nQues);

            $fetch=mysqli_query($conn,"SELECT id FROM quizes 
                                WHERE quiz_name='$qName'")or die(mysqli_error());
            $count=mysqli_num_rows($fetch);
            if($count!="")
            {
            	$user_msg = 'Sorry, but \ '.$qName.' \ already exists!';
                header('location: admin.php?msg='.$user_msg.'');
            }else{
                mysqli_query($conn,"INSERT INTO quizes (quiz_name, display_questions, time_allotted) 
                	VALUES ('$qName','$nQues','$qTime')")or die(mysqli_error());
                
                $lastId = mysqli_insert_id();
                mysqli_query($conn,"UPDATE quizes SET quiz_id='$lastId' 
                                WHERE id='$lastId' LIMIT 1")or die(mysqli_error());

            	$user_msg = 'Quiz, \ '.$qName.' \ has been created!';
                header('location: admin.php?msg='.$user_msg.'');
            }
        }else{
            $user_msg = 'Sorry, but Something went wrong';
            header('location: admin.php?msg='.$user_msg.'');
        }
?>