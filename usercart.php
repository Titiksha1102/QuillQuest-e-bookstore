<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

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

<h3 class="text-center">Your Cart</h3>



<?php



$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'quillquest';



$conn = mysqli_connect($host, $user, $pass, $db);

$curr_user=$_SESSION['username'];
$query="select prod_id,qty from cart where username='$curr_user'";
$result=mysqli_query($conn, $query);
$total_price=0;
if(mysqli_num_rows($result)==0){
  echo "<h4>Your cart is empty</h4>";
}
else{?>
<div class="d-flex justify-content-center">
<table class="table mt-5" border="1" style="max-width:30rem;">
  <!-- <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Remove</th>
    </tr>
  </thead> -->
  <tbody>
<?php
while($row=mysqli_fetch_assoc($result)){
    $prod_id=$row['prod_id'];
    $quantity=$row['qty'];
    $query2="select * from products where product_id='$prod_id'";
    $result2=mysqli_query($conn, $query2);
    $prod_data=mysqli_fetch_assoc($result2);
    $prod_title=$prod_data['prod_title'];
    $prod_img=$prod_data['prod_img'];
    $prod_price=$prod_data['prod_price'];
    $total_price=$total_price+$prod_price*$quantity;
?>  
    <tr>
      <td scope="col"><img src="images/<?=$prod_img?>" style="width:100px;height:100px;"/></td>
      <td scope="col">
        
          <p><?=$prod_title?></p>
          <p><?=$prod_price?></p>
          <div class="btn-group mb-2" role="group" aria-label="Basic example">
          
            <?php
              $get_qty="select qty from cart where username='$curr_user' and prod_id='$prod_id'";
              $res=mysqli_query($conn,$get_qty);
              $row=mysqli_fetch_assoc($res);
              $qty=$row['qty'];
            ?>
            <form action="cartlogic.php" method="post">
            <input type="hidden" value="<?=$prod_id?>" name='prod_id_dec'/>
            <input type="submit" class="btn btn-dark" value="-" name='decrease'>
            </form>
            <button type="button" class="btn" ><?=$qty?></button>
            <form action="cartlogic.php" method="post">
            <input type="hidden" value="<?=$prod_id?>" name='prod_id_inc'/>
            <input type="submit" class="btn btn-dark" value="+" name='increase'>
            </form>
            <div class="container mx-2">
              <form method="post" action="cartlogic.php">
              <input type="hidden" value="<?=$prod_id?>" name='pro_id'/>
              <input type="submit" value="Delete" class="btn btn-danger" name="delbtn"/>
              </form>
            <div>
          </div>
        
        
        
      </td>
      


      
    </tr>
<?php
}?>
  </tbody>
</table>
</div>
<h2>Total cart price <?=$total_price?></h2>

<?php
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>







<!--  -->