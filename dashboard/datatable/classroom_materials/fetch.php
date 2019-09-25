<?php
require_once('../class.function.php');
$account = new DTFunction();  		 // Create new connection by passing in your configuration array


$query = '';
$output = array();
$query .= "SELECT *";
$query .= "FROM `class_room_attachment` ";

if (isset($_REQUEST['class_ID'])) {
	$class_ID = $_REQUEST['class_ID'];
 	$query .= '  WHERE class_ID = '.$class_ID.' AND';
}
else{
	 $query .= ' WHERE';
}
if(isset($_POST["search"]["value"]))
{
 $query .= '(attachment_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR attachment_Name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR attachment_MIME LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR attachment_Date LIKE "%'.$_POST["search"]["value"].'%" )';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY attachment_ID DESC ';
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
	
     $attachment_Name = json_decode($row["attachment_Name"]);

	$sub_array = array();
	$sub_array[] = $row["attachment_ID"];
	$sub_array[] = $attachment_Name[0];
	$sub_array[] = $row["attachment_MIME"];
	$dl = 'href="data:'.$row["attachment_MIME"].';base64,'.base64_encode($row['attachment_Data']).'"';
	$sub_array[] = '
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item "  '.$dl.' download="">Download</a>
     <div class="dropdown-divider"></div>
    <a class="dropdown-item delete_material" id="'.$row["attachment_ID"].'">Delete</a>
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



        
