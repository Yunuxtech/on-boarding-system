<?php

include_once("../db/db_connection.php");

session_start();


function generateID(){
    $data = [1,2,3,4,5,6,7,8,9,0,"A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q"];
    $id = "";
    for ($i=0; $i <= 9; $i++) { 
        $value = $data[rand(0,26)];
        $id .= $value;
    }
    return $id;

}

// $_SESSION["msg"] = "";
if(isset($_POST["Sigup"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pass = $_POST["password"];
    $app_id = generateID();
    $sql = "INSERT INTO `profile_tbl`(`Application_ID`, `FullNAme`, `Email`, `Phone`, `Password`) VALUES ('$app_id','$name','$email','$phone','$pass')";

    mysqli_query($con, "INSERT INTO `academic_tbl`(`application_ID`) VALUEs ('$app_id')");
    mysqli_query($con, "INSERT INTO `idea_tbl`(`application_ID`) VALUES ('$app_id')");
    $res = mysqli_query($con, $sql);
    if($res){

        $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Register Successful.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    header("location: ../register.php");

    }
    else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Ooops, Something went wrong!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      header("location: ../register.php");

    }
    

}




?>