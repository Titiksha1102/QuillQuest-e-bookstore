

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
        insertdb(); 
    }
    function insertdb(){
$username=$_POST['uname'];
$email=$_POST['mail'];
$mobileno=$_POST['mobile'];
$passwd=$_POST['password'];


$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'quillquest';


$conn = mysqli_connect($host, $user, $pass, $db);
$sql = "INSERT INTO users (username,email,mobile,password) VALUES ('$username','$email','$mobileno','$passwd')";
$result = mysqli_query($conn, $sql);


if (mysqli_error($conn)) {
echo "Error: ". mysqli_error($conn);
}
else{
    header('Location:login.php');  
    exit;   
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

    <!-- signup form -->
    <div class="row">
        <!-- 1st col -->
        <div class="col-lg-4" ></div>
        <!-- 2nd col -->
        
        <div class="col-lg-4" style="margin-top:8%;">
                <h3 class="text-center mb-3">Signup</h3>
                <!-- 1st elt email -->
                <form method="post">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" style="width:439.33px;padding-left:30px;" name="uname">
                <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput"  style="width:439.33px;padding-left:30px;" name="mail">
                <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" style="width:439.33px;padding-left:30px;" name="mobile">
                <label for="floatingInput">Mobile</label>
                </div>

                <!--4th elt passwd-->
                <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" style="width:439.33px;padding-left:30px;" name="password">
                <label for="floatingPassword" >Password</label>
                </div>
                
                <center>
                    <input type="submit" name="button1" class="btn btn-dark mb-2" value="Signup" />
                    <!-- <button type="button" class="btn btn-dark mb-2" name="button1">Signup</button> -->
                </center>
                <div class="form-text text-center"><a href="login.php" style="color:black;">Already have an account? Login here!</a></div>
             
                <form>
        </div>
        
       
        <!-- 3rd col -->
        <div class="col-lg-4"></div>

    </div>



    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>