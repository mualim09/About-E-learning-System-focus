<?php 
include('../session.php');


require_once("../class.user.php");

  
$auth_user = new USER();
// $page_level = 3;
// $auth_user->check_accesslevel($page_level);
$pageTitle = "Result Score";

if(isset($_REQUEST["score_ID"])){
   $score_ID = $_REQUEST["score_ID"];
   $classroom_ID = $_REQUEST["classroom_ID"];

  
   $result1 = $auth_user->get_score($score_ID);
   foreach($result1 as $row)
    {
      $test_ID = $row["test_ID"];
      $score = $row["score"];
      $score_user_ID = $row["user_ID"];


    }
   $result2 = $auth_user->get_test($test_ID);

    foreach($result2 as $row)
    {
      $test_Name = $row["test_Name"];
    }

   $stmt3 = $auth_user->runQuery("SELECT question_ID FROM `class_room_test_questions` WHERE test_ID = ".$test_ID."");
   $stmt3->execute();
   $qcount = $stmt3->rowCount();

  $stmt4 = $auth_user->runQuery("SELECT * FROM `class_room_test_attemp` WHERE user_ID = ".$score_user_ID." AND test_ID = ".$test_ID."");
  $stmt4->execute();
  $result4 = $stmt4->fetchAll();
  foreach($result4 as $row)
  {
      $atmp_ID = $row["atmp_ID"];
    $retake_count = $row["count"];
  }

   
    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <?php 
      include('x-meta.php');
    ?>


  <?php 
  include('x-css.php');
  ?>
 



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
<?php 
include('x-nav.php');
?>

<div class="container-fluid">
  <div class="row">
      <?php 
    include('x-sidenav.php');
    ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Result </h1>
        
      </div>

      <div class="table-responsive">
      
      <center>
      <div class="card" style="width: 18rem;">
      
        <div class="card-body">
          <h5 class="card-title"><?php echo $test_Name?></h5>
          <p> Score:
         <?php echo $score?>/<?php echo $qcount?>
          </p>
          <?php 
          if ($retake_count == 0)
          {

          }
          else{
            ?><div class="btn btn-primary btn-sm " id="retake">RETAKE(<?php echo $retake_count?>)</div><?php
          }?>
          
        </div>
      </div>
      </center>
      <h3></h3>
      </div>
    </main>
  </div>
</div>

<?php 
include('x-script.php');
?>
<script>


$(document).ready(function() {
   $(document).on('submit', '#test_form', function(event) {
          event.preventDefault();
       
          $.ajax({
             url:"datatable/classroom_test_qanda/insert.php",
             method:'POST',
             data:new FormData(this),
             contentType:false,
             processData:false,
             success:function(data)
             {

              alertify.alert(data, 
              function(){
                window.location.assign('result');
                 alertify.success('Ok') 
               }).setHeader('Answer');

             }
           });

      });

          $(document).on('click', '#retake', function(){
          
              alertify.confirm('Are you sure you want to retake?', 
              function(){

                $.ajax({
                  url:"datatable/classroom_test_qanda/insert.php",
                  type:'POST',
                  data:{q_operation:"retake",atmp_ID:<?php echo $atmp_ID?>,retake_count:<?php echo $retake_count?>,test_ID:<?php echo $test_ID?>,score_user_ID:<?php echo $score_user_ID ?>},
                  dataType    :   'json',
                  complete     :   function(data) {

                      window.location.assign('take?test_ID='+<?php echo $test_ID?>+'&classroom_ID='+<?php echo $classroom_ID?>);
                  }
                });
                
                 alertify.success('Ok') 
               },
              function(){ 
                alertify.error('Cancel')
              }).setHeader('Result');
          });
});




</script>
        </body>

</html>
