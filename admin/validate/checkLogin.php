<?php

session_start();
function checkLogin()
{
    if ($_SESSION["adminLogin"] == "") {
        $_SESSION["msg"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Authorized, Please Login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        header("location:index.php");
    }
}


?>