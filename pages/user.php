<?php
$page = "user";
include("../header-n-sidebar.php");
include("../config.php");
session_start();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section> <br><br>

    <!-- Main content -->
    <section class="content">
    

    <div class="" style="padding:10px;"> 
     <div class="row text-right">
      <button class="btn btn-success" onclick="add()" id="add_btn"><i class="fa fa-plus"></i></button>
      <button class="btn btn-danger" onclick="cancel()"  id="close_btn"> <i class="fa fa-close"></i> </button>
     </div>
     </div>
     


     
     <div class="row" id="new_category" style="display: none;">
         <div class="col-md-4"></div>
         <div class="col-md-4 text-center new_category_form">
         <h3 class="text-center" style="margin-bottom:30px;">Add New User</h3>
         <form class="form" method="POST" enctype="multipart/form-data" id="adduser">
         <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="username">User Name</label> </div>
                  <div class="col-md-8">
                      <input type="text" name="username" class="form-control" id="username" required>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="email">Email</label> </div>
                  <div class="col-md-8"> <input type="email" id="email" name="email" class="form-control" required> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="pass">Password</label> </div>
                  <div class="col-md-8"> <input type="password" id="pass" name="password" class="form-control" required> </div>
               </div>
           </div>
           <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cpass">Confirm Password</label> </div>
                  <div class="col-md-8"> <input type="password" id="cpass" name="password" class="form-control" required> </div>
               </div>
               <div class="row">
               		<div class="text-center" id="alert"></div>
               </div>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-success" id="buttonload1">Save</button></div>
         </form>
         </div>
     </div>
  



<br><br>
<div class="container-fluid" id="category_list_tabel">
<div class="table-responsive" id="tba">
<table class="table table-striped" id="user_table">

<thead>
<tr>
    <th class="h4"> S.No </th>
    <th class="h4"> User name</th>
    <th class="h4">Email</th>
    <th class="h4"> Created at </th>
    <th class="h4"> Modified at </th>
    <th class="h4"> Actions </th>
</tr>
</thead>

<tbody id="tbody">
  <?php 
  $get = "SELECT * FROM user"; 
  $result = mysqli_query($conn,$get);
  $i=1;
  while($data = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td> <?php echo $i; ?> </td>
    <td> <?php echo $data['user_name']; ?> </td>
    <td> <?php echo $data['email']; ?> </td>
    <td> <?php echo $data['created_at']; ?> </td>
    <td> <?php echo $data['update_at']; ?>  </td>
    <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edituser<?php echo $data['id']; ?>"> <i class="fa fa-edit"></i> </button>
    <button data-target="#delete<?php echo $data['id'] ?>" data-toggle="modal" title="Delete" class="btn btn-danger"><i style="" class="fa fa-trash"></i></button>
    </td>
</tr>
<div class="modal fade" id="delete<?php echo $data['id']; ?>">



    <div class="modal-dialog">



                      <form action="/controllers/delete_user.php" method="GET">







      <div class="modal-content">



        <div class="modal-header">



          



          <h4 class="modal-title text-center">Remove this Client ?</h4>

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



        </div>







        <div class="modal-body">



            <div class="form-group" style="text-align: center;">

                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

              <label for="folderName">Are you sure you want to remove this user? This action can't be undone.</label>



            </div>



        </div>







        <div style="text-align:center;" class="modal-footer">



                  <button type="submit" class="btn btn-danger btn-sm">Confirm</button>







          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>



          </div>



      </div>



      <!-- /.modal-content -->



                        </form>



    </div>



    <!-- /.modal-dialog -->



  </div>
<div id="edituser<?php echo $data['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">
         <h3 class="text-center" style="margin-bottom:30px;">Edit User</h3>
         <form action = "../controllers/edit_user.php" onsubmit="return vali()" class="form" method="POST" id="form<?php echo $data['id']; ?>">
         <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="username">User Name</label> </div>
                  <div class="col-md-8">
                      <input type="text" name="username" class="form-control" id="username" value="<?php echo$data['user_name']?>"required>
                      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="email">Email</label> </div>
                  <div class="col-md-8"> <input type="email" id="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="pass">Password</label> </div>
                  <div class="col-md-8"> <input type="password" id="pass<?php echo $data['id']; ?>" name="password" class="form-control" value="xxxxxxxx" required> </div>
               </div>
           </div>
           <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cpass">Confirm Password</label> </div>
                  <div class="col-md-8"> <input type="password" id="cpass<?php echo $data['id']; ?>" name="password" class="form-control" value="xxxxxxxx" required> </div>
               </div>
               <div class="row">
               		<div class="text-center" id="alert_1<?php echo $data['id']; ?>"></div>
               </div>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-success" id="buttonload1">Save</button></div>
         </form>
      </div>
      <script type="text/javascript">
   	function vali(){
    var pass = document.getElementById("pass<?php echo $data['id']; ?>").value;
    			var cpass = document.getElementById("cpass<?php echo $data['id']; ?>").value;
    			if(pass != cpass){
	     			document.getElementById("alert_1<?php echo $data['id']; ?>").innerHTML = "<strong class='text-danger'>Password Does Not Match</strong>";
	     			return false;
	     			// alert("in");
	       	// 		e.preventDefault();
    			}
	}
   </script>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php $i++; } ?>
</tbody>

</table>
</div>
</div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
<div id="overlay">

        <div class="loader" id="loader-1"></div>
      </div>

</div>



 <?php
include("../footer.php");

 ?>
   <script src="/dist/js/custom.js"></script>
   <script type="text/javascript">  	
      $(function () {
        $('#adduser').on('submit', function (e) {
        	var pass = document.getElementById("pass").value;
        	var cpass = document.getElementById("cpass").value;
        	if(pass != cpass){
        		
        		document.getElementById("alert").innerHTML = "<strong class='text-danger'>Password Does Not Match</strong>";
        		return false;
        	}
          e.preventDefault();

		 document.getElementById('buttonload1').innerHTML="<i class='fa fa-spinner fa-spin' style='font-size:24px'></i>";
          $.ajax({
            type: 'post',
            url: '../controllers/add_new_user.php',
            data: $('#adduser').serialize(),
            success: function (status) {
              if(status=="200"){
              	document.getElementById('buttonload1').innerHTML="Save";
              	var stat = "success";
              	var message = "User Added Successfully";
              	document.getElementById("close_btn").click();
              	get_user(); 
              	success(message,stat);
              }
              else{
              	document.getElementById('buttonload1').innerHTML="Save";
              	var stat = "warning";
              	var message = "Email Already Exists"; 
              	success(message,stat);
              }
            }
          });

        });

      });
      function get_user(){
      	 $.ajax({url: "../controllers/get_user.php", success: function(result){
      		$("#tba").html(result);
      		// $(document).ready( function () {
    		table_user();
		// });
    	}});
      }
   </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script type="text/javascript">
	   function success(message,stat){
		   Command: toastr[stat](message, "Info")
		   toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
	}
    </script>
    <script type="text/javascript">
    	$(document).ready( function () {
    	$('#user_table').DataTable();
	});
    </script>
<?php
if(isset($_SESSION['msg'])){  unset($_SESSION['msg']); ?>
<script type="text/javascript"> 
	var stat = "success";
    var message = "User Deleted";
	success(message,stat);
</script>	
<?php } ?>
<?php
if(isset($_SESSION['success'])){  unset($_SESSION['success']); ?>
<script type="text/javascript"> 
	var stat = "success";
    var message = "User details updated";
	success(message,stat);
</script>	
<?php } ?>
</body>
</html>