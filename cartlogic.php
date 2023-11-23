<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'quillquest';
$conn = mysqli_connect($host, $user, $pass, $db);


$curr_user=$_SESSION['username'];
if(isset($_POST['cartbtn'])){
    $curr_prod_id=$_POST['prod_id'];
    $already_exists="select * from cart where username='$curr_user' and  prod_id='$curr_prod_id'";
    $result=mysqli_query($conn, $already_exists);
    $count=mysqli_num_rows($result);
    if($count>0){
        echo "<script>alert('item already in cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
        $query="insert into cart (username,prod_id) values ('$curr_user',$curr_prod_id)";
        mysqli_query($conn, $query);
        echo "<script>window.open('index.php','_self')</script>"; 
    }
}
?>