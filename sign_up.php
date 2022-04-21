<?php
if (isset($_POST['submit'])){
  //declaring variable assign empy validation
  $firstName="";
  $lastName="";
  $email="";
  $password="";

  $firstName=input_veryfy($_POST['firstName']);
  $lastName=input_veryfy($_POST['lastName']);
  $email=input_veryfy($_POST['email']);
  $password=input_veryfy($_POST['password']);

  echo $firstName;
  echo"<br>";
  echo $lastName;
  echo"<br>";
  echo $email;
  echo"<br>";
  echo $password;
  echo"<br>";
}

function input_veryfy($data){
  //remove empty stapce from user input
  $data=trim($data);
  //remove backslashes from user input
  $data=stripslashes($data);
  //convert special chrs to into html entities
  $data=htmlspecialchars($data);

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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/userRegister/sign_up.php  "><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>


<form action= "sign_up.php" method= "POST" autocomplete="off">
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
      <div>
        <button type="submit" name="submit" id="submit" class="btn btn-primary">SignUp</button>
      </div>

</form>

</body>
</html>
