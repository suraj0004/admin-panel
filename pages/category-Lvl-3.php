
<?php
$page = "Category Lvl 3";
include("../header-n-sidebar.php");

include("../config.php");
// get all school data 
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
         <form class="form" method="POST" action="/controllers/sub-category-lvl3.php" enctype="multipart/form-data">
         <div class="form-group">
               <div class="row">
                  <div class="col-md-4"> <label for="parent_category">Parent Sub-Category:</label> </div>
                  <div class="col-md-8">
                       <select id="parent_category" name="parent_category" class="form-control"> 
                      <?php
                    foreach ($data as $key) {
                        ?>
                            <option value="<?=$key["id"]?>"><?=$key["cat_name"]?></option>
                        <?php
                    }
                      ?>
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
    <th class="h3">Logo</th>
    <th class="h3"> Created at </th>
    <th class="h3"> Modified at </th>
    <th class="h3"> Actions </th>
</tr>
</thead>

<tbody>
    <?php
    $sql = "SELECT * FROM cat WHERE level = '3' ";
$result = mysqli_query($conn,$sql);
    $i = 0;
     while($row = mysqli_fetch_assoc($result))
     {
         $i++;
        ?>
        <tr>
    <td> <?=$i?> </td>
    <td> <?=$row["cat_name"]?> </td>
      <td> <img src="/controllers/<?=$row["cat_logo"]?>" height="50px" width="50px"> </td>
    <td>  <?=$row["created_at"]?> </td>
    <td>  <?=$row["updated_at"]?> </td>
    <td>  <a href="category-edit.php?id=<?=$row["id"]?>&lvl=3" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
    <a href="/controllers/delete.php?id=<?php echo $row['id'];?>&p_id=3"class="btn btn-danger"> <i class="fa fa-trash"></i> </a> </td>
</tr>
        <?php
     }
    ?>


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
