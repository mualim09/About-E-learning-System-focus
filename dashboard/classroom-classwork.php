
  <?php 

  if ($login_level == 2) {
?>
  <div class="dropdown">
    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create
  <span class="caret"></span></button>
  <ul class="dropdown-menu" style=" margin-top: 1px !important; ">
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block"  data-toggle="modal" data-target="#CreateAssignmentInClass">Assignment</a></li>
    <!-- <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block" onclick="alert(<?php echo $_REQUEST['classID'];?>)">Quiz Assignment</a></li> -->
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block" data-toggle="modal" data-target="#CreateQuestionInClass">Question</a></li>
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block" data-toggle="modal" data-target="#CreateMaterialInClass">Material</a></li>
   <!--  <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block">Reuse post</a></li> -->
    <li class="divider"></li>
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block" data-toggle="modal" data-target="#CreateTopicInClass">Topic</a></li>
  </ul>
</div>
<?php
  }
  ?>
<?php 
$req_classID = $_REQUEST['classID'];


$sql = "SELECT * FROM `class_assignment` WHERE  class_ID = ".$req_classID." AND classTopic_ID is  NULL OR  classTopic_ID  = 0";

$assignments = mysqli_query($conn,$sql);
if (mysqli_num_rows($assignments) > 0) 
{
  ?>
  <table class="table">
    <tbody>
      <?php 
       while($assignment = mysqli_fetch_assoc($assignments)) 
      {
         $classassignment_Title = $assignment["classassignment_Title"];
         $classassignment_Instruction = $assignment["classassignment_Instruction"];
         $classassignment_Points = $assignment["classassignment_Points"];
         $classassignment_Duedate = $assignment["classassignment_Duedate"];

        ?>
        <tr>
          <td>
            <div class="panel panel-default" style="padding: 15px;">
            
              <div><i class="material-icons">account_box</i></div>
              <div style="margin-left: 50px; margin-top: -35px;">
                <div><?php echo $classassignment_Title ?></div>
                <div><?php echo  strftime("%b %e,%a %Y  at (%I:%M %p)", strtotime($classassignment_Duedate))?></div>
              </div>

            </div>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  <?php

}
else{

}

$sql = "SELECT * FROM `class_topic` WHERE `class_ID` = $req_classID";
$topics = mysqli_query($conn,$sql);
if (mysqli_num_rows($topics) > 0) 
{
    // output data of each row
    $x = 0;
    while($topic = mysqli_fetch_assoc($topics)) 
    {
      $classTopic_ID = $topic['classTopic_ID'];
      $classTopic_Name = strtoupper($topic['classTopic_Name']);
      ?>
      <h3><?php echo $classTopic_Name ?></h3>
      <?php 
        $sql = "SELECT * FROM `class_topic` WHERE `classTopic_ID` = $classTopic_ID AND class_ID =$req_classID ";
      ?>
      <hr>
      <?php
      
    
    }
}
else
{
  ?>
  <h2>Assign work to your class here</h2>

  Create assignments and questions
  <br>
  Use topics to organize classwork into modules or units
  <br>
  Order work the way you want students to see it
  <?php
}
?>