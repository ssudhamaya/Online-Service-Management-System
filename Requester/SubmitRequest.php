<?php

define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
$email_mobile=$_SESSION['email-mobile'];
if(isset($_REQUEST['submitrequest'])){
 // Checking for empty fields 
 if(($_REQUEST['electronicstype'] == "") || ($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
  $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2' style='font-weight:bold; font-size:20px;'>Fill All Fields Clearly!</div>";
 } else {
    $rtype = $_REQUEST['electronicstype'];
    $rinfo = $_REQUEST['requestinfo'];
    $rdesc = $_REQUEST['requestdesc'];
    $rname = $_REQUEST['requestername'];
    $radd1 = $_REQUEST['requesteradd1'];
    $radd2 = $_REQUEST['requesteradd2'];
    $rcity = $_REQUEST['requestercity'];
    $rstate = $_REQUEST['requesterstate'];
    $rzip = $_REQUEST['requesterzip'];
    $remail = $_REQUEST['requesteremail'];
    $rmobile = $_REQUEST['requestermobile'];
    $rdate = $_REQUEST['requestdate'];
    $sql = "INSERT INTO submitrequest_tb(electronics_type,request_info, request_desc, requester_name, requester_add1,requester_add2,requester_city,requester_state,requester_zip,requester_email,requester_mobile,request_date)VALUES('$rtype','$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate', '$rzip','$remail','$rmobile','$rdate')";
    if($conn->query($sql) == TRUE){
        $genid = mysqli_insert_id($conn);
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" style="font-weight:bold; font-size:20px;">Request Submitted Sucessfully !</div>';
        $_SESSION['myid'] = $genid;
        echo "<script> location.href='submitrequestsuccess.php'</script>";
     }else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" style="font-weight:bold; font-size:20px;">Unable to Submit Your Request !</div>';
     }
 }
}
?>

<div class="col-sm-9 col-md-10 mt-5">
    <!-- Start Service Request Form 2nd Column -->
    <form class="mx-5" action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputGroupSelect1">Electronics Type</label>
                <select class="custom-select" id="inputGroupSelect1" name="electronicstype">
                    <option selected></option>
                    <option value="Mobile and Accessories">1- Mobile and Accessories</option>
                    <option value="Computor and Accessories">2- Computor and Accessories</option>
                    <option value="Television and Accessories">3- Television and Accessories</option>
                    <option value="Home Appliances">4- Home Appliances</option>
                    <option value="Kitchen Appliances">5- Kitchen Appliances</option>
                    <option value="Washing Appliances">6- Washing Appliances</option>
                    <option value="Others">7- Others</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputRequestInfo">Problem Info</label>
                <input type="text" class="form-control" id="inputRequestInfo" placeholder="information or Topic of your Problem" name="requestinfo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputRequestDescription">Description</label>
                <textarea class="form-control" id="inputRequestDescription" name="requestdesc" placeholder="Write The Complete Description Of Your Problem"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Full Name" name="requestername">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address Line 1</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="House No./At/Post/Dist" name="requesteradd1">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Landmark" name="requesteradd2">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="requestercity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" name="requesterstate">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="requesteremail">
            </div>
            <div class="form-group col-md-2">
                <label for="inputMobile">Mobile</label>
                <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group col-md-2">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="inputDate" name="requestdate">
            </div>
        </div>
        <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
    <?php if(isset($msg)){echo $msg;} ?>
</div> <!-- End Service Request Form 2nd Column -->

<!-- Only Number for Input Fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }

</script>

<?php

include('includes/footer.php');

?>
