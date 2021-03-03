<?php

require 'C:\xampp\htdocs\maintain\DB.php';
require 'core/load.php';

session_start();

if( isset($_POST['full-name']) && !empty($_POST['full-name'])){
    $upName = $_POST['full-name'];
    $upEmailMobile = $_POST['email-mobile'];
    $upPassword = $_POST['up-password'];

    if(empty($upName) or empty($upEmailMobile) or empty($upPassword)){
        $error = '*All fields are required';
    }else{
        $full_name = $loadFromUser->checkInput($upName);
        $email_mobile = $loadFromUser->checkInput($upEmailMobile);
        $password = $loadFromUser->checkInput($upPassword);
        $screenName = $full_name;
        if(DB::query('SELECT screenName FROM c_login WHERE screenName = :screenName', array(':screenName' => $screenName ))){
            $screenRand = rand();
            $userLink = ''.$screenName.''.$screenRand.'';
        }else{
            $userLink = $screenName;
        }
            if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email_mobile)){
                if(!preg_match("^[0-9]{10}^", $email_mobile)){
                    $error = '*Email or Mobile is not correct.';
                }else{
                    $mob = strlen((string)$email_mobile);

                    if($mob > 10 || $mob < 10){
                        $error = '*Mobile number is not valid';
                    }else if(strlen($password) <8 || strlen($password) >= 15){
                        $error = '*Password must be between 8-15 characters.';
                    }else{
                        if(DB::query('SELECT mobile FROM c_login WHERE mobile=:mobile', array(':mobile'=>$email_mobile))){
                            $error = '*This Mobile is already in use.';
                        }else{
                            $user_id=$loadFromUser->create('c_login', array('full_name'=>$full_name, 'mobile' => $email_mobile, 'password'=>password_hash($password, PASSWORD_BCRYPT),'screenName'=>$screenName,'userLink'=>$userLink));
                                $_SESSION['email-mobile'] = $email_mobile;
                                $_SESSION['full_name'] = $full_name;
                            header('Location: RequesterProfile.php');
                        }
                    }
                }
            }else{
                if(!filter_var($email_mobile)){
                    $error = "*Invalid Email Format";
                }else if(strlen($full_name) > 50){
                    $error = "*Name must be between 5-50 character";
                }else if(strlen($password) <8 && strlen($password) >= 15){
                    $error = "*Password must be between 8-15 characters.";
                }else{
                    if((filter_var($email_mobile,FILTER_VALIDATE_EMAIL)) && $loadFromUser->checkEmail($email_mobile) === true){
                        $error = "*Email is already in use";
                    }else{
                        $user_id = $loadFromUser->create('c_login', array('full_name'=>$full_name, 'email' => $email_mobile, 'password'=>password_hash($password, PASSWORD_BCRYPT),'screenName'=>$screenName,'userLink'=>$userLink));
                        $_SESSION['email-mobile'] = $email_mobile;
                        $_SESSION['full_name'] = $full_name;
                        header('Location: RequesterProfile.php');
                    }
                }
            }
    }
}

if(isset($_POST['in-email-mobile']) && !empty($_POST['in-email-mobile'])){
    $email_mobile = $_POST['in-email-mobile'];
    $in_pass = $_POST['in-pass'];

    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email_mobile)){
        if(!preg_match("^[0-9]{10}^", $email_mobile)){
            $error1 = '*Email or Phone is not correct.';
        }else{
            if(DB::query("SELECT mobile FROM c_login WHERE mobile = :mobile", array(':mobile'=>$email_mobile))){
                if(password_verify($in_pass, DB::query('SELECT password FROM c_login WHERE mobile=:mobile', array(':mobile'=>$email_mobile))[0]['password'])){
                    $user_id=DB::query('SELECT user_id FROM c_login WHERE mobile=:mobile', array(':mobile'=>$email_mobile))[0]['user_id'];
                    $full_name=DB::query('SELECT full_name FROM c_login WHERE mobile=:mobile', array(':mobile'=>$email_mobile))[0]['full_name'];
                        $_SESSION['email-mobile'] = $email_mobile;
                        $_SESSION['full_name'] = $full_name;
                    header('Location: RequesterProfile.php');
                }else{
                    $error1="*Password is not correct";
                }
            }else{
                $error1="*User hasn't found.";
            }
        }
    }else{
        if(DB::query("SELECT email FROM c_login WHERE email = :email", array(':email'=>$email_mobile))){
            if(password_verify($in_pass, DB::query('SELECT password FROM c_login WHERE email=:email', array(':email'=>$email_mobile))[0]['password'])){
                $user_id=DB::query('SELECT user_id FROM c_login WHERE email=:email', array(':email'=>$email_mobile))[0]['user_id'];
                $full_name=DB::query('SELECT full_name FROM c_login WHERE email=:email', array(':email'=>$email_mobile))[0]['full_name'];
                $_SESSION['email-mobile'] = $email_mobile;
                $_SESSION['full_name'] = $full_name;
                header('Location: RequesterProfile.php');
            }else{
                $error1="*Password is not correct";
            }
        }else{
            $error1="*User hasn't found.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css" />
    <title>LogIn Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <div class="error" style="float:right; color:red; margin-left:50px; font-weight:bold; font-size: 20px;">
                    <?php if(!empty($error1)){echo $error1;} ?>
                </div>
                <form action="login.php" method="post" class="sign-in-form">
                    <h2 class="title">Coustmer Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="in-email-mobile" placeholder="Email Or Mobile" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="in-pass" placeholder="Password" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                </form>
                <div class="error" style="float:right; color:red; margin-left:50px; font-weight:bold; font-size: 20px;">
                    <?php if(!empty($error)){echo $error;} ?>
                </div>
                <form action="login.php" method="post" class="sign-up-form">
                    <h2 class="title">Coustmer Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="full-name" placeholder="Full Name" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email-mobile" placeholder="Email Or Mobile" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="up-password" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Register with us. And enjoy all our services.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Sign in with Us. And Enjoy all our services.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>

</html>
