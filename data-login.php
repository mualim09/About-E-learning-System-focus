<?php
/**
 * @package     DEVELOPMENT OF AN E-LEARNING SYSTEM FOR INFORMATION MANAGEMENT FOR CAVITE STATE UNIVERSITY
 *
 * @copyright  Copyright (C) 2019, All rights reserved.
 * @license    MIT License version or later; see licensing/LICENSE.txt
 */
session_start(); // Starting Session
// print_r($_POST);
include('data-md5.php');
$error=''; // Variable To Store Error Message
function success(){
		echo "<script>alert('Successfully login');
											window.location='index.php';
										</script>";
}
function successreg(){
		echo "<script>alert('Successfully Register');
											window.location='index.php';
										</script>";
}
function notallowed(){
		
	echo "<script>alert('You are not allowed to register');
											window.location='index.php';
										</script>";
}
function alreadyTaken(){
	echo "<script>alert('Account Already Taken');
											window.location='index.php';
										</script>";
}
function notmatch(){
	echo "<script>alert('Password Not match');
											window.location='index.php';
										</script>";
}
function error_Sql(){
	echo "<script>alert('Sql Error');
											window.location='index.php';
										</script>";
}
function error_credential(){
	echo "<script>alert('Wrong Username or Password!');
											window.location='index.php';
										</script>";
}
function failed(){
		echo "<script>alert('Failed');
											window.location='index.php';
										</script>";
}
if (isset($_POST['submit_student'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Student Number or Password is empty !');
										window.location='index.php';
									</script>";
			
			}
		else
		{
			$lvl = 1;
			login($lvl);
			
		}
}
if (isset($_POST['submit_instructor'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Username or Password is empty !');
					window.location='index.php';
				</script>";
				
			
			}
		
		else
		{
			$lvl = 2;
			login($lvl);
		}
}
if (isset($_POST['submit_admin'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Username or Password is empty !');
					window.location='index.php';
				</script>";
				
			
			}
		
		else
		{
			$lvl = 3;
			login($lvl);
		}
}

if (isset($_POST['submit_regstudent'])) {
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['cpassword'])) 
			{
				echo "<script>alert('Username or Password is empty !');
					window.location='index.php';
				</script>";
				
			
			}
			else{
				
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				if ($password  == $cpassword) {
					register();
				}
				else{
					echo "<script>alert('Password not match!');
					window.location='index.php';
				</script>";
				}
				
			}
		
		
}

function login($lvl){

			include('dbconfig.php');
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($conn,$username);
			$password = mysqli_real_escape_string($conn,$password);
			
			
 			$input = "$password";
			 $encrypted = encryptIt($input);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($conn,"SELECT * FROM `user_accounts` WHERE `user_Name` = '$username' AND `user_Pass` = '$encrypted' AND level_ID = $lvl AND `user_status` = 1");
			if (mysqli_num_rows($query) > 0) 
			{
				$rows = mysqli_fetch_assoc($query);
				// And error has occured while executing
			    if ($rows['level_ID']) 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: dashboard/"); //go to dashboard
					success();
				} 

			}
			else
			{
			 error_credential();
			}
			mysqli_close($conn); // Closing Connection
}

function register(){
	include('dbconfig.php');
	// Define $username and $password
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email = $_POST["email"];
	// To protect MySQL injection for Security purpose
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);
	$query = mysqli_query($conn,"SELECT * FROM `record_student_details` WHERE rsd_StudNum = '$username'");
	if (mysqli_num_rows($query) > 0) 
	{
		$query = mysqli_query($conn,"SELECT * FROM `user_accounts` WHERE `user_Name` = '$username'");
		if (mysqli_num_rows($query) > 0) 
		{
			alreadyTaken();
		}
		else{
			$input = "$password";
			$encrypted = encryptIt($input);
			echo $sql = "INSERT INTO `user_accounts` (`user_ID`, `level_ID`, `user_Name`, `user_Pass`, `user_Email`, `user_Registered`, `user_status`) VALUES (NULL, 1, '$username', '$encrypted', '$email', CURRENT_TIMESTAMP, 0);";
			
			
			if (mysqli_query($conn,$sql)) 
			{
				successreg();
			}
			else{
				failed();
			}
		}
	}
	else{
		notallowed();
	}

}


?>