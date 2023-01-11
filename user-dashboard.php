<?php
error_reporting(0);
include("form_handling/login.php");
include("form_handling/profile.php");
include("./db/db_connection.php");
include("./form_handling/checkLogin.php");
checkLogin();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->

    <style>
        body {
            background-image: url("./images/img1\ 1.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            margin-top: 12%;
            width: 70%;
            background-color: whitesmoke;
            padding: 40px;
            border-radius: 7px;
        }

        span {
            float: right;
        }

        .toLeft {
            float: right;
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
        <div class="alert alert-primary" role="alert">
            <?php
            $key = $_SESSION["login"];
            $res = mysqli_query($con, "SELECT *  FROM `profile_tbl` WHERE Application_ID = '$key'");
            $data = mysqli_fetch_assoc($res);
            ?>
            Welcome Back! <b>
                <?php echo $data["FullNAme"]; ?>
            </b>
            <span>
                <a href="./form_handling/logout.php" class="btn btn-danger">Logout</a>
            </span>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>Profile Details</b>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="./form_handling/profile.php" method="post">
                            <input type="hidden" value="<?php echo $data["Application_ID"]; ?>" name="id">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Full name</b> </label>
                                        <input type="text" class="form-control" placeholder="Full Name"
                                            value="<?php echo $data["FullNAme"]; ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Email</b> </label>
                                        <input type="text" class="form-control" placeholder="Email"
                                            value="<?php echo $data["Email"]; ?>" readonly>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Phone</b> </label>
                                        <input type="text" class="form-control" placeholder="Phone"
                                            value="<?php echo $data["Phone"]; ?>" name="phone" required <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Gender</b> </label>
                                        <select name="gender" id="" class="form-control" required <?php
                                        if ($data["completed"] == "1") {
                                            ?> readonly <?php
                                        }

                                        ?>>
                                            <?php
                                            if ($data["Gender"] == "Male") {
                                                ?>
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>

                                                <?php
                                            } else {
                                                ?>
                                                <option value="Female" selected>Female</option>
                                                <option value="Male">Male</option>
                                                <?php

                                            }
                                            ?>


                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Age</b> </label>
                                        <input type="number" class="form-control" placeholder="Age" name="age"
                                            value="<?php echo $data["Age"]; ?>" required <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }
                                               ?>>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Application ID</b> </label>
                                        <input type="text" class="form-control" readonly
                                            value="<?php echo $data["Application_ID"]; ?>">

                                    </div>
                                </div>

                            </div>
                            <input type="submit" value="Save to continue" class="btn btn-primary" name="profile" <?php
                            if ($data["completed"] == "1") {
                                ?> disabled <?php
                            }

                            ?>>

                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <b>Academic Details</b>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <?php
                        $academic = mysqli_query($con, "SELECT *  FROM `academic_tbl` WHERE Application_ID = '$key'");
                        $academicRecord = mysqli_fetch_assoc($academic);




                        ?>

                        <form action="./form_handling/academic.php" method="post">
                            <input type="hidden" value="<?php echo $data["Application_ID"]; ?>" name="id">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Registration No.</b> </label>
                                        <input type="text" class="form-control" placeholder="Reg.No" name="reg" required
                                            value="<?php echo $academicRecord["regNo"]; ?>" <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Institution Name</b> </label>
                                        <input type="text" class="form-control" placeholder="Institution Name"
                                            name="institution" required
                                            value="<?php echo $academicRecord["institution"]; ?>" <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Department</b> </label>
                                        <input type="text" class="form-control" placeholder="Department"
                                            name="department" required
                                            value="<?php echo $academicRecord["department"]; ?>" <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Program</b> </label>
                                        <input type="text" class="form-control" placeholder="Program" name="program"
                                            required value="<?php echo $academicRecord["program"]; ?>" <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Level</b> </label>
                                        <input type="text" class="form-control" placeholder="Level" name="level"
                                            required value="<?php echo $academicRecord["level"]; ?>" <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Current CGPA</b> </label>
                                        <input type="text" class="form-control" placeholder="CGPA" name="cgpa" required
                                            value="<?php echo $academicRecord["cgpa"]; ?>" <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>

                                    </div>
                                </div>

                            </div>
                            <input type="submit" value="Save to continue" class="btn btn-primary" name="academic" <?php
                            if ($data["completed"] == "1") {
                                ?> disabled <?php
                            }

                            ?>>

                        </form>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <b>Idea Details</b>
                    </button>

                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php
                        $idea = mysqli_query($con, "SELECT * FROM `idea_tbl` WHERE application_ID = '$key'");
                        $ideaRecord = mysqli_fetch_assoc($idea);

                        ?>
                        <form action="./form_handling/idea.php" method="post">
                            <input type="hidden" value="<?php echo $data["Application_ID"]; ?>" name="id">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Idea Title</b> </label>
                                        <input type="text" class="form-control" placeholder="Idea Title" name="title"
                                            value="<?php echo $ideaRecord["ideaTitle"]; ?>" required <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""><b>Idea Description</b> </label>
                                        <textarea name="description" id="" cols="10" rows="4" class="form-control"
                                            required <?php
                                            if ($data["completed"] == "1") {
                                                ?> readonly <?php
                                            }

                                            ?>>
                                            <?php
                                            if ($ideaRecord["ideaTitle"]) {
                                                echo $ideaRecord["ideaTitle"];
                                            } else {
                                                echo "Idea Description";
                                            }

                                            ?>
                                            
                                            </textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for=""> <b>Video Url</b> </label>
                                        <input type="text" class="form-control" placeholder="Url Link" name="url"
                                            required value="<?php echo $ideaRecord["videoUrl"]; ?>" <?php
                                               if ($data["completed"] == "1") {
                                                   ?> readonly <?php
                                               }

                                               ?>>
                                        <p><b>Note:</b> A link to a 5 min video introducing yourself and idea</p>

                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save to continue" name="idea" <?php
                            if ($data["completed"] == "1") {
                                ?> disabled <?php
                            }

                            ?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="./form_handling/idea.php" method="post">
            <input type="hidden" value="<?php echo $data["Application_ID"]; ?>" name="id">
            <input type="submit" class="btn btn-primary mt-3" value="Submit" name="complete" <?php
            if ($data["completed"] == "1") {
                ?> disabled <?php
            }

            ?>>
            <p class="text-danger"><b>Note:</b> Record can't be edited after submission!!!</p>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>