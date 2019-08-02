<?php 

include('../dbconfig.php');


$id = isset($_GET['id'])? $_GET['id'] : "";
$ccode = isset($_GET['ccode'])? $_GET['ccode'] : "";
$sql = "SELECT * FROM `class_material` cm
			INNER JOIN class_room cr ON cr.class_ID = cm.class_ID where cr.class_Code = '$ccode' and cm.material_ID = '$id' LIMIT 1";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

header("Content-Type:".$row['material_MIME']);
header('Content-disposition: filename="'.$row['material_Filename'].'"');
echo $row['material_Data'];
?>
