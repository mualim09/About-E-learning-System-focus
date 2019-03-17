<?php 

    include('scripts/connect_db.php');
    
    if(isset($_POST['login']) && $_POST['login'] != "" &&
       isset($_POST['password']) && $_POST['password'] != "" ){
        session_start();
        {
            $user=mysqli_real_escape_string($conn,$_POST['login']);
            $pass=mysqli_real_escape_string($conn,$_POST['password']);
            $fetch=mysqli_query("SELECT id FROM admins 
                                WHERE username='$user'")or die(mysqli_error());
            $count=mysqli_num_rows($fetch);
            if($count!="") {
                mysqli_query($conn,"UPDATE admins 
                             SET password = '$pass'
                             WHERE username = '$user' ")or die(mysqli_error());

                $user_msg = 'Password Changed Successfully for \\'.$user.'\\';
                header('location: admin.php?msg='.$user_msg.'');
            }
            else
            {
                $user_msg = 'Wrong Username or Password!';
                header('location: admin.php?msg='.$user_msg.'');
            }
        }
    }else{
        $user_msg = 'Sorry, but Something went wrong';
        header('location: admin.php?msg='.$user_msg.'');
    }
?>

