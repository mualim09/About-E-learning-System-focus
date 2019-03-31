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
            //   echo '<pre>';
            // var_dump($_SESSION);
            // echo '</pre>';
            ?>
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
            <form class="form-horizontal" action="data-action.php" method="POST"  enctype="multipart/form-data">
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
                 <button type="submit" class="btn btn-link waves-effect"  name="submit_createclass" value="submit_createclass">Create</button>
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

  

 </script>
</html>
