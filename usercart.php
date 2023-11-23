<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'quillquest';
$conn = mysqli_connect($host, $user, $pass, $db);


$curr_user=$_SESSION['username'];
$query="select prod_id from cart where username='$curr_user'";
$result=mysqli_query($conn, $query);
echo "<h2>your cart</h2>";
$total_price=0;
while($row=mysqli_fetch_assoc($result)){
    $prod_id=$row['prod_id'];
    $query2="select * from products where product_id='$prod_id'";
    $result2=mysqli_query($conn, $query2);
    $prod_data=mysqli_fetch_assoc($result2);
    $prod_title=$prod_data['prod_title'];
    $prod_img=$prod_data['prod_img'];
    $prod_price=$prod_data['prod_price'];
    $total_price=$total_price+$prod_price;
?>  
    <tr>
      <td scope="col"><img src="images/<?=$prod_img?>" style="width:100px;height:100px"/></td>
      <td scope="col"><?=$prod_title?></td>
      <td scope="col"><?=$prod_price?></td>
    </tr>
<?php
}
?>
  </tbody>
</table>
<h2>Total cart price <?=$total_price?></h2> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>

