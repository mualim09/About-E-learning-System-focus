<?php 

function side_dashboard(){
    ?>
    <li
      <?php if ($GLOBALS['pagename'] == "Dashboard"): ?>
          class="active"
      <?php else: ?>
          
      <?php endif ?>
      
      >
          <a href="index">
              <i class="material-icons">home</i>
              <span>Dashboard</span>
          </a>
      </li>
    <?php
}
function side_accoutMngt(){
    ?>
     <li
      <?php if ($GLOBALS['pagename'] == "Account Management"): ?>
          class="active"
      <?php else: ?>
          
      <?php endif ?>
      >
          <a href="manage-account">
              <i class="material-icons">account_box</i>
              <span>Account</span>
          </a>
      </li>
    <?php
}
function side_studentMngt(){
    ?>
    <li
     <?php if ($GLOBALS['pagename'] == "Student Management"): ?>
         class="active"
     <?php else: ?>
         
     <?php endif ?>
     >
         <a href="manage-student">
             <i class="material-icons">account_box</i>
             <span>Student Management</span>
         </a>
     </li>
    <?php
}
function side_instrucMngt(){
    ?>
    <li
     <?php if ($GLOBALS['pagename'] == "Instructor Management"): ?>
         class="active"
     <?php else: ?>
         
     <?php endif ?>
     >
         <a href="manage-instructor">
             <i class="material-icons">account_box</i>
             <span>Instructor Management</span>
         </a>
     </li>
    <?php
}
function side_class(){
    ?>
    <li
     <?php if ($GLOBALS['pagename'] == "Classroom"): ?>
         class="active"
     <?php else: ?>
         
     <?php endif ?>
     
     >
         <a href="classroom">
             <i class="material-icons">class</i>
             <span>Classroom</span>
         </a>
     </li>
    <?php
}
function side_query(){
      ?>
    <li
    <?php if ($GLOBALS['pagename'] == "Query Simulator"): ?>
        class="active"
    <?php else: ?>
        
    <?php endif ?>
    >
         <a href="query-simulator">
            <i class="material-icons">save</i>
            <span>Query Simulator</span>
        </a>
    </li>
    <?php
}   
?>

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

            <!-- Menu -->
            <div class="menu">
                 
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php 
                    //student
                    if ($login_level == 1) {
                        side_dashboard();
                        side_class();
                        side_query();
                    }
                    //instructor
                    else if ($login_level == 2) {
                        side_dashboard();
                        side_class();
                        side_query();
                    }
                    //admin
                    else if ($login_level == 3) {
                        
                        side_dashboard();
                        side_accoutMngt();
                        side_studentMngt();
                        side_instrucMngt();
                        // side_class();
                        // side_query();
                        
                    }
                    else{

                    }
                   
                    ?>
                    
                    
                    
                   <!--   <li
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
                    </li> -->
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