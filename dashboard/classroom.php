 <?php 
    include('../session.php');
    include('dash-global-function.php');

   
    $pagename = "Classroom";
    $username = $_SESSION['user_Name'];
    $user_id = $_SESSION['login_id'];
    $user_img = $_SESSION['user_img'];
     $user_email = $_SESSION['user_Email'];
    $script_for_specific_page = "jquery";
    if(isset($_SESSION['login_level']) )
    {      
        $login_level = $_SESSION['login_level'];
        if ($login_level == 3) {
         
          header('location: error404.php');
        }
         
    }

  
?>

<!DOCTYPE html>
<html>
 <?php
    include("dash-head.php");
    ?>
<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <?php 
        include('dash-topnav.php');
    ?>
    <section>
        <?php 
        include("dash-sidenav-left.php");
        ?>

    </section>

    <section class="content">
        <div class="container-fluid">
            <?php 
            if (isset($_REQUEST['code'])) {
                include('classroom-code.php');
            }
            else{
                include('classroom-content.php');
            }

            ?>
        </div>
    </section>

    <?php 
        include("dash-js.php");
    ?>
</body>
<!-- Add Student In Classroom -->
            <div class="modal fade" id="AddStudentInClass" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Add Student In Classroom</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
<?php

if ($login_level == 1) {
  ?>
<!-- Join Classroom -->
<div class="modal fade" id="JoinClass" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Join Class</h4>
            </div>
            <form class="form-horizontal" action="data-action.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                   <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                          <label for="pass">Classcode</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" id="joinclasscode" name="joinclasscode" placeholder="Classroom Code">
                              </div>
                          </div>
                      </div>
                   </div>
                  <br> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect"  name="submit_joinclass" value="submit_joinclass">Join</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>

  <?php
}
 ?>

<!-- Create Post In Classroom -->
            <div class="modal fade" id="CreatePostInClass" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <h4 class="modal-title" id="defaultModalLabel">Create Post</h4>
                        </div>
                        <form action="data-action.php" method="POST">
                        <div class="modal-body">
                            <!-- CKEditor -->
                           <textarea id="ckeditor" name="newpost_content">
                          </textarea>
                          <input type="hidden" name="name" value="<?php echo $_REQUEST['name']?>">
                          <input type="hidden" name="code" value="<?php echo $_REQUEST['code']?>">
                          <input type="hidden" name="class_ID" value="<?php echo $_REQUEST['classID']?>">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" name="submit_postinClass" value="Post">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>            
<!-- Create Classroom -->
<div class="modal fade" id="CreateClass" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Create Class</h4>
            </div>
            <form class="form-horizontal" action="data-action.php" method="POST"  enctype="multipart/form-data" id="class_form">
            <div class="modal-body">
                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                          <label for="class_Name">Class Name</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" id="class_Name" name="class_Name" placeholder="Classroom Name">
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
                   <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                          <label for="class_Description">Description</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                          <div class="form-group">
                              <div class="form-line">
                                  <textarea class="form-control" id="class_Description" name="class_Description" placeholder="Classroom Description"></textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                          <label for="class_color">Color</label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                          <div class="form-group">
                              <div class="form-line">
                                   <select class="form-control" name="class_color" id="class_color" >
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">Red</option>
                                    <option value="2">Cyan</option>
                                    <option value="3">Green</option>
                                    <option value="4">Blue grey</option>
                                    <option value="5">Pink</option>
                                    <option value="6">Light blue</option>
                                    <option value="7">Light green</option>
                                    <option value="8">Amber</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div> 
            </div>
            <div class="modal-footer">
               <input type="hidden" name="class_ID" id="class_ID">
                 <button type="submit" class="btn btn-link waves-effect"  name="submit_createclass" value="submit_createclass" id="operation">Create</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>         
            </form>
        </div>
    </div>
</div>


<!-- Create Topic In Classroom -->
            <div class="modal fade" id="CreateTopicInClass" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <h4 class="modal-title" id="defaultModalLabel">Create Topic</h4>
                        </div>
                        <form action="data-action.php" method="POST" id="topic_form">
                        <div class="modal-body">
                          <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="class_color">Title</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                           <input type="text" class="form-control"  name="new_topic" value="" placeholder="Topic" id="create_topic">
                                      </div>
                                  </div>
                              </div>
                          </div> 
                          
                          <input type="hidden" name="name" value="<?php echo $_REQUEST['name']?>">
                          <input type="hidden" name="code" value="<?php echo $_REQUEST['code']?>">
                          <input type="hidden" name="class_ID" value="<?php echo $_REQUEST['classID']?>">
                         
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" name="submit_createTopic" value="Post">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>  

<!-- Create Assignment In Classroom -->
            <div class="modal fade " id="CreateAssignmentInClass" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-green">
                            <h4 class="modal-title" id="defaultModalLabel">Create Assignment</h4>
                        </div>
                        <form action="data-action.php" method="POST" id="topic_form">
                        <div class="modal-body">
                          <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="class_color">Topic</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                         <select class="form-control" name="classtopic" id="classtopic">
                                          <option value=""> - SELECT - </option>
                                           <?php 
                                           $sql = "SELECT * FROM `class_topic`
                                              WHERE class_ID = '".$_REQUEST['classID'] ."' 
                                              ";
                                            if ($query = mysqli_query($conn, $sql)) {

                                              while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <option value="<?php echo $row["classTopic_ID"]?>"><?php echo $row["classTopic_Name"]?></option>
                                                <?php
                                              }
                                            }
                                           ?>
                                         </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="class_color">Title</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" class="form-control"  name="assignment_title" value="" placeholder="Topic" id="assignment_title">
                                      </div>
                                  </div>
                              </div>
                          </div> 
                           
                          <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="class_color">Instruction</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                        <textarea class="form-control" name="assignment_descr" value="" placeholder="Assignment Instruction" id="assignment_descr"></textarea>
                                      </div>
                                  </div>
                              </div>
                          </div> 
                          <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="class_color">Points</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                           <input type="number" class="form-control"  name="assignment_points" value="" placeholder="Assignment Points" id="assignment_points">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                              <label for="class_color">Due Date</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                      <div class="form-line">
                                           <input type="datetime-local" class="form-control"  name="assignment_due" id="assignment_due">
                                      </div>
                                  </div>
                              </div>
                          </div>  
                          
                          
                          
                          <input type="hidden" name="name" value="<?php echo $_REQUEST['name']?>">
                          <input type="hidden" name="code" value="<?php echo $_REQUEST['code']?>">
                          <input type="hidden" name="class_ID" value="<?php echo $_REQUEST['classID']?>">
                         
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" name="submit_createAssignment" value="Post" id="assign_action">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>  
<!-- Create Assingment In Classroom -->
<div class="modal fade" id="CreateMaterialInClass" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <h4 class="modal-title" id="defaultModalLabel">Create Material</h4>
            </div>
            <form action="data-action.php" method="POST" id="topic_form">
            <div class="modal-body">
              <div class="row clearfix">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="class_color">Title</label>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                               <input type="text" class="form-control"  name="MaterialTitle" value="" placeholder="Topic" id="MaterialTitle">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row clearfix">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="class_color">Description</label>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                               <input type="text" class="form-control"  name="MaterialDescr" value="" placeholder="Topic" id="MaterialDescr">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row clearfix">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="class_color">Attachment</label>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                               <input type="file" class="form-control"  name="MaterialFile" value="" placeholder="Topic" id="MaterialFile">
                          </div>
                      </div>
                  </div>
              </div>
              
              
              
              <input type="hidden" name="name" value="<?php echo $_REQUEST['name']?>">
              <input type="hidden" name="code" value="<?php echo $_REQUEST['code']?>">
              <input type="hidden" name="class_ID" value="<?php echo $_REQUEST['classID']?>">
             
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-link waves-effect" name="submit_createMaterial" value="Submit">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>  

<!-- Create Assingment In Classroom -->
<div class="modal fade" id="CreateQuestionInClass" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <h4 class="modal-title" id="defaultModalLabel">Create Question</h4>
            </div>
            <form action="data-action.php" method="POST" id="topic_form">
            <div class="modal-body ">
              
              <input type="text" class="form-control"  name="new_topic" value="" placeholder="Topic" id="createQuestion">
              <input type="hidden" name="name" value="<?php echo $_REQUEST['name']?>">
              <input type="hidden" name="code" value="<?php echo $_REQUEST['code']?>">
              <input type="hidden" name="class_ID" value="<?php echo $_REQUEST['classID']?>">
             
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-link waves-effect" name="submit_createQuestion" value="Post">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>  
<!-- View Assingment In Classroom -->
<div class="modal fade" id="ViewAssignmentInClass" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <h4 class="modal-title" id="defaultModalLabel">View Assignment</h4>
            </div>
            <form action="data-action.php" method="POST" id="topic_form">
            <div class="modal-body assign_body">
              
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>  

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript">

 
  function reload($id){
    var classPost_ID = $id; 
    $("#post_comment_"+classPost_ID).load("comment.php", { 'classPost_ID': classPost_ID  });

  }

  function showComment($id){
    var classPost_ID = $id;
    
    $("#post_comment_"+classPost_ID).load("comment.php", { 'classPost_ID': classPost_ID  });

  }
  function userclassDisable($id){
    var classStudent_ID = $id;
     if(confirm("Are you sure you want disable this student for accessing this classroom?"))
        {
            $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{'action': 'classuserDisable' ,'classStudent_ID': classStudent_ID  },
              dataType:"html",
              success:function(data)
              {
               document.getElementById('uc_'+classStudent_ID).setAttribute('onclick','userclassEnable('+classStudent_ID+')');
               $('#uc_'+classStudent_ID).text('Enable');
              }
            }); 
        }
        else
        {
          return false; 
        }

  }
  function userclassEnable($id){
      var classStudent_ID = $id;
     if(confirm("Are you sure you want enable this student for accessing this classroom?"))
        {
            $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{'action': 'userclassEnable' ,'classStudent_ID': classStudent_ID  },
              dataType:"html",
              success:function(data)
              {
                document.getElementById('uc_'+classStudent_ID).setAttribute('onclick','userclassDisable('+classStudent_ID+')');
                $('#uc_'+classStudent_ID).text('Disable');
              }
            }); 
           
        }
        else
        {
          return false; 
        }

  }
  function addComment($id){
    var classPost_ID = $id;
    var comment = $("#comment_content"+classPost_ID).val();
   
     
    $.ajax({
      url:"data-action.php",
      type:"POST",
      data:{ 'classPost_ID': classPost_ID ,'comment': comment  },
      dataType:"html",
      success:function(data)
      {
        $("#post_comment_"+classPost_ID).load("comment.php", { 'classPost_ID': classPost_ID});
      }
    }); 

  }
       function disableClassroom($var) {
        var class_ID = $var;
        if(confirm("Are you sure you want to disable this classroom?"))
        {
           $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{submit_disableclass:class_ID},
              dataType:"html",
              success:function(data)
              {
              }
            });
           location.reload();
        }
        else
        {
          return false; 
        }

        }

       function enableClassroom($var) {
        var class_ID = $var;
         if(confirm("Are you sure you want to enable this classroom?"))
        {
           $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{submit_enableclass:class_ID},
              dataType:"html",
              success:function(data)
              {
              }
            });
           location.reload();
        }
        else
        {
          return false; 
        }

        }
       $(document).on('click', '.add', function () {
            document.getElementById("operation").setAttribute('name', 'submit_createclass');
            $('#operation').text("Create");
            $('#operation').val("submit_createclass");
            $('.modal-title').text("Create Class");
           document.getElementById('class_form').reset();
          
      });
        function editClassroom($var) {
        var class_ID = $var;
             if(confirm("Are you sure you want to edit this classroom?"))
        {

           $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{submit_editclass:class_ID},
              dataType:"json",
              success:function(data)
              {
                  $('#CreateClass').modal('show');
                   $('#class_Name').val(data.class_Name);
                   $('#class_Description').val(data.class_Description);
                   $('#class_color').val(data.class_color).change();
                   $('#operation').text("Update");
                   document.getElementById("operation").setAttribute('name', 'submit_upclass');
                   $('#operation').val("submit_upclass");
                   $('.modal-title').text("Edit Classroom Info");
                   $('#class_ID').val(class_ID);
              }
            });
         
        }
        else
        {
          return false; 
        }

        }
        function deleteClassroom($var) {
        var class_ID = $var;
             if(confirm("Are you sure you want to delete this classroom?"))
        {
           $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{submit_deleteclass:class_ID},
              dataType:"html",
              success:function(data)
              {
              }
            });
           location.reload();
        }
        else
        {
          return false; 
        }

        }
        // function classworkTopic($var){
        //  var class_ID = $var;
        //  $('#CreateTopicInClass').modal('show');
        // }
        // function classworkMaterial($var){
       
        //   var class_ID = $var;
        //   var title  =  $('#material_title').val();
        //   var Description  =  $('#material_description').val();
        //   var attachment  =  $('#material_attachment').val();
        // }
        //  function classworkQuizAssigment($var){
          
        //   var class_ID = $var;
        //   var Question = $var;
        //   var Instruction = $var;
        //   var Points = $var;
        //   var Duedate = $var;
        // }
        // function classworkAssignment($var){
        //   var class_ID = $var;
        //   var Question = $('#classassign_question').val();
        //   var Instruction = $('#classassign_instruction').val();
        //   var Points = $('#classassign_points').val();
        //   var Duedate = $('#classassign_duedate').val();

        // }
    
  $(document).on('click', '.add_assign', function () {
    $('.modal-title').text('Create Assignment');
        document.getElementById("assign_action").setAttribute('name', 'submit_createAssignment');

        $('#classtopic').val('');
        $('#assignment_title').val('');
        $('#assignment_descr').val('');
        $('#assignment_points').val('');
        $('#assignment_due').val('');
  });

  
  function  assignment_view($var){
    var assignment_ID = $var;
     $('#ViewAssignmentInClass').modal('show');

     $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{submit_viewassignment:assignment_ID},
              dataType:"html",
              success:function(data)
              {
                $('.modal-body.assign_body').html(data);
              }
            });
     
  }
      function assignment_edit($var) {
        var assignment_ID = $var;
        $('#CreateAssignmentInClass').modal('show');
        $('.modal-title').text('Edit Assignment');
        document.getElementById("assign_action").setAttribute('name', 'submit_edit_assignment');
        //      if(confirm("Are you sure you want to edit this assignment?"))
        // {
           $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{submit_updateassignment:assignment_ID},
              dataType:"json",
              success:function(data)
              {
                $('#classtopic').val(data.classTopic_ID).change();
                $('#assignment_title').val(data.classassignment_Title);
                $('#assignment_descr').val(data.classassignment_Instruction);
                $('#assignment_points').val(data.classassignment_Points);
                $('#assignment_due').val(data.classassignment_Duedate);
              }
            });
        //    location.reload();
        // }
        // else
        // {
        //   return false; 
        // }

        }
        function assignment_delete($var) {
        var assignment_ID = $var;
             if(confirm("Are you sure you want to delete this assignment?"))
        {
           $.ajax({
              url:"data-action.php",
              type:"POST",
              data:{submit_deleteassignment:assignment_ID},
              dataType:"html",
              success:function(data)
              {
                alert(data);
              }
            });
           location.reload();
          
        }
        else
        {
          return false; 
        }

        }
   
 </script>
</html>
