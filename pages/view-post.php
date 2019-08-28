<?php
$page = "post View";
include("../header-n-sidebar.php");

include("../config.php");
// get all school data 

$id = $_GET["id"]; 


$sql = "SELECT * FROM posts WHERE id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$image = $row["img"];
$image = explode("/",$image);
$image = $image[count($image)-1];

$sql = "SELECT cat_name FROM `cat` WHERE `id` = '".$row['cat_1']."' ";
$res = $conn->query($sql);
$row1 = $res->fetch_assoc();
$cat_1 = $row1["cat_name"];

$sql = "SELECT cat_name FROM `cat` WHERE `id` = '".$row['cat_2']."' ";
$res = $conn->query($sql);
$row1 = $res->fetch_assoc();
$cat_2 = $row1["cat_name"];

$sql = "SELECT cat_name FROM `cat` WHERE `id` = '".$row['cat_3']."' ";
$res = $conn->query($sql);
$row1 = $res->fetch_assoc();
$cat_3 = $row1["cat_name"];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Post 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Post</li>
      </ol>
    </section> <br><br>

    <!-- Main content -->
    <section class="content">
    
     


     
    <div class="row" id="edit_post">
         <div class="col-md-2"></div>
         <div class="col-md-8 text-center new_category_form">
         <h2 class="text-center" style="margin-bottom:30px;">View POST</h2>
        
      
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_title">POST Title:</label> </div>
                  <div class="col-md-8"> <?=$row["title"]?> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_des">POST Description:</label> </div>
                  <div class="col-md-8"> <?=$row["description"]?> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_image">  POST Image:  </label> </div>
                  <div class="col-md-8 img-fluid"> 
                  <img src="/controllers/<?=$row["img"]?>" class="img-responsive">
                </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cat_1">Categor Lvl 1:</label> </div>
                  <div class="col-md-8"> <?=$cat_1?>
                   </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cat_2">Categor Lvl 2:</label> </div>
                  <div class="col-md-8"> <?=$cat_2?>
                   </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cat_3">Categor Lvl 3:</label> </div>
                  <div class="col-md-8"> <?=$cat_3?>
                   </div>
               </div>
            </div>
            
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
