<?php 

function roomtablist($req_name,$name,$link,$id){
 
  if ($req_name == $name) {
    $active_ul_rnav = "active";
    $active_ul_rnav_span = '<span class="sr-only">(current)</span>';
    
  }
  else{
     $active_ul_rnav = '';
      $active_ul_rnav_span = '';
  }
  ?>
    <li class="page-item <?php echo $active_ul_rnav;?>">
      <a class="page-link" href="<?php echo $link ?>?classroom_ID=<?php echo $id?>&type=<?php echo $name?>" ><?php echo ucfirst($name).' '.$active_ul_rnav_span;?></a>
    </li>
  <?php
}
$crd = $auth_user->classroom_details($classroom_ID);

?>

<nav aria-label="breadcrumb" >
        <ol class="breadcrumb bcrum">
          <li class="breadcrumb-item "><a href="index" class="bcrum_i_a">Dashboard</a></li>
          <li class="breadcrumb-item "><a href="classroom" class="bcrum_i_a">Classroom</a></li>
          <li class="breadcrumb-item  active bcrum_i_ac" aria-current="page"><?php echo ucfirst($rtab_c)?></li>
        </ol>
      </nav>
<nav >
<table class="table table-bordered table-sm">
  <tbody>
  
     <tr>
      <td width="10%">Instructor:</td>
      <td><?php echo ucwords($crd["Instructor"])?></td>
    </tr>
    <tr>
      <td width="10%">Classname:</td>
      <td><?php echo $crd["class_Name"]?></td>
    </tr>  
    <tr>
      <td>Class Code:</td>
      <td><?php echo $crd["class_Code"]?></td>
    </tr>  
  </tbody>
</table>
  <ul class="pagination">
    <?php 
    roomtablist($type,"stream","classroom_content",$classroom_ID);
    roomtablist($type,"activity","classroom_content",$classroom_ID);
    roomtablist($type,"student","classroom_content",$classroom_ID);
    ?>

  </ul>
</nav>