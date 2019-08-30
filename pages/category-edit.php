<?php
$page = "Category Lvl ".$_GET["lvl"];

include("../header-n-sidebar.php");

include("../config.php");
// get all school data 

$id = $_GET["id"]; 
$lvl = $_GET["lvl"];

if ($lvl == 2) {
    $p_sql = "SELECT id,cat_name FROM cat WHERE parent_id = 0 "; 
    $p_result = mysqli_query($conn,$p_sql);  
}

if ($lvl == 3) {
    $sql = "SELECT id,cat_name FROM cat WHERE parent_id = 0 ";
$result = mysqli_query($conn,$sql);
$parent = array();
while ($row = mysqli_fetch_assoc($result)) {
  array_push($parent,$row["id"]);
}

$data = array();

foreach ($parent as $parent_id) {
    $sql = "SELECT id,cat_name FROM cat WHERE parent_id = '$parent_id' ";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
       $temp = array(
           "id" => $row["id"],
           "cat_name" => $row["cat_name"]
       );
       array_push($data,$temp);
    }
}
}





$sql = "SELECT * FROM cat WHERE id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$image = $row["cat_logo"];
$image = explode("/",$image);
$image = $image[count($image)-1];
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
         <form class="form" method="POST" action="/controllers/sub-cat-edit.php" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?=$row["id"]?>">
            <div class="form-group">
        <?php
        if ($row["parent_id"] != 0 ) {
            ?>
              <div class="row">
                 
                  <div class="col-md-4"> <label for="parent_category">Parent Category:</label> </div>
                  <div class="col-md-8">
                       <select id="parent_category" name="parent_category" class="form-control"> 
                      <?php
                       if ($lvl == 2) {
                        
                        while ($p_row = mysqli_fetch_assoc($p_result)) {
                            if ($p_row["id"] == $row["parent_id"]) {
                               ?>
                                 <option selected value="<?=$p_row["id"]?>"><?=$p_row["cat_name"]?></option>
                               <?php
                            } else {
                                ?>
                              <option value="<?=$p_row["id"]?>"><?=$p_row["cat_name"]?></option>
                            <?php
                            }
                            
                          
                        }
                        echo '</select><input type="hidden" name="sub-cat" value="2">';
                       } else {
                        foreach ($data as $key) {
                            
                       if ($key["id"] == $row["parent_id"]) {
                           ?>
                                <option selected value="<?=$key["id"]?>"><?=$key["cat_name"]?></option>
                            <?php
                       } else {
                           ?>
                                <option value="<?=$key["id"]?>"><?=$key["cat_name"]?></option>
                            <?php
                       }
                       

                          
                        }
                        echo '</select><input type="hidden" name="sub-cat" value="3">';
                       }
                       
                      ?>
                       
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
                  <div class="col-md-8"> <input type="text" id="category_name" name="category_name" class="form-control" value="<?=$row["cat_name"]?>"> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="category_logo"><img src="/controllers/<?=$row["cat_logo"]?>" height="50px" width="50px"> Logo:</label> </div>
                  <div class="col-md-8"> <input type="file" id="category_logo" name="category_logo" class="form-control">
                   <input type="hidden" value="<?=$image?>" name="current_img">
                  </div>
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
