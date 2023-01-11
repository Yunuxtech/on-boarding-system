<?php
include_once("./validate/checkLogin.php");
include_once("../db/db_connection.php");
checkLogin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Admin - Dashboard</title>
    <style>
        body {
            background-image: url("../images/img1\ 1.jpg");
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
    </style>
</head>

<body>
    <div class="container">
        <div class="alert alert-primary" role="alert">
            Welcome Back ! <b>Admin</b>
            <span>
                <a href="./validate/logout.php" class="btn btn-danger">Logout</a>
            </span>
        </div>
        <table class="table table-hover caption-top">
            <caption> <b>List of Applicants</b> </caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Application ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $res = mysqli_query($con, "SELECT * FROM `profile_tbl` WHERE completed = '1'");
                $i = 1;
                while ($data = mysqli_fetch_assoc(($res))) {
                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td scope="row">
                            <?php echo $data["Application_ID"]; ?>
                        </td>
                        <td><?php echo $data["FullNAme"]; ?></td>
                        <td>
                            <?php echo $data["Gender"]; ?>
                        </td>
                        <td><i class="fa fa-eye viewdata" title="View Request" style="cursor:pointer;" id="<?php echo $data['Application_ID']; ?>"></i></td>
                    </tr>

                    <?php
                    $i++;
                }




                ?>


            </tbody>
        </table>

    </div>


<div class="modal fade" id="MyForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Application details</h5>
        <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body" id="details">...</div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

    <script type="text/javascript">
  $(document).ready(function(){
    $('.viewdata').click(function(){
      var UserID = $(this).attr("id");

      $.ajax({
        url:"./validate/login.php",
        method:"post",
        data:{UserID:UserID},
        success:function(data){
          $('#details').html(data);
          $('#MyForm').modal('show');
        }
         
      });
      
      
    });
  });
</script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- MDB -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>

</html>