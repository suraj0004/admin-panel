  <?php
  include("../config.php"); ?>
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

<tbody>
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
          //    e.preventDefault();
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
<script type="text/javascript">
      $(document).ready( function () {
      $('#user_table').DataTable();
  });
</script>