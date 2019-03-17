<?php

	include('scripts/connect_db.php');

    if(isset($_POST['login']) && $_POST['login'] != "" &&
       isset($_POST['password']) && $_POST['password'] != ""){

    
        $user=mysqli_real_escape_string($conn,$_POST['login']);
        $pass=mysqli_real_escape_string($conn,$_POST['password']);

        $fetch=mysqli_query("SELECT id FROM admins 
                            WHERE username='$user'")or die(mysqli_error());
        $count=mysqli_num_rows($fetch);
        if($count!="")
        {
        	$user_msg = 'Sorry, but \ '.$user.' \ is already taken!';
            header('location: admin.php?msg='.$user_msg.'');
        }
        else
        {
            mysqli_query($conn,"INSERT INTO admins (username, password) 
            	VALUES ('$user','$pass')")or die(mysqli_error());

        	$user_msg = 'Admin account, \ '.$user.' \ has been created!';
            header('location: admin.php?msg='.$user_msg.'');
        }
    }else{
        $user_msg = 'Sorry, but Something went wrong';
        header('location: admin.php?msg='.$user_msg.'');
    }

?>