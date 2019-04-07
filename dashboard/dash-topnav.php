 <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">CvSU E-learning for Information Management</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php 
                    // include("dash-notification.php");
                    ?>
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <div class="demo-google-material-icon"><i class="material-icons">person_pin</i></div>
                        </a>
                        <ul class="dropdown-menu"  style=" margin-top: 1px !important; ">
                            <li class="header">Account</li>
                             <li class="header"><a href="profile"><i class="material-icons">details</i>Profile</a></li>
                            <li class="header"><a href="../logout.php"> <i class="material-icons">power_settings_new</i>Logout</a></li>
                            
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

   