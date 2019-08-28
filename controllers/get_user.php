  <?php
  include("../config.php");
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
    <td> <a href="user-edit.php?id=<?=$data["id"]?>&lvl=1" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
    <a href="/controllers/delete_user.php?id=<?php echo $data['id'];?>&p_id=1"class="btn btn-danger"> <i class="fa fa-trash"></i> </a>  </td>
</tr>
<?php $i++; } ?>