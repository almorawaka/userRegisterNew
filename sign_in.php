<?php session_start(); ?>


<?php include_once('inc/conn.php');?>

<?php

    if(isset($_POST['submit'])){

        //Declaring variables and assign empty values
        $email = "";
        $password = "";
        $msg = "";

        $email = input_varify($_POST['email']);
        $password = input_varify($_POST['password']);

        $query1 = "SELECT * FROM TBL_User WHERE email = '{$email}' AND pwd = '{$password}' LIMIT 1";

        $ShowResult = mysqli_query($conn, $query1);

        if($ShowResult){

            if(mysqli_num_rows($ShowResult) == 1){

                $user = mysqli_fetch_assoc($ShowResult);
                $_SESSION['User_firstName'] = $user['firstName'];
                $_SESSION['User_lastName'] = $user['lastName'];
                
                header("Location: index.php");

            }
            else{

                $msg = " <div class='alert alert-danger alert-dismissible '>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Please check email or password again </strong> This alert box could indicate a successful or positive action.


            </button>
          </div>";

            }

        }

    }


    function input_varify($data){
        //Remove empty spece from user input
        $data = trim($data);
        //Remove back slash from user input
        $data  = stripslashes($data);
        //conver special chars to html entities
        $data = htmlspecialchars($data);

        return $data;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php include_once('inc/navbar.php')?>



  
<div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-4">
                    <div class="card-header" id="card-header">
                    <h4>Sign Up Form</h4>
                    </div>
            <div class="card-body" id="card-body">

<form action= "sign_in.php" method= "POST" autocomplete="off">
  <?php if(!empty($msg)){echo $msg;}?>

         <div class="form-group">
          <label for="">E-mail</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Enter your email</small>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="text" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Enter your Password</small>
        </div>
        </div>
                    <div class="card-footer" id="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</form>




</body>
</html>
