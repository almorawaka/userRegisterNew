<?php session_start(); ?>

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

          $msg = " <div class='alert alert-denger alert-dismissible '>
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
                <strong>Success!</strong> This alert box could indicate a successful or positive action.
            
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

<!-- check user session is started -->
<!-- <?php 
if (isset($_SESSION['User_firstName'])) {
echo $_SESSION['User_firstName'];
} else {
echo "session not created";
}
?> -->


  
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron mt-4">
                    <h4 id="jumbo-header"> Welcome  
                      <!-- php code for login user's name  -->
                      <?php 
                      if (isset($_SESSION['User_firstName'])) {
                      echo "  back  ";
                      echo $_SESSION['User_firstName'];
                      } else {
                       echo " Please log into your accout to proceed";
                      }
                      ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>



</body>
</html>
