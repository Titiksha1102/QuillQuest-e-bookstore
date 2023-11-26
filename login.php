

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
if(array_key_exists('button1', $_POST)) { 
    auth(); 
}
function auth(){
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'quillquest';


    $conn = mysqli_connect($host, $user, $pass, $db);
        
    $username = $_POST['uname'];  
    $password = $_POST['password'];  
          
           
          
    $sql = "select *from users where username = '$username' and pwd = '$password'";  
    $result = mysqli_query($conn, $sql);  
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    // $count = mysqli_num_rows($result);  
              
            if(!$result){ 
                $started=session_start();
                
                $_SESSION['username']= $username;
                header("Location:index.php");
                exit;
            }  
            else{  
                echo "<h1>Login failed.Invalid username or password.</h1>";  
            }
}
     
?>
<!-- navbar -->
<nav class="navbar bg-light" >
  <div class="container-fluid">
    <a class="navbar-brand navbar-expand-lg" href="#" ><img height=38px width=200px src="logo-removebg-preview.png" /></a>
	
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>


  <!-- offcanvas target sidebar -->


  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
	  	  <img height=38px width=200px src="logo-removebg-preview.png" />
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <h3 class="">
          <?php 
            if(isset($_SESSION["username"])){
              echo "Welcome {$_SESSION['username']}";
            }
            
            else{
              echo "Welcome Guest";
            }
          ?>
          </h3>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <?php
          if(!isset($_SESSION["username"])){
          ?>
          <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="signup.php">Signup</a>
          </li>
          <?php
          }
          else{
          ?>
          <li class="nav-item">
                <a class="nav-link" href="#">Your profile</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="#">Your Cart</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="#">Your Orders</a>
          </li>
          <li class="nav-item">
            <form method="post" action="index.php">
            <input type='submit' name='logoutbtn' class='btn btn-dark my-2' value='Logout' />
            
            </form>
           
            
          </li>
          <?php
          }
          ?>
        
          <?php
            
            if(array_key_exists('logoutbtn', $_POST)){
              if(isset($_SESSION["username"])){
                session_destroy();
                header("Location:index.php");
                exit();  
              }
              else{
                echo "<script>alert('you are not logged in')</script>";
              }
              
            }
            ?>
          
        </ul>
        
      </div>
    </div>
  </div>
</nav>

<!-- login form -->
    <div class="row">
        <!-- 1st col -->
        <div class="col-lg-4" >

        </div>
        <!-- 2nd col -->
        <div class="col-lg-4" style="margin-top:13%;">
            <form method="post">
                <h3 class="text-center mb-3">Login</h3>
                    <!-- 1st elt email -->
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" style="width:439.33px;padding-left:30px;" name="uname">
                <label for="floatingInput">Username</label>
                </div>
                <!--2nd elt passwd-->
                <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" style="width:439.33px;padding-left:30px;" name="password">
                <label for="floatingPassword">Password</label>
                </div>
                
                
                <center>
                <input type="submit" name="button1" class="btn btn-dark mb-2" value="Login" />
                </center>
                <div class="form-text text-center"><a href="signup" style="color:black;">New User? Signup here!</a></div>
            </form>
        </div>
        <!-- 3rd col -->
        <div class="col-lg-4">

        </div>

    </div>

<!-- footer -->
  <div class="bg-light mt-5">
    <p class="p-3 text-center">All rights reserved © Designed by titiksha 2023</p>
  </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>