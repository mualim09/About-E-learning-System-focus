<?php
require_once('../class.function.php');
$account = new DTFunction();  		 // Create new connection by passing in your configuration array


$query = '';
$output = array();
$query .= "SELECT * ";
$query .= " FROM `record_student_details` `rsd`
LEFT JOIN `ref_sex` `rs` ON `rs`.`sex_ID` = `rsd`.`sex_ID`
LEFT JOIN `cvsu_course` `cc` ON `cc`.`course_ID` = `rsd`.`course_ID`
LEFT JOIN `ref_suffixname` `rsn` ON `rsn`.`suffix_ID` = `rsd`.`suffix_ID`

";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE rsd_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR rsd_StudNum LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR rsd_LName LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR rsd_FName LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR rsd_MName LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR suffix LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR course_Acronym LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR sex_Name LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= 'OR rsd_LName LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= 'OR suffix_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= 'OR sex_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= 'OR course_ID LIKE "%'.$_POST["search"]["value"].'%" ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY rsd_ID DESC ';
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
	
	if($row["suffix"] == "N/A")
	{
		$suffix = "";
	}
	else
	{
		$suffix = $row["suffix"];
	}
	if(!empty($row["user_ID"])){
		$span = "<div class='btn btn-sm btn-success' style='min-width:100px;'>Registered</div>";
	}
	else{
		$span = "<div class='btn btn-sm btn-danger' style='min-width:100px;'>Unregistered</div>";

	}
	$sub_array = array();
	$sub_array[] = $row["rsd_ID"];
	$sub_array[] = $row["rsd_StudNum"];
	$sub_array[] = $row["rsd_LName"].', '.$row["rsd_FName"].' '.$row["rsd_MName"].'. '.$suffix;
	$sub_array[] = $row["sex_Name"];
	$sub_array[] = $row["course_Acronym"];
	$sub_array[] = $span;

		$sub_array[] = '
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item view"  id="'.$row["rsd_ID"].'">View</a>
    <a class="dropdown-item edit"  id="'.$row["rsd_ID"].'">Edit</a>
     <div class="dropdown-divider"></div>
    <a class="dropdown-item delete" id="'.$row["rsd_ID"].'">Delete</a>
  </div>
</div>';
	$data[] = $sub_array;
}

$q = "SELECT * FROM `record_student_details`";
$filtered_rec = $account->get_total_all_records($q);

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$filtered_rec,
	"data"				=>	$data
);
echo json_encode($output);



?>



        
