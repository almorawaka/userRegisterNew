<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Hospital User Registration System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href='#'>Page 1-3</a></li>
          </ul>
        </li>
        
        <?php
            if (isset($_SESSION['User_firstName'])) {
              echo " <li><a href='#'> PRINT JOB CARD</a></li>";
              echo " <li><a href='#'> OPEN JOB CARD</a></li> ";
            } else {  
            }
         ?>        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="sign_up.php  "><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="sign_in.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li> -->
      <?php
      
        if (isset($_SESSION['User_firstName'])) {
          echo " <li><a href='sign_out.php  '><span class='glyphicon glyphicon-user'></span> Sign Out</a></li>
          <li><a href='create_post.php'><span class='glyphicon glyphicon-log-in'></span> create post </a></li>";
        } else {
          echo " <li><a href='sign_up.php  '><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
          <li><a href='sign_in.php'><span class='glyphicon glyphicon-log-in'></span> Log In</a></li>";
        }
        

      ?>
      
      
      </ul>
    </div>
  </div>
</nav>