<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'quillquest';
$curr_user=$_SESSION['username'];
$conn = mysqli_connect($host, $user, $pass, $db);




if(isset($_POST['cartbtn'])){
    if(isset($_SESSION['username'])){
        $curr_user=$_SESSION['username'];
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
    else{
        echo "<script>window.open('login.php','_self')</script>";
    }
    
}

if(isset($_POST['delbtn'])){
    // $curr_user=$_SESSION['username'];
    $pro_id=$_POST['pro_id'];
    $query2="delete from cart where username='$curr_user' and prod_id='$pro_id'";
    $res=mysqli_query($conn, $query2);
    echo "<script>window.open('usercart.php','_self')</script>";
}

if(isset($_POST['decrease'])){
    $prod_id=$_POST['prod_id_dec'];
    $prev_qty_query="select qty from cart where username='$curr_user' and prod_id='$prod_id'";
    $prev_qty_res=mysqli_query($conn, $prev_qty_query);
    $prev_qty_row=mysqli_fetch_assoc($prev_qty_res);
    $prev_qty=$prev_qty_row['qty'];
    if($prev_qty>1){
        $alt_qty_query="update cart set qty=$prev_qty-1 where username='$curr_user' and prod_id='$prod_id'";
        mysqli_query($conn, $alt_qty_query);
        echo "<script>window.open('usercart.php','_self')</script>";
    }
    else{
        echo "<script>alert('If you want to delete item from cart, click on remove')</script>";
        echo "<script>window.open('usercart.php','_self')</script>";

    }  
}
if(isset($_POST['increase'])){
    $prod_id=$_POST['prod_id_inc'];
    $prev_qty_query="select qty from cart where username='$curr_user' and prod_id='$prod_id'";
    $prev_qty_res=mysqli_query($conn, $prev_qty_query);
    $prev_qty_row=mysqli_fetch_assoc($prev_qty_res);
    $prev_qty=$prev_qty_row['qty'];
    if($prev_qty<10){
        $alt_qty_query="update cart set qty=$prev_qty+1 where username='$curr_user' and prod_id='$prod_id'";
        mysqli_query($conn, $alt_qty_query);
        echo "<script>window.open('usercart.php','_self')</script>";
    }
    else{
        echo "<script>alert('Item quantity limit exceeded. You cannot buy more than 10 items of same type')</script>";
        echo "<script>window.open('usercart.php','_self')</script>";

    }
}

?>