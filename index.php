<?php
/**
 * @package    DEVELOPMENT OF AN E-LEARNING SYSTEM FOR INFORMATION MANAGEMENT FOR CAVITE STATE UNIVERSITY
 *
 * @copyright  Copyright (C) 2019, All rights reserved.
 * @license    MIT License version or later; see licensing/LICENSE.txt
 *  ᜍ᜔ᜑᜎ᜔ᜉ᜔ ᜇᜍ᜔ᜍᜒᜈ᜔ ᜍ᜔. cᜀᜊ᜔ᜍᜒᜍ 
 *  ᜉcᜁᜊᜓᜂᜃ᜔.cᜂᜋ᜔:ᜑ᜔ᜆ᜔ᜆ᜔ᜉ᜔ᜐ᜔://ᜏ᜔ᜏ᜔ᜏ᜔.ᜉcᜁᜊᜓᜂᜃ᜔.cᜂᜋ᜔/ᜍ᜔ᜑᜎ᜔ᜉ᜔10
 */

session_start();
isset($_SESSION['login_user']) ?header('location: dashboard'):"";
?>
<!DOCTYPE html>
<html>
<?php 
include("inc/main-head.php");
?>

<body class="login-page">
    <div class="login-box" style="background-color: #408c40;">
        <div class="text-center logo" >
            <div style="height: 5px;"></div>
            <h3 style="margin-top: 25px; color: white;">Login</h3>
        </div>
        <div class="card">
            <div class="body">
                <div id="sign_in" >
                    <div class="text-center msg">
                        
                        <img src="assets/images/logo.png" alt="CvSU Logo" style="width: 100px;">
                        <h5>Cavite State Univeristy</h5>
                        <h3>E-Learning System</h3>
                        <small>Login here using your username and password</small>
                    </div>
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#student">Student</a></li>
                      <li><a data-toggle="tab" href="#instructor">Instructor</a></li>
                      <li><a data-toggle="tab" href="#admin">Admin</a></li>
                    </ul>

                    <div class="tab-content">
                      <div id="student" class="tab-pane fade in active">
                        <form action="data-login.php" method="POST"  role="form">
                            
                       
                         <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Student Number" required autofocus onkeyup="numberInputOnly(this);">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit_student">SIGN IN</button>
                            </div>
                            <div class="col-xs-6">
                                <button class="btn btn-block bg-pink waves-effect"  data-toggle="tab" href="#reg-student">REGISTER</button>
                            </div>
                        </div>
                         </form>
                      </div>

                      <div id="instructor" class="tab-pane fade">
                        <form action="data-login.php" method="POST"  role="form">
                            
                        
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Instructor ID" required autofocus onkeyup="numberInputOnly(this);">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit_instructor">SIGN IN</button>
                            </div>
                        </div>
                        </form>
                      </div>
                     <!--  //admin -->
                      <div id="admin" class="tab-pane fade">
                        <form action="data-login.php" method="POST"  role="form">
                         <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit_admin">SIGN IN</button>
                            </div>
                        </div>
                        </form>
                      </div>
                      <div id="reg-student" class="tab-pane fade">
                        <form action="data-login.php" method="POST"  role="form">
                         <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Student Number" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">mail</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="email" placeholder="email@domain.com" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-6">
                                <button class="btn btn-block bg-pink waves-effect"  data-toggle="tab" href="#student">SIGN IN</button>
                            </div>
                            <div class="col-xs-6">
                                <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit_regstudent">REGISTER</button>
                            </div>
                        </div>
                        </form>
                      </div>
                     <!--  //admin -->
                    </div>
                  
                    
                </div>
            </div>
        </div>
    </div>

    <?php
    include("inc/main-js.php");
    ?>
    <script type="text/javascript">
          //NUMBER ONLY
  function numberInputOnly(elem) {
                var validChars = /[0-9]/;
                var strIn = elem.value;
                var strOut = '';
                for(var i=0; i < strIn.length; i++) {
                  strOut += (validChars.test(strIn.charAt(i)))? strIn.charAt(i) : '';
                }
                elem.value = strOut;
            }
    </script>
</body>

</html>