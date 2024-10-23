<?php
session_start();
error_reporting(0);
include('includes/config.php');

if ($_SESSION['alogin'] != '') {
    $_SESSION['alogin'] = '';
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT UserName, Password FROM admin WHERE UserName=:username and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style>
        body {
            background: url('./assets/img/b1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar styles */
        .navbar {
            background: rgba(240, 248, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar .navbar-brand,
        .navbar .navbar-nav .nav-link {
            color: #6a11cb !important;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #2575fc !important;
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px);
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .panel {
            border-radius: 15px;
            background-color: #f8f9fa; /* Solid background color */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease-in-out; /* Animation transition */
        }

        .panel:hover {
            transform: scale(1.05); /* Card scaling effect on hover */
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        .panel-heading {
            color: #333;
            font-size: 24px;
            text-align: center;
            padding: 15px;
        }

        .panel-body {
            padding: 40px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.5);
            outline: none;
        }

        .btn {
            background: #6a11cb;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn:hover {
            background: #2575fc;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .help-block {
            font-size: 14px;
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        @media (max-width: 768px) {
            .panel {
                margin: 20px;
            }

            .content-wrapper {
                padding-top: 30px;
                padding-bottom: 30px;
            }
        }
    </style>
</head>

<body>
    <!-- MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12 text-center">
                    <h4 class="header-line">ADMIN LOGIN FORM</h4>
                </div>
            </div>

            <!-- LOGIN PANEL START -->
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-10 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">LOGIN FORM</div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Enter Username</label>
                                    <input class="form-control" type="text" name="username" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>

                                <button type="submit" name="login" class="btn btn-info">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN PANEL END -->
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
