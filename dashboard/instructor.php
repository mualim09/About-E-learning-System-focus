<?php 
include('../session.php');


require_once("../class.user.php");

  
$auth_user = new USER();
// $page_level = 3;
// $auth_user->check_accesslevel($page_level);
$pageTitle = "Manage Instructor Record";
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
        <h1 class="h2">Manage Instructor Record</h1>
        
      </div>
      <div class="table-responsive">
         <button type="button" class="btn btn-sm btn-success add" data-toggle="modal" data-target="#student_modal">Add</button>
         <br><br>
        <table class="table table-striped table-sm" id="student_data">
          <thead>
            <tr>
              <th>#</th>
              <th>Student#</th>
              <th>Full Name</th>
              <th>Sex</th>
              <th>Faculty</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
     
          </tbody>
        </table>


<div class="modal fade" id="student_modal" tabindex="-1" role="dialog" aria-labelledby="student_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="student_modal_title">Add New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="student_modal_content">
    
      <form method="post" id="student_form" enctype="multipart/form-data">

              <div  class="form-row ">
                <div class="form-group col-md-3">
                   <img id="student_profile" src="../assets/img/users/default.jpg" alt="Profile Image"  runat="server"  height="125" width="125" class="" style="border:1px solid; border-color: grey;"/>
                </div>
                <div class="form-group col-md-3" style="margin-top:25px;">
                  <label for="student_picture">Choose Picture:</label>
                  <input type="file" class="form-control" id="select_profile" name="student_picture" >
                </div>
              </div>
               <div class="form-row ">

                <div class="form-group col-md-3">
                  <label for="student_fname">First Name:</label>
                  <input type="text" class="form-control" id="student_fname" name="student_fname" placeholder="" value="" required="">
                </div>
                <div class="form-group col-md-3">
                  <label for="student_mname">Middle Name:</label>
                  <input type="text" class="form-control" id="student_mname" name="student_mname" placeholder="" value="" required="">
                </div>
                <div class="form-group col-md-3">
                  <label for="student_lname">Last Name:</label>
                  <input type="text" class="form-control" id="student_lname" name="student_lname" placeholder="" value="" required="">
                </div>
                <div class="form-group col-md-3">
                  <label for="student_lname">Suffix: <i>(If None Select N/A)</i></label>
                  <select class="form-control" id="acc_lvl" name="acc_lvl">
                    <?php 
                     $auth_user->user_suffix_option();
                    ?>
                  </select>
                </div>
                 <div class="form-group col-md-4">
                  <label for="student_lname">Birthday</label>
                  <input type="date" class="form-control" id="student_lname" name="student_lname" placeholder="" value="" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="student_lname">Sex:</i></label>
                  <select class="form-control" id="acc_lvl" name="acc_lvl">
                    <?php 
                     $auth_user->user_sex_option();
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="student_lname">Civil Status:</i></label>
                  <select class="form-control" id="acc_lvl" name="acc_lvl">
                    <?php 
                     $auth_user->user_marital_option();
                    ?>
                  </select>
                </div>


                 <div class="form-group col-md-6">
                  <label for="student_lname">Contact</label>
                  <input type="text" class="form-control" id="student_lname" name="student_lname" placeholder="" value="" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="acc_email">Email:</label>
                  <input type="email" class="form-control" id="acc_email" name="acc_email" placeholder="" value="" required="">
                </div>
                <div class="form-group col-md-12">
                  <label for="student_lname">Course:</i></label>
                  <select class="form-control" id="acc_lvl" name="acc_lvl">
                    <?php 
                     $auth_user->user_course_option();
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="acc_add">Address:</label>
                  <input type="text" class="form-control" id="acc_add" name="acc_add" placeholder="" value="" required="">
                </div>
              </div> 
      </div>
      <div class="modal-footer">
        <input type="hidden" name="account_ID" id="account_ID" />
        <input type="hidden" name="operation" id="operation" />
        <div class="btn-group">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit" id="submit_input" value="submit_account">Submit</button>
        </div>
      </div>
       </form>
    </div>
  </div>
</div>

<div class="modal fade" id="delstudent_modal" tabindex="-1" role="dialog" aria-labelledby="student_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="student_modal_title">Delete this Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
        <div class="btn-group">
        <button type="submit" class="btn btn-danger" id="account_delform">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      </div>
    </main>
  </div>
</div>

<?php 
include('x-script.php');
?>
        <script type="text/javascript">
   

            function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#student_profile').attr('src', e.target.result);
      }
    
      reader.readAsDataURL(input.files[0]);
    }
   }
     
         
         
         $("#select_profile").change(function() {
           readURL(this);
         });

          $(document).ready(function() {
             
            var dataTable = $('#student_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"datatable/record_student/fetch.php",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });



          $(document).on('submit', '#account_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"datatable/record_student/insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  alertify.alert(data).setHeader('Account');
                  $('#account_form')[0].reset();
                  $('#student_modal').modal('hide');
                  dataTable.ajax.reload();
                }
              });
           
          });

          $(document).on('click', '.add', function(){
            $('#student_modal_title').text('Add New Student');
            $("#acc_username").prop("disabled", false);
            $('#account_form')[0].reset();
            $('#submit_input').show();
            $('#submit_input').text('Submit');
            $('#submit_input').val('submit_account');
            $('#operation').val("submit_account");
          });

          $(document).on('click', '.view', function(){
            var account_ID = $(this).attr("id");
            $('#student_modal_title').text('View Account');
            $('#student_modal').modal('show');
            $("#acc_pass").hide();
            $("#acc_cpass").hide();
            $("#l_acc_pass").hide();
            $("#l_acc_cpass").hide();
            
             $.ajax({
                url:"datatable/record_student/fetch_single.php",
                method:'POST',
                data:{action:"account_view",account_ID:account_ID},
                dataType    :   'json',
                success:function(data)
                {

                $("#acc_username").prop("disabled", true);
                $("#acc_email").prop("disabled", true);
                $("#acc_name").prop("disabled", true);
                $("#acc_lvl").prop("disabled", true);
                $("#acc_add").prop("disabled", true);

                  $('#acc_username').val(data.user_Name);
                  $('#acc_email').val(data.user_Email);
                  $('#acc_name').val(data.user_Fullname);
                  $('#acc_pass').val(data.user_Pass);
                  $('#acc_lvl').val(data.lvl_ID).change();
                  
                  $('#acc_cpass').val(data.user_Pass);
                  $('#acc_add').val(data.user_Address);

                  $('#submit_input').hide();
                  $('#account_ID').val(account_ID);
                  $('#submit_input').text('Update');
                  $('#submit_input').val('account_edit');
                  $('#operation').val("account_edit");
                  
                }
              });


            });
          $(document).on('click', '.edit', function(){
            var account_ID = $(this).attr("id");
            $('#student_modal_title').text('Edit Account');
            $('#student_modal').modal('show');
          
            $("#acc_pass").show();
            $("#acc_cpass").show();
            $("#l_acc_pass").show();
            $("#l_acc_cpass").show();

            
             $.ajax({
                url:"datatable/record_student/fetch_single.php",
                method:'POST',
                data:{action:"account_view",account_ID:account_ID},
                dataType    :   'json',
                success:function(data)
                {
                  $("#acc_username").prop("disabled", true);
                  $("#acc_email").prop("disabled", false);
                  $("#acc_name").prop("disabled", false);
                  $("#acc_lvl").prop("disabled", false);
                  $("#acc_add").prop("disabled", false);
                  $("#acc_pass").prop("disabled", false);
                  $("#acc_cpass").prop("disabled", false);

                  $('#acc_username').val(data.user_Name);
                  $('#acc_email').val(data.user_Email);
                  $('#acc_name').val(data.user_Fullname);
                  $('#acc_pass').val(data.user_Pass);
                  $('#acc_lvl').val(data.lvl_ID).change();
                  
                  $('#acc_cpass').val(data.user_Pass);
                  $('#acc_add').val(data.user_Address);

                  $('#submit_input').show();
                  $('#account_ID').val(account_ID);
                  $('#submit_input').text('Update');
                  $('#submit_input').val('account_update');
                  $('#operation').val("account_edit");
                  
                }
              });


            });
            $(document).on('click', '.delete', function(){
            var account_ID = $(this).attr("id");
             $('#delstudent_modal').modal('show');
             $('.submit').hide();
             
             $('#account_ID').val(account_ID);
            });

           


          $(document).on('click', '#account_delform', function(event){
             var account_ID =  $('#account_ID').val();
            $.ajax({
             type        :   'POST',
             url:"datatable/record_student/insert.php",
             data        :   {operation:"delete_account",account_ID:account_ID},
             dataType    :   'json',
             complete     :   function(data) {
               $('#delstudent_modal').modal('hide');
               alertify.alert(data.responseText).setHeader('Delete this Account');
               dataTable.ajax.reload();
               dataTable_product_data.ajax.reload();
                
             }
            })
           
          });
          
          } );


        </script>
        </body>

</html>
