<?php session_start(); 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'quillquest';
$conn = mysqli_connect($host, $user, $pass, $db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quillquest demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      
      @media screen and (max-width:576px) {
        .column-container{
            width: 50%;
        }  
      }
        
    </style>
</head>
<body>

            
<!-- navbar -->
<nav class="navbar bg-light navbar-collapse-sm" >
  <div class="container-fluid">
    <a class="navbar-brand navbar-expand-lg" href="#" ><img height=38px width=200px src="logo-removebg-preview.png" /></a>
	<form class="d-flex" role="search" style="margin-left: 0px">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark" type="submit">Search</button>
          <button class="navbar-toggler ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  </form>
 


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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
                <a class="nav-link" href="usercart.php">Your Cart</a>
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

<!-- scrollling carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/carousel2.webp" height=500px width=100% class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/carousel3.jpg" height=500px width=100% class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/carousel4.jpg" height=500px width=100% class="d-block" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- product cards -->

<div class="container" style="margin-top:50px;">
  <!-- 1st row -->
  <div class="container d-flex justify-content-center p-4" >
    <?php
      $query="select * from products where product_id>0 and product_id<=4 order by rand()";
      $result=mysqli_query($conn,$query);
      while($row=mysqli_fetch_assoc($result)){
        $prod_id=$row['product_id'];
        $prod_title=$row['prod_title'];
        $prod_price=$row['prod_price'];
        $prod_img=$row['prod_img'];
    ?>
    
              
                <div class="card column-container mx-3 my-3" >
                  <img src="./images/<?=$prod_img?>" class="card-img-top img-fluid" alt="..." style="height: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title"><?=$prod_title?></h5>
                      <h6 class="card-title"><?=$prod_price?></h6>

                      <form method="post" action="">
                      <input type='hidden' name='prod_id' value='<?=$prod_id?>'/>
                      <input type='submit' name='cartbtn' class='btn btn-dark' value='Add to cart' />
                      
                      </form>
                      
                  </div>
                </div>
              
            
    <?php
          }
    ?>
  </div>
    
  
 <!-- 2nd row -->
  <div class="container d-inline-flex mx-3" >
    <?php 
      $query="select * from products where product_id>4 and product_id<=8 order by rand()"; 
      $result=mysqli_query($conn,$query);
      while($row=mysqli_fetch_assoc($result)){
        $prod_id=$row['product_id'];
        $prod_title=$row['prod_title'];
        $prod_price=$row['prod_price'];
        $prod_img=$row['prod_img'];
    ?>
    
              
                <div class="card column-container">
                  <img src="./images/<?=$prod_img?>" class="img-fluid card-img-top" alt="..." style="height: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title"><?=$prod_title?></h5>
                      <h6 class="card-title"><?=$prod_price?></h6>

                      <form method="post" action="">
                      <input type='hidden' name='prod_id' value='<?=$prod_id?>'/>
                      <input type='submit' name='cartbtn' class='btn btn-dark' value='Add to cart' />
                      
                      </form>
                      
                  </div>
                </div>
              
         
        <?php
          }
        ?>
  </div> 
   
   
 <!-- 3rd row -->
  <div class="container d-inline-flex mx-3">
    <?php
          $query="select * from products where product_id>8 and product_id<=12 order by rand()"; 
          $result=mysqli_query($conn,$query);
          while($row=mysqli_fetch_assoc($result)){
            $prod_id=$row['product_id'];
            $prod_title=$row['prod_title'];
            $prod_price=$row['prod_price'];
            $prod_img=$row['prod_img'];
    ?>
    
              
                <div class="card column-container">
                  <img src="./images/<?=$prod_img?>" class="img-fluid card-img-top" alt="..." style="height: 18rem;"/>
                  <div class="card-body">
                      <h5 class="card-title"><?=$prod_title?></h5>
                      <h6 class="card-title"><?=$prod_price?></h6>

                      <form method="post" action="">
                      <input type='hidden' name='prod_id' value='<?=$prod_id?>'/>
                      <input type='submit' name='cartbtn' class='btn btn-dark' value='Add to cart' />
                      
                      </form>
                      
                  </div>
                </div>
              
        <?php
         }
        ?>

  </div>
</div>


<!-- footer -->

  <div class="container-fluid mt-5 bg-light">
    <p class="p-3 text-center">All rights reserved © Designed by titiksha 2023</p>
  </div>

<?php
  if(isset($_POST['cartbtn'])){
    if(isset($_SESSION['username'])){
        $curr_user=$_SESSION['username'];
        $curr_prod_id=$_POST['prod_id'];
        $already_exists="select * from cart where username='$curr_user' and  prod_id='$curr_prod_id'";
        $result=mysqli_query($conn, $already_exists);
        $count=mysqli_num_rows($result);
        if($count>0){
            echo "<script>alert('item already in cart')</script>";
            //echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            $query="insert into cart (username,prod_id) values ('$curr_user',$curr_prod_id)";
            mysqli_query($conn, $query);
            echo "<script>alert('item added to cart')</script>";
            //echo "<script>window.open('index.php','_self')</script>"; 
        }
    }
    else{
        echo "<script>window.open('login.php','_self')</script>";
    }
    
  }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>