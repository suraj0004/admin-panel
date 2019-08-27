<?php
$page = "Category Lvl 3";
include("../header-n-sidebar.php");

include("../config.php");
// get all school data 

$sql = "SELECT * FROM `schools_data` INNER JOIN school_registration ON schools_data.school_id = school_registration.id WHERE school_registration.doc_verified = 'false' AND school_registration.doc_uploaded = 'true' ";
$result = $conn->query($sql);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Level 3 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category Level 3</li>
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
         <h3 class="text-center" style="margin-bottom:30px;">Add New Sub-Category (Lvl 3)</h3>
         <form class="form" method="POST" action="/controllers/sub-category-lvl3.php" >
         <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="parent_category">Parent Sub-Category:</label> </div>
                  <div class="col-md-8">
                       <select id="parent_category" name="parent_category" class="form-control"> 
                       <option value="">NAN</option>
                       </select>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="category_name">Sub-Category Name:</label> </div>
                  <div class="col-md-8"> <input type="text" id="category_name" name="category_name" class="form-control"> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="category_logo">Sub-Category Logo:</label> </div>
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
<table class="table table-striped">

<thead>
<tr>
    <th class="h3"> # </th>
    <th class="h3"> Sub-Category (Lvl 3) </th>
    <th class="h3"> Created at </th>
    <th class="h3"> Modified at </th>
    <th class="h3"> Actions </th>
</tr>
</thead>

<tbody>
<tr>
    <td> 1 </td>
    <td> Category 1 </td>
    <td> 4/10/19 </td>
    <td> 5/11/20 </td>
    <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button>  <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
</tr>
<tr>
    <td> 2 </td>
    <td> Category 2 </td>
    <td> 4/10/19 </td>
    <td> 5/11/20 </td>
    <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button>  <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
</tr>
<tr>
    <td> 3 </td>
    <td> Category 3 </td>
    <td> 4/10/19 </td>
    <td> 5/11/20 </td>
    <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button>  <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
</tr>
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
</body>
</html>
