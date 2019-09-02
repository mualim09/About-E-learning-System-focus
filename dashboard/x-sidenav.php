<?php 
echo $current_url = $_SERVER['REQUEST_URI'];
$url_explde = explode('/', $current_url);
$pagefile_name = $url_explde[3];

function navlist($pagefile_name,$name,$link,$icon){
 
  if ($pagefile_name == $link) {
    $active_ul_snav = "active";
    $active_ul_snav_span = '<span class="sr-only">(current)</span>';
    
  }
  else{
     $active_ul_snav = '';
      $active_ul_snav_span = '';
  }
  ?>
   <li class="nav-item">
            <a class="nav-link <?php echo $active_ul_snav;?>" href="<?php echo $link;?>">
              <span data-feather="<?php echo $icon;?>"></span>
              <?php echo $name.' '.$active_ul_snav_span; ?>
            </a>
          </li>
  <?php
}


?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <div style="height: 120px;" class="text-center">
           <img id="c_img" src="<?php $auth_user->getUserPic();?>" alt="Profile Image"  runat="server"  height="85" width="85" class="rounded-circle" style="border:1px solid;"/>
           <br>
           <h6><?php $auth_user->getUsername();?></h6>
        </div>

        <ul class="nav flex-column">
          <div style="background: #eee;
    font-size: 12px;
    font-weight: 600;
    padding: 8px 16px;">MAIN NAVIGATION</div>
          <?php 
          navlist($pagefile_name,"Dashboard","index","home");
          navlist($pagefile_name,"Account Management","account","users");
          navlist($pagefile_name,"Student Management","student","users");
          navlist($pagefile_name,"Instructor Management","instructor","users");
          navlist($pagefile_name,"Quiz Management","test","users");
          navlist($pagefile_name,"Query Simulator","query_simulator","database");
          navlist($pagefile_name,"Classroom","classroom","clipboard");
           
          ?>
          <div class="text-center " style=" position: absolute;bottom: 0; color:#4caf50; padding:5px;">
            <hr>
            <strong>CvSU E-learning for Information Management</strong>
          </div>

        </ul>
        <!-- <div class="text-center">CvSU E-learning for Information Management</div> -->
        
      </div>

    </nav>
