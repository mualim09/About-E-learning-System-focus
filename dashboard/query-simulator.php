 <?php 
    include('../session.php');
    include('dash-global-function.php');

   
    $pagename = "Query Simulator";
    $username = $_SESSION['user_Name'];
    $script_for_specific_page = "index";
    $user_img = "../assets/images/user.png";
    $user_email = "mail@gmail.com";
    if(isset($_SESSION['login_level']) )
    {      
        $login_level = $_SESSION['login_level'];
        if ($login_level != 3) {
         
          header('location: error404.php');
        }
         
    }

    if (empty($_REQUEST['page'])) {
        $page = "";
    }
    else{
        $page = $_REQUEST['page'];
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
                <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
            </ol>

            
               <div class="col-sm-12 sql_simulator">
                <iframe src="http://sqlfiddle.com/" style=" display:block;width:100%; height: 650px;"  frameBorder="0" ></iframe>
               </div>

            </div>
        </div>
    </section>

    <?php 
        include("dash-js.php");
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
    $('.id_22').click(function(){
        $('#message').load('table.php');
        $(".nano").nanoScroller();
    });
    // $(".set").css('display', 'none');
    // $("#sql_simulator").contents().find(".set .th").css('background-color', 'green');
});

    </script>
</body>

</html>
