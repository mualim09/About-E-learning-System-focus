<style type="text/css">
            .thover:hover{
              border:2px solid; 
              box-shadow: 5px 10px #888888;
            }
          </style>
  <?php 

  if ($login_level == 2) {
?>
<div style="width:150px;">
    <div class="dropdown" >
    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create
  <span class="caret"></span></button>
  <ul class="dropdown-menu" style=" margin-top: 1px !important; ">
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block add_assign"  data-toggle="modal" data-target="#CreateAssignmentInClass">Assignment</a></li>
    <!-- <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block" onclick="alert(<?php echo $_REQUEST['classID'];?>)">Quiz Assignment</a></li> -->
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block add_ques" data-toggle="modal" data-target="#CreateQuestionInClass">Question</a></li>
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block add_material" data-toggle="modal" data-target="#CreateMaterialInClass">Material</a></li>
   <!--  <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block">Reuse post</a></li> -->
    <li class="divider"></li>
    <li><a href="#"  href="javascript:void(0);" class=" waves-effect waves-block add_topic" data-toggle="modal" data-target="#CreateTopicInClass">Topic</a></li>
    
  </ul>
</div>
</div>
<?php
  }
  ?>

<?php if ($login_level == 2) {echo "<br>";} else{echo "<br><br>";}?>

<a  href="javascript:void(0);" class="btn btn-info pull-right " onclick="materials_m()" style="margin-top: -50px; z-index: 1000;">Class Material</a>
<?php 
$req_classID = $_REQUEST['classID'];


$sql = "SELECT * FROM `class_assignment` WHERE  class_ID = ".$req_classID." AND classTopic_ID is  NULL OR  classTopic_ID  = 0";

$assignments = mysqli_query($conn,$sql);
if (mysqli_num_rows($assignments) > 0) 
{
  ?>
  <br>
  <table class="table thover">
    <tbody>
      <?php 
       while($assignment = mysqli_fetch_assoc($assignments)) 
      {
        $classassignment_ID = $assignment["classassignment_ID"];
         $classassignment_Title = $assignment["classassignment_Title"];
         $classassignment_Instruction = $assignment["classassignment_Instruction"];
         $classassignment_Points = $assignment["classassignment_Points"];
         $classassignment_Duedate = $assignment["classassignment_Duedate"];
         $classassignment_Post = $assignment["classassignment_Post"];
         

        ?>
        <tr>
          <td>
            <?php   if ($login_level == 2) {?>
           <div class="header" style="margin-bottom: -30px;border-bottom: 0px solid ;
">
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block" onclick="assignment_edit(<?php echo $classassignment_ID?>)">Update</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block" onclick="assignment_delete(<?php echo $classassignment_ID?>)">Delete</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div> 
            <?php }?>

               <div class="panel panel-default" style="padding: 15px;">
                     <div class="panel-heading"></div>
                     <div class="panel-body">
                         <div><i class="material-icons">account_box</i></div>
                      <div style="margin-left: 50px; margin-top: -35px;">
                        <div><?php echo $classassignment_Title ?></div>
                        <div><?php echo  strftime("%b %e,%a %Y  at (%I:%M %p)", strtotime($classassignment_Post))?></div>
                      </div>
                      
                     </div>
                     <div class="panel-footer" ><div class="btn btn-primary" onclick="assignment_view(<?php echo $classassignment_ID?>)">View</div></div>
     
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
   <?php   if ($login_level == 2) {?>
      <div class="pull-right dropdown" style="margin-top: -40px;">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#" onclick="topic_edit(<?php echo $classassignment_ID?>)">Update</a></li>
          <li><a href="#" onclick="topic_delete(<?php echo $classassignment_ID?>)">Delete</a></li>
        </ul>
      </div>
    
      <?php 
    }
        $sqlx = "SELECT * FROM `class_assignment` WHERE  class_ID = ".$req_classID." AND classTopic_ID  = $classTopic_ID";
        $assignments_z = mysqli_query($conn,$sqlx);
        if (mysqli_num_rows($assignments_z) > 0) 
        {
          ?>

          <table class="table thover">
            <tbody>
              <?php 
               while($assignmentx = mysqli_fetch_assoc($assignments_z)) 
              {
                 $classassignment_ID = $assignmentx["classassignment_ID"];
                 $subTitle = $assignmentx["classassignment_Title"];
                 $classassignmentz_Instruction = $assignmentx["classassignment_Instruction"];
                 $classassignmentz_Points = $assignmentx["classassignment_Points"];
                 $classassignmentz_Duedate = $assignmentx["classassignment_Duedate"];
                   $classassignment_Post = $assignmentx["classassignment_Post"];

                ?>
                <tr>
                  <td>
                     <?php   if ($login_level == 2) {?>
                    <div class="header" style="margin-bottom: -30px;border-bottom: 0px solid ;
">
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block" onclick="assignment_edit(<?php echo $classassignment_ID?>)">Update</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block" onclick="assignment_delete(<?php echo $classassignment_ID?>)">Delete</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div> 
                      <?php }?>
                    <div class="panel panel-default" style="padding: 15px;">
                     <div class="panel-heading"></div>
                     <div class="panel-body">
                         <div><i class="material-icons">account_box</i></div>
                      <div style="margin-left: 50px; margin-top: -35px;">
                        <div><?php echo $subTitle ?></div>
                        <div><?php echo  strftime("%b %e,%a %Y  at (%I:%M %p)", strtotime($classassignment_Post))?></div>
                      </div>
                      
                     </div>
                     <div class="panel-footer" ><div class="btn btn-primary" onclick="assignment_view(<?php echo $classassignment_ID?>)">View</div></div>
     
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