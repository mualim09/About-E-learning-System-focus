<!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $user_img?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username?></div>
                    <div class="email"><?php echo $user_email?></div>
                    
                </div>
            </div>
            <!-- #User Info -->
    <!--         <div class="panel-group full-body" id="accordion_6" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-success">
                            <div class="panel-heading" role="tab" id="headingOne_6">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion_6" href="#collapseOne_6" aria-expanded="false" aria-controls="collapseOne_6" class="collapsed">
                                        Account 
                                        <i class="pull-right material-icons" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne_6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_6" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body " style="padding: 0px;">
                                <style type="text/css">
                                    ul.acc li.list-group-item:hover{
                                        
                                        background-color: green;
                                        color: white;
                                        text-decoration: none;

                                    }
                                    ul.acc li.list-group-item a:hover{
                                        color: white;
                                        text-decoration: none;
                                    }

                                </style>
                                 <ul class="acc list-group " style="color: black; list-style-type: none;">

                                    <li class="list-group-item">
                                            <a href="profile.php" class="toggled waves-effect waves-block">
                                                <i class="material-icons">settings</i>
                                                <span>Profile</span>
                                            </a>
                                    </li>
                                    <li class="list-group-item">
                                            <a href="../logout.php" class="toggled waves-effect waves-block">
                                                <i class="material-icons">power_settings_new</i>
                                                <span>Logout</span>
                                            </a>
                                    </li>
                                 </ul>
                                 
                                </div>
                            </div>
                        </div>
                    </div> -->
            <!-- Menu -->
            <div class="menu">
                 
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li
                    <?php if ($pagename == "Dashboard"): ?>
                        class="active"
                    <?php else: ?>
                        
                    <?php endif ?>
                    
                    >
                        <a href="index">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li
                    <?php if ($pagename == "Account Management"): ?>
                        class="active"
                    <?php else: ?>
                        
                    <?php endif ?>
                    >
                        <a href="account">
                            <i class="material-icons">account_box</i>
                            <span>Account</span>
                        </a>
                    </li>
                    <li
                    <?php if ($pagename == "Classroom"): ?>
                        class="active"
                    <?php else: ?>
                        
                    <?php endif ?>
                    
                    >
                        <a href="classroom">
                            <i class="material-icons">class</i>
                            <span>Classroom</span>
                        </a>
                    </li>
                      <li
                    <?php if ($pagename == "Reports"): ?>
                        class="active"
                    <?php else: ?>
                        
                    <?php endif ?>
                     >
                         <a href="classroom">
                            <i class="material-icons">save</i>
                            <span>Query Simulator</span>
                        </a>
                    </li>
                     <li
                    <?php if ($pagename == "Reports"): ?>
                        class="active"
                    <?php else: ?>
                        
                    <?php endif ?>
                     >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">collections_bookmark</i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../assets/" class=" waves-effect waves-block" target="_BLANK">List of student</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                     &copy; <?php auto_copyright("2019"); ?> <a href="javascript:void(0);">E-learning</a>
                </div>
                <!-- <div class="version">
                    <b>Version: </b> 1.0.5
                </div> -->
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->