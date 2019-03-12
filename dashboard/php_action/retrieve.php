<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT ua.user_ID,ul.level_name,ua.user_Name,ua.user_status FROM `user_accounts` ua
LEFT JOIN user_level ul ON ua.level_ID = ul.level_ID";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$user_status = '';
	if($row['user_status'] == 1) {
		$user_status = '<label class="label label-success">Active</label>';
	} 
	else if($row['user_status'] == 0) {
		$user_status = '<label class="label label-warning">Deactive</label>';
	} 
	else {
		$user_status = '<label class="label label-danger">Ban</label>'; 
	}

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['user_ID'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['user_ID'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
	  </ul>
	</div>
		';

	$output['data'][] = array(
		// $x,
		$row['user_ID'],
		$row['level_name'],
		$row['user_Name'],
		$user_status,
		$actionButton
	);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);