<?php

error_reporting(0);

include("form_handling/register.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        body {
            background-image: url("./images/img1\ 1.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header {
            margin-bottom: 20px;
            text-align: center;
        }

        .container {
            margin-top: 12%;
            width: 45%;
            background-color: whitesmoke;
            padding: 40px;
            border-radius: 7px;
        }

        span {
            float: right;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php
        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
        }

        unset($_SESSION["msg"]);



        ?>
        <h3 class="header">Sign up - Page</h3>
        <form action="./form_handling/register.php" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for=""><b>Full name</b> </label>
                        <input type="text" class="form-control" placeholder="Full Name" name="name" required>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for=""><b>Email</b> </label>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for=""><b>Phone</b> </label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" required>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for=""><b>Password</b> </label>
                        <input type="password" class="form-control" placeholder="password" name="password" required>

                    </div>
                </div>
            </div>


            <input type="submit" class="btn btn-primary" value="Sigup" name="Sigup">
            <span>have an account? <a href="./index.php">Login</a> </span>
        </form>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>