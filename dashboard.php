<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0) { 
    header('location:index.php');
} else { ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        body {
            background: rgba(0, 0, 0, 0.6) url('./assets/img/b1.jpg') no-repeat center center fixed; 
            background-size: cover;
            font-family: 'Open Sans', sans-serif;
            color: #fff;
            padding-top: 50px;
        }

        .header-line {
            font-size: 36px;
            text-align: center;
            margin-bottom: 40px;
            color: #ffcc00;
            animation: fadeInDown 1s ease-in-out;
        }

        .back-widget-set {
            background-color: #ffffff;  /* Simple white background */
            color: #333;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            transition: all 0.4s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            opacity: 0;  /* Start with opacity 0 for fade-in effect */
            animation: fadeIn 0.6s forwards;  /* Fade-in animation */
            height: auto;  /* Allow cards to grow based on content */
            min-height: 180px;  /* Set a minimum height */
        }

        @keyframes fadeIn {
            to {
                opacity: 1;  /* Final opacity after fade-in */
            }
        }

        .back-widget-set:hover {
            transform: scale(1.05);  /* Scale up on hover */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
        }

        .back-widget-set i {
            animation: bounce 2s infinite;
            color: #333;
        }

        .alert h3 {
            font-size: 28px;
            font-weight: bold;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .header-line {
                font-size: 28px;
            }

            .back-widget-set {
                padding: 20px;
                height: auto;  /* Allow for automatic height on smaller screens */
                min-height: 150px;  /* Minimum height for mobile view */
            }
        }
    </style>
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line animate__animated animate__fadeInDown">User DASHBOARD</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="alert alert-info back-widget-set text-center">
                        <a href = 'issued-books.php'><i class="fa fa-bars fa-5x"></i></a>
                        <?php 
                        $sid=$_SESSION['stdid'];
                        $sql1 ="SELECT id from tblissuedbookdetails where StudentID=:sid";
                        $query1 = $dbh -> prepare($sql1);
                        $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
                        $query1->execute();
                        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                        $issuedbooks=$query1->rowCount();
                        ?>
                        <h3><?php echo htmlentities($issuedbooks); ?> </h3>
                        Book Issued
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="alert alert-warning back-widget-set text-center">
                    <a href = 'my-profile.php'><i class="fa fa-user fa-5x"></i></a>
                        <br><br><br>
                        My Profile
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="alert alert-danger back-widget-set text-center">
                    <a href = 'request-a-book.php'><i class="fa fa-paper-plane fa-5x"></i></a>
                        <br><br><br>
                        Request a book
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE LOADING TIME -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
