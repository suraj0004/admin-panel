<?php
$page = "Category Lvl 2";
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
        Category Level 2 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category Level 2</li>
      </ol>
    </section> <br><br>

    <!-- Main content -->
    <section class="content">
           
    <!-- <div class="shadow p-3 mb-5 bg-white rounded">Regular shadow</div> -->

        <?php if ($result->num_rows == 0) {
         // echo "<h1 class='text-center'>No New School Requests!</h1>";
        }
        else{
            while ($rows = $result->fetch_assoc()) {
              ?>
               
<!-- <div class="row" style="border-bottom:1px solid grey;padding-bottom:10px;">
         <div class="col-md-1"></div>
         <div class="col-md-8 ">

          
           <div class="row text-center">
              <div class="col-md-6" style="margin-top:70px;">
               <img src="<?php //$siteUrl ?>/edu-joy/asset/img/site-logo.jpeg" class="img-fluid img-circle" height="200" width="200">
              </div>
              <div class="col-md-6" style="font-size:18px;">
                <table class="text-left">
                    <thead>
                      <tr>
                        <th colspan="2"><h2 class="text-center">School Information</h2></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><b> Name:</b></td>
                        <td><?php //$rows["name"] ?></td>
                      </tr>
                      <tr>
                        <td><b> Email:</b></td>
                        <td><?php //$rows["email"] ?></td>
                      </tr>
                      <tr>
                        <td><b> Phone:</b></td>
                        <td><?php //$rows["phone"] ?></td>
                      </tr>
                      <tr>
                        <td><b> Address:</b></td>
                        <td><?php //$rows["address"] ?></td>
                      </tr>
                      <tr>
                        <td><b> Type:</b></td>
                        <td><?php //$rows["type"] ?> School</td>
                      </tr>
                      <tr>
                        <td><b> Document:</b></td>
                        <td><?php //$rows["doc"] ?></td>
                      </tr>
                    </tbody>
                </table>
              </div>
              
           </div>
<br>
           <div class="row text-center">
            
              <button class="btn btn-danger" onclick='reject(<?=$rows["school_id"]?>)'><i class="fa fa-trash"></i></button>  
              <button type="button" class="btn btn-success" onclick='approve(<?=$rows["school_id"]?>)'><i class="fa fa-check"></i></button>
             </div>
         </div>
       </div>
       <br><br> -->


              <?php
            }
          }
        ?>
<div class="container">
<div class="table-responsive">
<table class="table">

<thead>
<tr>
    <th class="h3"> # </th>
    <th class="h3"> Category </th>
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


  <script src="/dist/js/custom.js"></script>
 <?php
include("../footer.php");
 ?>

