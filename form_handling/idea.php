<?php
session_start();
include_once("../db/db_connection.php");

if (isset($_POST["idea"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $url = $_POST["url"];

    $id = $_POST["id"];


    $sql = "UPDATE `idea_tbl` SET `ideaTitle`='$title',`ideaDescription`='$description',`videoUrl`='$url' WHERE application_ID = '$id'";
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

if(isset($_POST["complete"])){
  $id = $_POST["id"];
  $re = mysqli_query($con, "UPDATE `profile_tbl` SET `completed`='1' WHERE Application_ID = '$id'");
  if($re){

    $_SESSION["msg"] = '<div class="alert alert-success alert-dismissible" role="alert">
        Registration Completed.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      header("location: ../user-dashboard.php");

  }
  else{
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