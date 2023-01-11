<?php

session_start();
include_once("../db/db_connection.php");

if(isset($_POST["profile"])){

    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];

    $id = $_POST["id"];

    $res = mysqli_query($con, "UPDATE `profile_tbl` SET `Phone`='$phone',`Gender`='$gender',`Age`='$age' WHERE Application_ID = '$id'");
    if($res){
        $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible" role="alert">
        Update Successful.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      header("location: ../user-dashboard.php");
    }else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Ooops, Something went wrong.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      header("location: ../user-dashboard.php");
    }

}


?>