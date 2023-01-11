<?php
session_start();
include_once("../../db/db_connection.php");

if(isset($_POST["Signin"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $res = mysqli_query($con, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$password'");
    if(mysqli_num_rows($res) > 0){

        $data = mysqli_fetch_assoc($res);
        $_SESSION["adminLogin"] = $data["email"];
        header("location: ../dashboard.php");

    }
    else{
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Wrong Email Or Password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      header("location: ../index.php");
    }
}


if(isset($_POST['UserID'])){
  $id = $_POST['UserID'];
  $output = "";

  $query = "SELECT profile_tbl.Application_ID,profile_tbl.Email,profile_tbl.Phone,idea_tbl.ideaTitle,idea_tbl.ideaDescription,academic_tbl.institution,academic_tbl.program,academic_tbl.level,academic_tbl.cgpa FROM (profile_tbl INNER JOIN idea_tbl ON profile_tbl.Application_ID = idea_tbl.application_ID) INNER JOIN academic_tbl ON profile_tbl.Application_ID = academic_tbl.application_ID AND profile_tbl.Application_ID = '$id'";

  $result = mysqli_query($con,$query);
  while($row = mysqli_fetch_array($result)){
      $output ='
      <table class="table caption-top">
          <tr>
              <th scope="col">Application ID</th>
              <td>'.$row["Application_ID"].'</td>
          </tr>
          <tr>
              <th scope="col">Email</th>
              <td>'.$row["Email"].'</td>
          </tr>
          <tr>
              <th scope="col">Phone</th>
              <td>'.$row["Phone"].'</td>
          </tr>
          <tr>
              <th scope="col">Idea Title</th>
              <td>'.$row["ideaTitle"].'</td>
          </tr>
          <tr>
              <th scope="col">Idea Description</th>
              <td>'.$row["ideaDescription"].'</td>
          </tr>
          <tr>
              <th scope="col">Institution</th>
              <td>'.$row["institution"].'</td>
          </tr>
          <tr>
              <th scope="col">Program</th>
              <td>'.$row["program"].'</td>
          </tr>
          <tr>
              <th scope="col">Level</th>
              <td>'.$row["level"].'</td>
          </tr>
          <tr>
              <th scope="col">CGPA</th>
              <td>'.$row["cgpa"].'</td>
          </tr>
      </table>
      
  ';
  }
  echo $output;
  
}




?>