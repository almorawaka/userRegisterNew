<?php include_once('inc/conn.php');?>

<?php
    if (isset($_POST['submit'])){
      //declaring variable assign empy validation
      $firstName="";
      $lastName="";
      $email="";
      $password="";
      $msg="";
    

      $firstName=input_veryfy($_POST['firstName']);
      $lastName=input_veryfy($_POST['lastName']);
      $email=input_veryfy($_POST['email']);
      $password=input_veryfy($_POST['password']);

      $query1 ="SELECT * FROM tbl_user WHERE firstName= '{$firstName}' AND email='{$email}'";
      $showResult = mysqli_query ($conn,$query1);
      
      if ($showResult) {

        if (mysqli_num_rows($showResult)==1){

          $msg = " <div class='alert alert-danger alert-dismissible '>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Sorry!</strong> user already registerd.
            </div>";
          
        }
        else {
          $query ="INSERT INTO tbl_user(firstName,lastName,email,pwd,regDT) values(
            '{$firstName}','{$lastName}','{$email}','{$password}',NOW() )";
       
           
          $result = mysqli_query($conn,$query);
              if ($result) {
               // echo "user registration ok" ;
                $msg = " <div class='alert alert-success alert-dismissible '>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong> Please log in to your account to countinue.
            
              </div>";
              
              } else {
                echo mysqli_error($conn);
              }
        }
      }
          
  }



        function input_veryfy($data){
          //remove empty space from user input
          $data=trim($data);
          //remove backslashes from user input
          $data=stripslashes($data);
          //convert special chrs to into html entities
          $data=htmlspecialchars($data);

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

            <form action= "sign_up.php" method= "POST" autocomplete="off">
              <?php if(!empty($msg)){echo $msg;}?>

        <div class="form-group">
          <label for="">First Name</label>
          <input type="text" name="firstName" id="firstName" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Enter your first Name</small>
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="lastName" id="lastName" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Enter your Last Name</small>
        </div>
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
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</form>




</body>
</html>
