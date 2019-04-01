 <?php 
    include('../session.php');
    include('dash-global-function.php');

   
    $pagename = "Profile";
    $username = $_SESSION['login_user'];
    $user_id = $_SESSION['login_id'];
    $user_img = $_SESSION['user_img'];
    $user_email = $_SESSION['user_Email'];
    $script_for_specific_page = "index";
    if(isset($_SESSION['login_level']) )
    {      
    echo $login_level = $_SESSION['login_level'];
       
         
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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?php echo $user_img?>" alt="" width="145" height="145"/>
                            </div>
                            <div class="content-area">
                                <h3><?php echo $username?></h3>
                                <a  href="#" data-toggle="modal" data-target="#changeprofile" class="btn btn-primary">EDIT</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"  class="active"><a href="#profile" aria-controls="settings" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content ">
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile">
                                        <form class="form-horizontal" action="#" method="POST" id="changeemail_form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Username</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="NameSurname" placeholder="Name Surname" value="<?php echo $username?>" disabled="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user_email?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" action="#" method="POST" id="changepass_form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="oldpassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="newpassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="newpasswordconfirm" name="newpasswordconfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
        include("dash-js.php");
    ?>

<script type="text/javascript">
        function readURL(input) {
        
           if (input.files && input.files[0]) {
             var reader = new FileReader();
         
             reader.onload = function(e) {
               $('#c_img').attr('src', e.target.result);
               $('#r_img').attr('src', e.target.result);
         
             }
         
             reader.readAsDataURL(input.files[0]);
           }
         }
         
         $("#profileimg").change(function() {
           readURL(this);
         });
           $(document).on('submit', '#changepass_form', function(event){
              event.preventDefault();
                  
                var oldpassword = $('#oldpassword').val();
                var newpassword = $('#newpassword').val();
                var newpasswordconfirm = $('#newpasswordconfirm').val();
                      $.ajax({
                        url:"update_profile_pass.php",
                        type:'POST',
                        data:new FormData(this),
                        cache: false,
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                          alert(data);
                          
                        }
                      }); 
              
            });
           
            $(document).on('submit', '#changeprofile_form', function(event){
              event.preventDefault();
                    var profileimg = '';
                    if( document.getElementById("profileimg").files.length == 0 ){
                  console.log("no files selected");
              }
              else{
                profileimg = $('#update_profile').val();

              }
                      $.ajax({
                        url:"update_profile_img.php",
                        type:'POST',
                        data:new FormData(this),
                        cache: false,
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                          alert(data);

                        }
                      }); 
              
            });
               $(document).on('submit', '#changeemail_form', function(event){
              event.preventDefault();
              var email = $('#email').val();

               $.ajax({
                 url:"update_profile_email.php",
                 type:'POST',
                 data:new FormData(this),
                 cache: false,
                 contentType:false,
                 processData:false,
                 success:function(data)
                 {
                   alert(data);
                 }
               }); 
              
            });
</script>
</body>

</html>
