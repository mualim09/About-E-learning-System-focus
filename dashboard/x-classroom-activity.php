

        <button type="button" class="btn btn-sm btn-success add" data-toggle="modal" data-target="#test_modal">Add Activity</button>
          <button type="button" class="btn btn-sm btn-info float-right material" data-toggle="modal" data-target="#material_modal">Class  Materials</button>
         <br><br>
        <table class="table table-striped table-sm" id="activity_data">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Type</th>
              <th>Date Added</th>
              <th>Date Expired</th>
              <th>Timer</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
     
          </tbody>
        </table>



<div class="modal fade" id="test_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="test_modal_title">Add New Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="product_modal_content">
    
      <form method="post" id="test_form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="test_name">Name</label>
                  <input type="text" class="form-control" id="test_name" name="test_name" placeholder="" value=""  required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="test_expired">Expired</label>
                  <input type="datetime-local" class="form-control" id="test_expired" name="test_expired"  value=""  required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="test_timer">Timer(Min):</label>
                  <input type="text" class="form-control" id="test_timer" name="test_timer" placeholder="00" value="" maxlength="4" minlength="1"required="">
                </div>
              </div>  

                <div class="form-group">
                <label for="prod_category">Type</label>
                <select class="form-control" id="test_type" name="test_type">
                  <?php 
                   $auth_user->ref_test_type();
                  ?>
                </select>
                <label for="prod_category">Status</label>
                <select class="form-control" id="test_status" name="test_status">
                  <?php 
                   $auth_user->ref_status();
                  ?>
                </select>
              </div>
      </div>
      <div class="modal-footer">

        <input type="hidden" name="class_ID" id="class_ID" />
        <input type="hidden" name="test_ID" id="test_ID" />
        <input type="hidden" name="operation" id="operation" />
        <div class="btn-group" id="sbtng">
          <button type="submit" class="btn btn-primary submit" id="submit_input" value="test_submit">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
       </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="questionaire_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Question and Answer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <button type="button" class="btn btn-sm btn-success add_question" >Add Q&A</button>
          <table class="table table-borderless table-sm" id="questionaire_data">
           <thead>
            <tr>
              <th>Question ID</th>
              <th>Choice_ID</th>
              <th>is_correct</th>
              <th>Choice</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
     
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="question_modal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post" id="question_form" enctype="multipart/form-data">
      <div class="modal-body">
              <div class="form-group row">
              <label for="q_question" class="col-sm-2 col-form-label">Question:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="q_question" name="q_question" >
              </div>
            </div>
             <div class="form-group row">
              <label for="q_choice_a" class="col-sm-2 col-form-label">A.</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="q_choice_a" name="q_choice_a" >
              </div>
            </div>

             <div class="form-group row">
              <label for="q_choice_b" class="col-sm-2 col-form-label">B.</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="q_choice_b" name="q_choice_b" >
              </div>
            </div>
             <div class="form-group row">
              <label for="q_choice_b" class="col-sm-2 col-form-label">C.</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="q_choice_b" name="q_choice_b" >
              </div>
            </div>

            <div class="form-group row">
              <label for="q_choice_b" class="col-sm-2 col-form-label">D.</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="q_choice_b" name="q_choice_b" >
              </div>
            </div>
            <div class="form-group row">
              <label for="q_choice_b" class="col-sm-2 col-form-label">Correct</label>
              <div class="col-sm-10">
                <select class="form-control" id="q_is_correct" name="q_is_correct">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
            </div>

      </div>
      <div class="modal-footer">
        <input type="hidden" name="question_ID" id="question_ID" />
        <input type="hidden" name="q_operation" id="q_operation" />
        <div class="btn-group" id="sbtng">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary submit" id="submit_input_q" value="question_submit">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="material_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Class Materials</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <button type="button" class="btn btn-sm btn-success add_materials" >Add Materials</button>
          <br><br>
          <table class="table table-striped table-sm" id="material_data">
           <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
     
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="material_submit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Materials</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
      <form method="post" id="material_form" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group row">
          <label for="material_name" class="col-sm-2 col-form-label">Material Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="material_name" name="material_name" >
          </div>
        </div>
        <div class="form-group row">
          <label for="material_file" class="col-sm-2 col-form-label">File:</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="material_file" name="material_file" >
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="class_ID" id="class_ID" value="<?php echo $classroom_ID?>"/>
        <input type="hidden" name="m_operation" id="m_operation" value="material_submit"/>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary submit" id="submit_input_m" value="material_submit">Submit</button>
      </div>
      </form>
    </div>
</div>
</div>

  <div class="modal fade" id="deltest_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal_title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="test_modal_title">Delete this Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
          <div class="btn-group">
          <button type="submit" class="btn btn-danger" id="test_delform">Delete</button>
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

    </main>
  </div>
</div>

<?php 
include('x-script.php');
?>
        <script type="text/javascript">
   


          $(document).ready(function() {
             
            var dataTable = $('#activity_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"datatable/classroom_activity/fetch.php?class_ID="+<?php echo $classroom_ID?>,
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });
            var materials_dataTable = $('#material_data').DataTable({
            "processing":true,
            "serverSide":true,
            "bAutoWidth": false,
            "order":[],
            "ajax":{
              url:"datatable/classroom_materials/fetch.php?class_ID="+<?php echo $classroom_ID?>,
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });
          function qestionaire(test_ID){
               var questionaire_dataTable = $('#questionaire_data').DataTable({
              "processing":true,
              "serverSide":true,
              "order":[],
              "ajax":{
                url:"datatable/classroom_activity/fetch_questionaire.php?test_ID="+test_ID,
                type:"POST"
                
              },
              "columnDefs":[
                {
                  "targets":[0],
                  "orderable":false,
                },
              ],

            });
          }
       



         $(document).on('submit', '#test_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"datatable/classroom_activity/insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  alertify.alert(data).setHeader('Test');
                  $('#test_form')[0].reset();
                  $('#test_modal').modal('hide');
                  dataTable.ajax.reload();
                }
              });
           
          });
          $(document).on('submit', '#material_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"datatable/classroom_materials/insert.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                  alertify.alert(data).setHeader('Test');
                  $('#material_form')[0].reset();
                  $('#material_submit_modal').modal('hide');
                  materials_dataTable.ajax.reload();
                }
              });
           
          });

         

          $(document).on('click', '.add', function(){
            $('#test_modal_title').text('Add Activity');
            $("#test_name").prop("disabled", false);
            $('#test_form')[0].reset();

              var btng = document.getElementById("sbtng");
            btng.className = btng.className.replace(/\btng_null\b/g, "");
            btng.classList.add("btn-group");


            $('#submit_input').show();
            jQuery('#class_ID').val(<?php echo $classroom_ID ?>) ;

            $('#submit_input').text('Submit');
            $('#submit_input').val('test_submit');
            $('#operation').val("test_submit");
          });

          $(document).on('click', '.view', function(){
            var test_ID = $(this).attr("id");
            $('#test_modal_title').text('View Activity');
            $('#test_modal').modal('show');
     

            $('#submit_input').hide();
            var btng = document.getElementById("sbtng");
            btng.className = btng.className.replace(/\bbtn-group\b/g, "");
            btng.classList.add("btng_null");
            
             $.ajax({
                url:"datatable/classroom_activity/fetch_single.php",
                method:'POST',
                data:{action:"test_view",test_ID:test_ID},
                dataType    :   'json',
                success:function(data)
                {

                $("#test_name").prop("disabled", true);
                $("#test_expired").prop("disabled", true);
                $("#test_timer").prop("disabled", true);
                $("#test_type").prop("disabled", true);
                $("#test_status").prop("disabled", true);

                  $('#test_name').val(data.test_Name);
                  $('#test_expired').val(data.test_Expired);
                  $('#test_timer').val(data.test_Timer);
                  $('#test_type').val(data.tstt_ID).change();
                  $('#test_status').val(data.status_ID).change();

                  $('#submit_input').hide();
                  $('#test_ID').val(test_ID);
                  $('#submit_input').text('Update');
                  $('#submit_input').val('test_view');
                  $('#operation').val("test_view");
                  
                }
              });


            });
          $(document).on('click', '.edit', function(){
            var test_ID = $(this).attr("id");
            $('#test_modal_title').text('Edit Activity');
            $('#test_modal').modal('show');
          
            $('#submit_input').show();
            var btng = document.getElementById("sbtng");
            btng.className = btng.className.replace(/\bbtng_null\b/g, "");
            btng.classList.add("btn-group");
           jQuery('#class_ID').val(<?php echo $classroom_ID ?>) ;
            
             $.ajax({
                url:"datatable/classroom_activity/fetch_single.php",
                method:'POST',
                data:{action:"test_view",test_ID:test_ID},
                dataType    :   'json',
                success:function(data)
                {
                  $("#test_name").prop("disabled", false);
                $("#test_expired").prop("disabled", false);
                $("#test_timer").prop("disabled", false);
                $("#test_type").prop("disabled", false);
                $("#test_status").prop("disabled", false);

                  $('#test_name').val(data.test_Name);
                  $('#test_expired').val(data.test_Expired);
                  $('#test_timer').val(data.test_Timer);
                  $('#test_type').val(data.tstt_ID).change();
                  $('#test_status').val(data.status_ID).change();

                  $('#submit_input').show();
                  $('#test_ID').val(test_ID);
                  $('#submit_input').text('Update');
                  $('#submit_input').val('test_edit');
                  $('#operation').val("test_edit");
                  
                }
              });


            });
            $(document).on('click', '.delete', function(){
            var test_ID = $(this).attr("id");
             $('#deltest_modal').modal('show');
             $('.submit').hide();
             
             $('#test_ID').val(test_ID);
            });

            $(document).on('click', '.view_questionaire', function(){
            var test_ID = $(this).attr("id");
             $('#questionaire_modal').modal('show');
       
         
             qestionaire(test_ID);    
             $('#questionaire_data').DataTable().destroy();
         
          
            });

          $(document).on('click', '.edit_question', function(){
            var question_ID = $(this).attr("id");
             $('#question_modal').modal('show');
          
            });

            $(document).on('click', '.add_question', function(){
            var question_ID = $(this).attr("id");
             $('#question_modal').modal('show');
              questionaire_dataTable.ajax.reload();
          
            });

            $(document).on('click', '.add_materials', function(){
          
             $('#material_submit_modal').modal('show');
              questionaire_dataTable.ajax.reload();
          
            });
            
             $(document).on('click', '.delete_material', function(){
              var material_ID = $(this).attr("id");
        
               alertify.confirm('Are you sure you want to delete this material?', 
              function(){
                $.ajax({
                 type        :   'POST',
                 url:"datatable/classroom_materials/insert.php",
                 data        :   {m_operation:"material_delete",material_ID:material_ID},
                 dataType    :   'json',
                 complete     :   function(data) {
                   alertify.alert(data.responseText).setHeader('Classroom Materials');
                   materials_dataTable.ajax.reload();
                    
                 }
                })

                
                 alertify.success('Ok') 
               },
              function(){ 
                alertify.error('Cancel')
              }).setHeader('Classroom Materials');
             
          
            });

            
           
           

           




          $(document).on('click', '#test_delform', function(event){
             var test_ID =  $('#test_ID').val();
            $.ajax({
             type        :   'POST',
             url:"datatable/classroom_activity/insert.php",
             data        :   {operation:"test_delete",test_ID:test_ID},
             dataType    :   'json',
             complete     :   function(data) {
               $('#deltest_modal').modal('hide');
               alertify.alert(data.responseText).setHeader('Delete this Account');
               dataTable.ajax.reload();
          
                
             }
            })
           
          });
          
          } );



        </script>
        </body>