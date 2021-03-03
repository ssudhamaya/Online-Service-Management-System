<?php 
 
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$email_mobile=$_SESSION['email-mobile'];
if(isset($_REQUEST['nameupdate'])){
    if($_REQUEST['full_Name'] == ""){
        $error="*Fill The Box with Correct Details.";
    }else{
        $rName=$_REQUEST['full_Name'];
        $sql="UPDATE c_login SET full_name= '$rName' WHERE email='$email_mobile' OR mobile='$email_mobile'";
        if($conn->query($sql) == TRUE){
            $error='<div class="alert alert-info mt-4" style="font-weight:bold; font-size:20px;">Data Updated Successfully.<br>You Need to logout and login again to show the Updated Name.</div>';
        }
    }
}

?>


<div class="col-sm-6 mt-5">
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="email-mobile">Your Email Or Mobile</label><input type="text" class="form-control" name="email-mobile" id="email-mobile" value="<?php echo $email_mobile; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="full_name">Full Name</label><input type="text" class="form-control" name="full_Name" id="full_name" value="<?php echo $_SESSION['full_name'] ?>">
        </div>
        <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
        <div class="" style="color:red;">
            <?php if(!empty($error)){echo $error;} ?>
        </div>
    </form>
</div>

<?php

include('includes/footer.php');

?>
