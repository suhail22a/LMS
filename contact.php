<?php
session_start();
if (isset($_SESSION['msg'])) { ?>
    <div class="<?php echo $_SESSION['msg_type'] == 'success' ? 'succWrap' : 'errorWrap'; ?>">
        <strong><?php echo $_SESSION['msg_type'] == 'success' ? 'SUCCESS' : 'ERROR'; ?></strong>: 
        <?php echo htmlentities($_SESSION['msg']); ?>
    </div>
    <?php 
    unset($_SESSION['msg']);
    unset($_SESSION['msg_type']);
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Open Sans', sans-serif;
        }

        .header-line {
            font-size: 30px;
            color: #333;
            font-weight: bold;
            margin-top: 30px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .panel {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 30px;
            margin-top: 40px;
            animation: slideUp 0.8s ease;
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .panel-heading {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 22px;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2);
        }

        .btn-info {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            border-radius: 30px;
            display: block;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-info:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .succWrap, .errorWrap {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            width: 100%;
        }

        .succWrap {
            background: #28a745;
            color: #fff;
        }

        .errorWrap {
            background: #dc3545;
            color: #fff;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .panel {
                padding: 20px;
            }

            .btn-info {
                padding: 12px;
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <h2 class="header-line">Contact Us</h2>
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Send Us a Message</div>
                    <div class="panel-body">
                        <form method="post" action="process_contact.php">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
