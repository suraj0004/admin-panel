<?php
$page = "post Edit";
include("../header-n-sidebar.php");

include("../config.php");
// get all school data 

$id = $_GET["id"]; 

$sql = "SELECT * FROM `cat` WHERE `level` = 1 ";
$cat1_res = $conn->query($sql);

$sql = "SELECT * FROM `cat` WHERE `level` = 2 ";
$cat2_res = $conn->query($sql);

$sql = "SELECT * FROM `cat` WHERE `level` = 3 ";
$cat3_res = $conn->query($sql);

$sql = "SELECT * FROM posts WHERE id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$image = $row["img"];
$image = explode("/",$image);
$image = $image[count($image)-1];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Edit 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Post Edit</li>
      </ol>
    </section> <br><br>

    <!-- Main content -->
    <section class="content">
    
     


     
    <div class="row" id="edit_post">
         <div class="col-md-2"></div>
         <div class="col-md-8 text-center new_category_form">
         <h2 class="text-center" style="margin-bottom:30px;">Edit POST</h2>
         <form class="form" method="POST" action="/controllers/sub-edit-post.php" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?=$row["id"]?>">
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_title">POST Title:</label> </div>
                  <div class="col-md-8"> <input value="<?=$row["title"]?>" type="text" id="post_title" name="post_title" class="form-control"> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_des">POST Description:</label> </div>
                  <div class="col-md-8"> <textarea value="<?=$row["description"]?>" type="text" id="post_des" name="post_des" class="form-control"> <?=$row["description"]?></textarea> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_image">  POST Image: <img src="/controllers/<?=$row["img"]?>" height="50px" width="50px"> </label> </div>
                  <div class="col-md-8"> <input  type="file" id="post_image" name="post_image" class="form-control"> 
                                    <input type="hidden" value="<?=$image?>" name="current_img">
                </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cat_1">Categor Lvl 1:</label> </div>
                  <div class="col-md-8"> <select type="text" id="cat_1" name="cat_1" class="form-control" onchange="showChild(this.value)">
                  
                 
                  <?php
                  
                    while ($row1 = $cat1_res->fetch_assoc()) {
                        if ($row1["id"] == $row["cat_1"]) {
                            ?>
                        <option selected value="<?=$row1["id"]?>"><?=$row1["cat_name"]?></option>
                        <?php
                        } else {
                           
                        ?>
                        <option value="<?=$row1["id"]?>"><?=$row1["cat_name"]?></option>
                        <?php  
                        }
                       
                    }
                  ?>
                  </select>
                   </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cat_2">Categor Lvl 2:</label> </div>
                  <div class="col-md-8"> <select type="text" id="cat_2" name="cat_2" class="form-control" onchange="showChild(this.value)">
                  <option selected value="">--SELECT--</option>
                  <?php
                    while ($row1 = $cat2_res->fetch_assoc()) {
                        if ($row1["id"] == $row["cat_2"]) {
                            ?>
                      <option selected style="display:none;" value="<?=$row1["id"]?>" class="<?=$row1["parent_id"]?>" ><?=$row1["cat_name"]?></option>
                        <?php
                        } else {
                           
                        ?>
                       <option style="display:none;" value="<?=$row1["id"]?>" class="<?=$row1["parent_id"]?>" ><?=$row1["cat_name"]?></option>
                        <?php  
                        }
                       
                    }
                  ?>
                     
                  </select>
                   </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cat_3">Categor Lvl 3:</label> </div>
                  <div class="col-md-8"> <select type="text" id="cat_3" name="cat_3" class="form-control">
                  <option selected value="">--SELECT--</option>
                  <?php
                    while ($row1 = $cat3_res->fetch_assoc()) {

                        if ($row1["id"] == $row["cat_3"]) {
                            ?>
                       <option selected style="display:none;" value="<?=$row1["id"]?>" class="<?=$row1["parent_id"]?>" ><?=$row1["cat_name"]?></option>
                        <?php
                        } else {
                           
                        ?>
                       <option style="display:none;" value="<?=$row1["id"]?>" class="<?=$row1["parent_id"]?>" ><?=$row1["cat_name"]?></option>
                        <?php  
                        }
                       
                    }
                  ?>
                      
                  </select>
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
