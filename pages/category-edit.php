<?php
$page = "Category Edit";
include("../header-n-sidebar.php");

include("../config.php");
// get all school data 

$cat_id = $_GET["cat_id"]; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Edit 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category Edit</li>
      </ol>
    </section> <br><br>

    <!-- Main content -->
    <section class="content">
    
     


     
     <div class="row" id="edit_category">
         <div class="col-md-4"></div>
         <div class="col-md-4 text-center new_category_form">
         <h2 class="text-center" style="margin-bottom:30px;">Edit Category</h2>
         <form class="form" method="POST" action="/controllers/sub-category-lvl1.php" >
            <div class="form-group">
        <?php
        if (true) {
            ?>
              <div class="row">
                  <div class="col-md-4"> <label for="parent_category">Parent Category:</label> </div>
                  <div class="col-md-8">
                       <select id="parent_category" name="parent_category" class="form-control"> 
                       <option value="">NAN</option>
                       </select>
                  </div>
               </div>

            <?php
        }
        else {
            ?>
              <input type="hidden" value="0" name="parent_category" id="parent_category">
            <?php
        }
        ?>
               <br>
               <div class="row">
                  <div class="col-md-4"> <label for="category_name">Category Name:</label> </div>
                  <div class="col-md-8"> <input type="text" id="category_name" name="category_name" class="form-control"> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="category_logo"><img src="/dist/img/avatar.png" height="50px" width="50px"> Logo:</label> </div>
                  <div class="col-md-8"> <input type="file" id="category_logo" name="category_logo" class="form-control"> </div>
               </div>
            </div>

         

            <div class="text-center"><button class="btn btn-success">Save</button></div>
         </form>
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
