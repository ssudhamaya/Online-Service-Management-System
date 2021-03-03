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
if(isset($_REQUEST['reqsubmit'])){
  if(($_REQUEST['full_name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $rname = $_REQUEST['full_name'];
    $rEmail = $_REQUEST['email'];
    $rPassword = $_REQUEST['password'];
    $screenName = $rname;
    $screenRand = rand();
    $userLink = ''.$screenName.''.$screenRand.'';
    $userLink = $screenName;
    $sql = "INSERT INTO c_login (full_name, email, password, screenName, userLink) VALUES ('$rname', '$rEmail', '$rPassword', '$screenName', '$userLink')";
    if($conn->query($sql) == TRUE){
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
    } else {
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
    }
  }
  }
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5  mx-3 jumbotron">
    <h3 class="text-center">Add New Requester</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="full_name">Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
            <a href="requester.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg; } ?>
    </form>
</div>

<?php
include('includes/footer.php'); 
?>
