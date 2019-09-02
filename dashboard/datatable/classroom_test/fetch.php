<?php
require_once('../class.function.php');
$account = new DTFunction();  		 // Create new connection by passing in your configuration array



$query = '';
$output = array();
$query .= "SELECT `crq`.*,`rs`.`status_Name`,`rtt`.`tstt_Name`";
$query .= " FROM `class_room_test`  `crq`
LEFT JOIN `ref_status`  `rs` ON `rs`.`status_ID` = `crq`.`status_ID`
LEFT JOIN `ref_test_type`  `rtt` ON `rtt`.`tstt_ID` = `crq`.`tstt_ID`";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE test_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR class_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR test_Name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR test_Added LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR test_Expired LIKE "%'.$_POST["search"]["value"].'%" ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY test_ID DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $account->runQuery($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	if($row["status_Name"] == "Enable"){
		$span = "<div class='btn btn-sm btn-success' style='min-width:65px;'>".$row["status_Name"]."</div>";
	}
	else{
		$span = "<div class='btn btn-sm btn-danger' style='min-width:65;'>".$row["status_Name"]."</div>";

	}
	$sub_array = array();
	$sub_array[] = $row["test_ID"];
	// $sub_array[] = $row["class_ID"];
	$sub_array[] = $row["test_Name"];
	$sub_array[] = $row["tstt_Name"];
	$sub_array[] = $row["test_Added"];
	$sub_array[] = $row["test_Expired"];
	if($row["test_Timer"] > 1){
		$m = " Mins";
	}
	else{
		$m = " Min";
	}
	$sub_array[] = $row["test_Timer"].$m;
	$sub_array[] = $span;

		$sub_array[] = '
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item view"  id="'.$row["test_ID"].'">View</a>
    <a class="dropdown-item edit"  id="'.$row["test_ID"].'">Edit</a>
     <div class="dropdown-divider"></div>
    <a class="dropdown-item delete" id="'.$row["test_ID"].'">Delete</a>
  </div>
</div>';
	$data[] = $sub_array;
}

$q = "SELECT * FROM `class_room_test`";
$filtered_rec = $account->get_total_all_records($q);

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$filtered_rec,
	"data"				=>	$data
);
echo json_encode($output);



?>



        
