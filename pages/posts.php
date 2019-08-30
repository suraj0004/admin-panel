<?php
$page = "posts";
include("../header-n-sidebar.php");

include("../config.php");
// cat 1

$sql = "SELECT * FROM `cat` WHERE `level` = 1 ";
$cat1_res = $conn->query($sql);

$sql = "SELECT * FROM `cat` WHERE `level` = 2 ";
$cat2_res = $conn->query($sql);

$sql = "SELECT * FROM `cat` WHERE `level` = 3 ";
$cat3_res = $conn->query($sql);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Posts</li>
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
         <div class="col-md-2"></div>
         <div class="col-md-8 text-center new_category_form">
         <h2 class="text-center" style="margin-bottom:30px;">Add New POST</h2>
         <form class="form" method="POST" action="/controllers/sub-posts.php" enctype="multipart/form-data">
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_title">POST Title:</label> </div>
                  <div class="col-md-8"> <input type="text" id="post_title" name="post_title" class="form-control"> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_des">POST Description:</label> </div>
                  <div class="col-md-8"> <textarea type="text" id="post_des" name="post_des" class="form-control"> </textarea> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="post_image">POST Image:</label> </div>
                  <div class="col-md-8"> <input type="file" id="post_image" name="post_image" class="form-control"> </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="cat_1">Categor Lvl 1:</label> </div>
                  <div class="col-md-8"> <select type="text" id="cat_1" name="cat_1" class="form-control" onchange="showChild(this.value)">
                  <option selected value="">--SELECT--</option>
                  <?php
                  
                    while ($row = $cat1_res->fetch_assoc()) {
                        ?>
                        <option value="<?=$row["id"]?>"><?=$row["cat_name"]?></option>
                        <?php
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
                    while ($row = $cat2_res->fetch_assoc()) {
                        ?>
                        <option style="display:none;" value="<?=$row["id"]?>" class="<?=$row["parent_id"]?>" ><?=$row["cat_name"]?></option>
                        <?php
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
                    while ($row = $cat3_res->fetch_assoc()) {
                        ?>
                        <option style="display:none;" value="<?=$row["id"]?>" class="<?=$row["parent_id"]?>" ><?=$row["cat_name"]?></option>
                        <?php
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
  



<br><br>
<div class="container-fluid" id="category_list_tabel">
<div class="table-responsive">
<table class="table table-striped" id="myTable">

<thead>
<tr>
    <th class="h4"> # </th>
    <th class="h4"> Title </th>
    <th class="h4"> Image </th>
    <th class="h4">Category</th>
    <th class="h4"> Created at </th>
    <th class="h4"> Modified at </th>
    <th class="h4"> Actions </th>
</tr>
</thead>

<tbody>
  <?php 
  $get = "SELECT * FROM posts"; 
  $result = mysqli_query($conn,$get);
  $i=1;
  while($data = mysqli_fetch_assoc($result)){

    $sql = "SELECT cat_name FROM `cat` WHERE `id` = '".$data['cat_1']."' ";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $cat_1 = $row["cat_name"];
    
    $sql = "SELECT cat_name FROM `cat` WHERE `id` = '".$data['cat_2']."' ";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $cat_2 = $row["cat_name"];
    
    $sql = "SELECT cat_name FROM `cat` WHERE `id` = '".$data['cat_3']."' ";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $cat_3 = $row["cat_name"];
      ?>
<tr>
    <td> <?php echo $i; ?> </td>
    <td> <?php echo $data['title']; ?> </td>
    <td> <img src="/controllers/<?=$data["img"]?>" height="50px" width="50px"> </td>
    <td> <?php if (!empty($cat_1)) {
        if (!empty($cat_2) && !empty($cat_3) ) {
        echo $cat_1." / ".$cat_2." / ".$cat_3;
      }
      else if (!empty($cat_2)) {
         echo $cat_1." / ".$cat_2;
      } else {
         echo $cat_1;
      }
    }?> </td>
    <td> <?php echo $data['created_at']; ?> </td>
    <td> <?php echo $data['updated_at']; ?>  </td>
    <td> 
    <a href="view-post.php?id=<?=$data["id"]?>" class="btn btn-success"> <i class="fa fa-file"></i> </a>
        <a href="post-edit.php?id=<?=$data["id"]?>" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
    <a href="/controllers/delete.php?id=<?php echo $data['id'];?>&p_id=POST"class="btn btn-danger"> <i class="fa fa-trash"></i> </a>  </td>

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
<script type="text/javascript">$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
</body>
</html>
