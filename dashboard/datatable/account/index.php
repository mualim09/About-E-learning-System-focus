<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<br />
			<button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#account_modal">BIOGAS MAPPER</button>
			<div class="table-responsive">
				<table id="account_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">ID</th>
							<th width="35%">Level</th>
							<th width="35%">Username</th>
							<th width="35%">Status</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>


 <!-- add modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="account_modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Add Account</h4>
          </div>
          
          <form class="form-horizontal" action="php_action/create.php" method="POST" id="account_form" enctype="multipart/form-data">

          <div class="modal-body">
            <div class="messages"></div>
              <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="username">Username</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="text" class="form-control" id="username" name="username" placeholder="username">
                          </div>
                      </div>
                  </div>
              </div>
              <br>
              <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="level">Level</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                               <select class="form-control" name="level" id="level" >
                                <option value="">~~SELECT~~</option>
                                <option value="1">Student</option>
                                <option value="2">Instructor</option>
                                <option value="3">Admin</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <br>
               <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="email">Email</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                          </div>
                      </div>
                  </div>
              </div>
              <br>
               <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="pass">Password</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="new-password" class="form-control" id="pass" name="pass" placeholder="Password">
                          </div>
                      </div>
                  </div>
              </div>
              <br>
               <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="con_pass">Retype</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                              <input type="new-password" class="form-control" id="con_pass" name="con_pass" placeholder="Confirm Your Password">
                          </div>
                      </div>
                  </div>
              </div>
              <br>
              <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="status">Active</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                          <div class="form-line">
                               <select class="form-control" name="status" id="status" >
                                <option value="">~~SELECT~~</option>
                                <option value="1">Activate</option>
                                <option value="0">Deactivate</option>
                                <option value="2">Ban</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>                    

          </div>
          <div class="modal-footer">
          	<input type="hidden" name="user_ID" id="user_ID" />
			<input type="hidden" name="operation" id="operation" />
			<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </form> 
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /add modal -->

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

	//select specific dropdown when updating 1 data
	function setSelectedValue(dropDownList, valueToSet) {
    var option = dropDownList.firstChild;
    for (var i = 0; i < dropDownList.length; i++) {
        if (option.text.trim().toLowerCase() == valueToSet.trim().toLowerCase()) {
            option.selected = true;
            return;
        }
        option = option.nextElementSibling;
    }
}



	var dataTable = $('#account_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
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
		var username = $('#username').val();
		var level = $('#level').val();
		var email = $('#email').val();
		var pass = $('#pass').val();
		var con_pass = $('#con_pass').val();
		var status = $('#status').val();
		$('#operation').val("Add");
		
		if(username != '' && level != '' && email != '' && pass != '' && con_pass != '' && status != '')
		{


			if (pass == con_pass) 
				{

					if (pass.length > 6) {
						$.ajax({
							url:"insert.php",
							method:'POST',
							data:new FormData(this),
							contentType:false,
							processData:false,
							success:function(data)
							{

								alert(data);
								$('#account_form')[0].reset();
								$('#account_modal').modal('hide');
								dataTable.ajax.reload();
							}
						});
					} 
					else {
						alert("Minumum Password Length is 6 Character");
					}
				} 
				else {
					alert("Password not match");
				}
		}
		else
		{
			alert("Fields are Required");
		}
	});

	$(document).on('click', '.update', function(){
		var user_ID = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_ID:user_ID},
			dataType:"json",
			success:function(data)
			{
				$('#account_modal').modal('show');
				$('#username').val(data.user_Name);
				$('#email').val(data.user_Email);
				var val_level = $('#status').val(data.level_ID);
				var val_stat = $('#status').val(data.user_status);
				

				$('.modal-title').text("Edit Account Info");
				$('#user_ID').val(user_ID);
				$('#action').val("Edit");
				$('#operation').val("Edit");
				setSelectedValue(document.getElementById("level"),val_level);
				setSelectedValue(document.getElementById("status"),val_stat);
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_ID = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_ID:user_ID},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>