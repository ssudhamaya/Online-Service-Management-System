<?php

define('TITLE', 'Change Password');
define('PAGE', 'Requesterchangepass');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$email_mobile=$_SESSION['email-mobile'];

if(isset($_REQUEST['passupdate'])){
    if(isset($_REQUEST['rPassword']) == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $rPass = password_hash($_REQUEST['rPassword'],PASSWORD_BCRYPT);
        $sql = "UPDATE c_login SET password = '$rPass' WHERE email = '$email_mobile'";
        if($conn->query($sql) == TRUE){
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" style="font-weight:bold; font-size:20px;">Updated Successfully</div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" style="font-weight:bold; font-size:20px;">Unable to Update</div>';
        }
    }
}
?>

<div class="col-sm-9 col-md-10">
    <!-- Start User Change Password Form 2nd Column -->
    <form class="mt-5 mx-5" action="" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email or Mobile</label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $email_mobile; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputnewpassword">New Password</label>
            <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="rPassword">
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
        <?php if(isset($passmsg)){echo $passmsg;} ?>
    </form>
</div> <!-- End User Change Password Form 2nd Column -->

<?php

include('includes/footer.php');

?>
