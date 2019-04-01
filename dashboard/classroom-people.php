
<style type="text/css">
	#people_h2{
		border-bottom: 1px solid #1e8e3e;
		color: #137333;
	}
	.people_table {

	}
	.people_table tr{
		height: 6rem;
	}
	.people_table td{
		padding: .8rem;
	}
	.people_table img{
		border-radius: 50%;
	}
</style>
<?php 
if (isset($_REQUEST['classID'])) {
	$req_classID = $_REQUEST['classID'];

	$query = mysqli_query($conn,"SELECT rid.*,rs.suffix,ua.user_img FROM `class_room` `clr`
INNER JOIN user_accounts ua ON ua.user_ID = clr.user_ID
INNER JOIN record_instructor_detail rid ON ua.user_Name = rid.rid_EmpID
INNER JOIN ref_suffixname rs ON rid.suffix_ID = rs.suffix_ID
WHERE `class_ID` = $req_classID");
               
                 
    if (mysqli_num_rows($query) > 0) {
        // output data of each row

       while($classroom = mysqli_fetch_assoc($query)) {
       		
       		if (!empty($row['user_img'])) {
			 $rid_img = 'data:image/jpeg;base64,'.base64_encode($row['user_img']);
			}
			else{
			  $rid_img = "../assets/images/user.png";
			}
            $rid_FName = $classroom['rid_FName'];
            $rid_MName = $classroom['rid_MName'];
            $rid_LName = $classroom['rid_LName'];
            $rid_suffix = $classroom['suffix'];
            $teacher_name =  $rid_FName.' '. $rid_MName.' '. $rid_LName.' '. $rid_suffix;
        }
    }
}
?>
<div id="people_h2">
	<h2>Teacher</h2>
</div>
<table class="people_table">
	<tr>
		<td>
			<div>
					<span><img class="img" aria-hidden="true" src="<?php echo $rid_img?>" width="32" height="32"></span>
				<span><?php echo $teacher_name?></span>
			</div>
		</td>
	</tr>
</table>
<div id="people_h2">
	<h2>Student</h2>
</div>
<table class="people_table">
	<?php 
		$queryx = mysqli_query($conn,"SELECT `cs`.classStudent_ID,`rsd`.*,`rsn`.suffix,`rs`.sex_Name,`ua`.user_img FROM `class_student` `cs`
			INNER JOIN `user_accounts` `ua` ON `cs`.user_ID = `ua`.user_ID
			INNER JOIN `record_student_details` `rsd` ON `ua`.`user_Name` = `rsd`.`rsd_StudNum`
			INNER JOIN `ref_sex` `rs` ON rs.sex_ID = `rsd`.`rsd_Sex`
			INNER JOIN `ref_suffixname` `rsn` ON `rsd`.suffix_ID = `rsn`.suffix_ID
			WHERE `cs`.`class_ID` = '$req_classID'");
               
                 
    if (mysqli_num_rows($queryx) > 0) {
        // output data of each row

       while($classroom = mysqli_fetch_assoc($queryx)) {

       	    if (!empty($row['user_img'])) {
			 $rsd_img = 'data:image/jpeg;base64,'.base64_encode($row['user_img']);
			}
			else{
			  $rsd_img = "../assets/images/user.png";
			}
            $classStudent_ID = $classroom['classStudent_ID'];
            $rsd_user_ID = $classroom['user_ID'];
            $rsd_FName = $classroom['rsd_FName'];
            $rsd_MName = $classroom['rsd_MName'];
            $rsd_LName = $classroom['rsd_LName'];
            $rsd_suffix = $classroom['suffix'];
            $student_name =  $rsd_FName.' '. $rsd_MName.' '. $rsd_LName.' '. $rsd_suffix;

            ?>
		<tr>
			<td>
				<div>
					<span><img class="img" aria-hidden="true" src="<?php echo $rsd_img?>" width="32" height="32"></span>
					
					
					<span><?php echo $student_name?></span>
					<?php 
					if ($login_level == 1) {
						# code...
					}
					else{
						$sql = "SELECT * FROM `class_student` WHERE user_ID = '$rsd_user_ID' AND class_ID = '$req_classID' AND join_Stat = 0";
						$query = mysqli_query($conn,$sql);
						if (mysqli_num_rows($query) > 0) {
							?>
							<div style=" position: absolute;right: 150px;"><button class="btn btn-warning" id="uc_<?php echo $classStudent_ID?>" onclick="userclassDisable(<?php echo $classStudent_ID?>)">Disable</button></div>
							<?php
						}
						else{?>
							<div style=" position: absolute;right: 150px;"><button class="btn btn-success" id="uc_<?php echo $classStudent_ID?>"  onclick="userclassEnable(<?php echo $classStudent_ID?>)" >Enable</button></div>
							<?php

						}
					}
					
					?>
					
				</div>
			</td>
		</tr>
         <?php
        }
    }
	?>

</table>

<span>Invite students or give them the class code: <?php echo $_REQUEST['code'];?></span>