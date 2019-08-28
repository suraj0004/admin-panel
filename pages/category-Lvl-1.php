<?php
$page = "Category Lvl 1";
include("../header-n-sidebar.php");

include("../config.php");
// get all school data 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Level 1 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category Level 1</li>
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
     


     
     <div class="row" id="new_category">
         <div class="col-md-4"></div>
         <div class="col-md-4 text-center new_category_form">
         <h2 class="text-center" style="margin-bottom:30px;">Add New Category</h2>
         <form class="form" method="POST" action="/controllers/sub-category-lvl1.php" enctype="multipart/form-data">
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="category_name">Category Name:</label> </div>
                  <div class="col-md-8"> <input type="text" id="category_name" name="category_name" class="form-control"> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="category_logo">Category Logo:</label> </div>
                  <div class="col-md-8"> <input type="file" id="category_logo" name="category_logo" class="form-control"> </div>
               </div>
            </div>
            <div class="text-center"><button class="btn btn-success">Save</button></div>
         </form>
         </div>
     </div>
  



<br><br>
<div class="container" id="category_list_tabel">
<div class="table-responsive">
<table class="table table-striped" id="myTable">

<thead>
<tr>
    <th class="h6"> # </th>
    <th class="h6"> Category </th>
    <th class="h6">Logo</th>
    <th class="h6"> Created at </th>
    <th class="h6"> Modified at </th>
    <th class="h6"> Actions </th>
</tr>
</thead>

<tbody>
  <?php 
  $get = "SELECT * FROM cat WHERE parent_id = 0 "; 
  $result = mysqli_query($conn,$get);
  $i=1;
  while($data = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td> <?php echo $i; ?> </td>
    <td> <?php echo $data['cat_name']; ?> </td>
    <td> <img src="/controllers/<?=$data["cat_logo"]?>" height="50px" width="50px"> </td>
    <td> <?php echo $data['created_at']; ?> </td>
    <td> <?php echo $data['updated_at']; ?>  </td>
    <td> <a href="category-edit.php?id=<?=$data["id"]?>&lvl=1" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
    <a href="/controllers/delete.php?id=<?php echo $data['id'];?>&p_id=1"class="btn btn-danger"> <i class="fa fa-trash"></i> </a>  </td>
</tr>
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

 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<!-- <script type="text/javascript">$(document).ready( function () {
    $('#myTable').DataTable();
} );</script> -->
</body>
</html>
