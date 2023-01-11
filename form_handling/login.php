<?php

session_start();

include_once("../db/db_connection.php");

if(isset($_POST["Signin"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `profile_tbl` WHERE Email = '$email' AND Password = '$password'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
        // echo "Found";
        $data = mysqli_fetch_assoc($res);

        $_SESSION["login"] = $data["Application_ID"];

        header("location: ../user-dashboard.php");
    }else{

        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Wrong Email Or Password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      header("location: ../index.php");
    }

}



?>