<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title><?php echo TITLE ?></title>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">Technician</a>
    </nav>
    <div class="container-fluid" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-dark sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item" style="margin-top:10px;"><a class="nav-link <?php if(PAGE == 'RequesterProfile'){echo 'active';} ?>" href="RequesterProfile.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-user"></i><b style="margin-left:10px;">Profile</b></a></li>

                        <li class="nav-item" style="margin-top:10px;"><a class="nav-link <?php if(PAGE == 'SubmitRequest'){echo 'active';} ?>" href="SubmitRequest.php" style="color:#22c1c3; font-size:20px;"><i class="fab fa-accessible-icon"></i><b style="margin-left:10px;">Submit Request</b></a></li>

                        <li class="nav-item" style="margin-top:10px;"><a class="nav-link <?php if(PAGE == 'CheckStatus'){echo 'active';} ?>" href="CheckStatus.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-align center"></i><b style="margin-left:10px;">Request Status</b></a></li>

                        <li class="nav-item" style="margin-top:10px;"><a class="nav-link <?php if(PAGE == 'Requesterchangepass'){echo 'active';} ?>" href="Requesterchangepass.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-key"></i><b style="margin-left:5px;">Change Password</b></a></li>

                        <li class="nav-item" style="margin-top:10px;"><a class="nav-link" href="../logout.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-sign-out-alt"></i><b style="margin-left:10px;">Log Out</b></a></li>
                    </ul>
                </div>
            </nav>
