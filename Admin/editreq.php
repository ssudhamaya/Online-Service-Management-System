<?php    
define('TITLE', 'Update Requester');
define('PAGE', 'requesters');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>

<!-- Start 2nd COlumn -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Requester Details</h3>
    <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM c_login WHERE user_id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['user_id'] == "") || ($_REQUEST['full_name'] == "") || ($_REQUEST['email'] == "")){
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fileds</div>';
    } else {
     $rid = $_REQUEST['user_id'];
     $rname = $_REQUEST['full_name'];
     $remail = $_REQUEST['email'];
     $sql = "UPDATE c_login SET user_id = '$rid', full_name = '$rname', email = '$remail' WHERE user_id = '$rid'";
     if($conn->query($sql) ==  TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
     } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
     }
    }
   }
  ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="user_id">Requester ID</label>
            <input type="text" class="form-control" name="user_id" id="user_id" Value="<?php if(isset($row['user_id'])) { echo $row['user_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="full_name">Name</label>
            <input type="text" class="form-control" name="full_name" id="rfull_name" Value="<?php if(isset($row['full_name'])) { echo $row['full_name']; } ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" Value="<?php if(isset($row['email'])) { echo $row['email']; } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="requester.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg; } ?>
    </form>
</div> <!-- End 2nd COlumn -->

<?php
include('includes/footer.php'); 
?>
