<?php
session_start();
include_once("../db/db_connection.php");

if(isset($_POST["academic"])){
    $reg = $_POST["reg"];
    $institution = $_POST["institution"];
    $department = $_POST["department"];
    $program = $_POST["program"];
    $level = $_POST["level"];
    $cgpa = $_POST["cgpa"];
    $id = $_POST["id"];

    
    $sql = "UPDATE `academic_tbl` SET `regNo`='$reg',`institution`='$institution',`department`='$department',`program`='$program',`level`='$level',`cgpa`='$cgpa' WHERE application_ID = '$id'";
    $res = mysqli_query($con, $sql);
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