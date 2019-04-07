<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#CreatePostInClass"><i class="material-icons">add</i> Create Post</button>
                            
<br>
<hr>
<?PHP 
$req_classID = $_REQUEST['classID'];
$sql = 'SELECT (IF(ua.level_ID = 1, 
    (
        SELECT CONCAT(rsd.rsd_FName," ",rsd.rsd_MName," ",rsd.rsd_LName," ",(SELECT IF(`rsn`.suffix = "N/A", "", `rsn`.suffix))) 
        FROM 
        `record_student_details` `rsd` 
        INNER JOIN `ref_suffixname` `rsn` ON `rsd`.suffix_ID = `rsn`.suffix_ID
        WHERE `ua`.`user_Name` = `rsd`.`rsd_StudNum` 
    ),
    (
        SELECT CONCAT(rid.rid_FName," ",rid.rid_MName," ",rid.rid_LName," ",(SELECT IF(`rsn`.suffix = "N/A", "", `rsn`.suffix)))
         FROM `record_instructor_detail` `rid` 
         INNER JOIN `ref_suffixname` `rsn` ON `rid`.suffix_ID = `rsn`.suffix_ID
         WHERE `ua`.`user_Name` = `rid`.`rid_EmpID` 
    )
    ))  as `Name_of_user_who_post`,`cp`.* FROM `class_post` `cp`
    INNER JOIN `user_accounts` `ua` ON `cp`.user_ID = `ua`.user_ID  
    WHERE `cp`.class_ID = '.$req_classID.'
    ORDER BY `cp`.`classPost_Date` DESC';
    $query = mysqli_query($conn,$sql);
    if (mysqli_num_rows($query) > 0) {
        // output data of each row

       while($classStream = mysqli_fetch_assoc($query)) {
           
          $classPost_ID = $classStream['classPost_ID'];
          $classStream_Name = $classStream['Name_of_user_who_post'];

          $classStream_postName = $classStream['classPost_Name'];
          $classStream_Content = $classStream['classPost_Description'];
          $classStream_Date = $classStream['classPost_Date'];
          if (empty($classStream_postName)) {
              $classStream_Title = $classStream_postName;
          }
          else{
              $classStream_Title = $classStream_postName." Posted By ";
          }
       ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <?php 
    echo $classStream_Title.$classStream_Name."<br>";
    echo strftime("%b %e,%a %Y  at (%I:%M %p)", strtotime($classStream_Date));
    
    ?>
    </div>
  <div class="panel-body">
    <?php echo $classStream_Content;?>

  </div>
  <div class="panel-footer" style="border:solid 1px #d9edf7;" onclick="showComment(<?php echo $classPost_ID;?>);this.onclick=null;" id="post_comment_<?php echo $classPost_ID;?>">
      Add Comment
  </div>
</div>
        <?php
        }
    }
?>


