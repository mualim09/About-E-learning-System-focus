 <?php 
    include('../session.php');
    include('dash-global-function.php');

   
    $pagename = "Dashboard";
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
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <ol class="breadcrumb breadcrumb-bg-green">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                            </ol>

            <?php
           $sql = "SELECT * FROM `class_student` `cls`
                    INNER JOIN `class_room` `clr`  ON `cls`.`class_ID` = `clr`.`class_ID`  WHERE `cls`.user_ID =  $user_id AND join_Stat = 1";
            $query = mysqli_query($conn, $sql);
            $count_c_a = mysqli_num_rows($query);
            $sql = "SELECT * FROM `record_instructor_detail`";
            $query = mysqli_query($conn, $sql);
            $count_tc_a = mysqli_num_rows($query);
            $sql = "SELECT * FROM `record_student_details`";
            $query = mysqli_query($conn, $sql);
            $count_std_a = mysqli_num_rows($query);
             if ($login_level == 1) {

            ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">NUMBER OF STUDENT</div>
                      <div class="panel-body"><h3><?php echo $count_std_a?></h3></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">NUMBER OF TEACHER</div>
                      <div class="panel-body"><h3><?php echo $count_tc_a?></h3></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">CLASSROOM ACTIVE</div>
                      <div class="panel-body"><h3><?php echo $count_c_a?></h3></div>
                    </div>
                </div>
            </div>
            <?php
                }
            if ($login_level == 2) {

            ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">NUMBER OF STUDENT</div>
                      <div class="panel-body"><h3><?php echo $count_std_a?></h3></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">NUMBER OF TEACHER</div>
                      <div class="panel-body"><h3><?php echo $count_tc_a?></h3></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">CLASSROOM ACTIVE</div>
                      <div class="panel-body"><h3><?php echo $count_c_a?></h3></div>
                    </div>
                </div>
            </div>
            <?php
                }
             ?>
        </div>
    </section>

    <?php 
        include("dash-js.php");
    ?>
</body>

</html>
