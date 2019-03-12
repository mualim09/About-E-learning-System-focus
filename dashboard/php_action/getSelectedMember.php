<?php 

require_once 'db_connect.php';

$user_ID = $_POST['user_ID'];

$sql = "SELECT ua.user_ID,ul.level_name,ua.user_Name,ua.user_status FROM `user_accounts` ua
LEFT JOIN user_level ul ON ua.level_ID = ul.level_ID WHERE ua.user_ID = $user_ID";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);

