<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">Technician</a></nav>

    <!-- Start Container -->
    <div class="container-fluid" style="margin-top:40px;">
        <div class="row">
            <!-- Start Row -->
            <nav class="col-sm-2 bg-dark sidebar py-5 d-print-none">
                <!-- Start Side Bar 1st Column -->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>" href="dashboard.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-tachometer-alt"></i><b style="margin-left:10px;">Dashboard</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'work'){echo 'active';} ?>" href="work.php" style="color:#22c1c3; font-size:20px;"><i class="fab fa-accessible-icon"></i><b style="margin-left:10px;">Work Order</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'request'){echo 'active';} ?>" href="request.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-align-center"></i><b style="margin-left:10px;">Requests</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'assets'){echo 'active';} ?>" href="assets.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-database"></i><b style="margin-left:10px;">Assets</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'technician'){echo 'active';} ?>" href="technician.php" style="color:#22c1c3; font-size:20px;"><i class="fab fa-teamspeak"></i><b style="margin-left:10px;">Technician</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'requesters'){echo 'active';} ?>" href="requester.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-users"></i><b style="margin-left:10px;">Requesters</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'sellreport'){echo 'active';} ?>" href="soldproductreport.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-table"></i><b style="margin-left:10px;">Sell Report</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'workreport'){echo 'active';} ?>" href="workreport.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-table"></i><b style="margin-left:10px;">Work Report</b></a></li>

                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';} ?>" href="changepass.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-key"></i><b style="margin-left:5px;">Change Password</b></a></li>

                        <li class="nav-item"><a class="nav-link" href="../logout.php" style="color:#22c1c3; font-size:20px;"><i class="fas fa-sign-out-alt"></i><b style="margin-left:10px;">Logout</b></a></li>
                    </ul>
                </div>
            </nav> <!-- End Side Bar 1st Column -->
