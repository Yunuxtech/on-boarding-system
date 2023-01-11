<?php

$localhost = "localhost";
$username = "root";
$password = "";
$db = "on-boarding";

$con = mysqli_connect($localhost, $username, $password, $db);
if(!$con){
    echo "DB Connection Erroe" . mysqli_connect_error();
}
// else{
//     echo "Nice";
// }







?>