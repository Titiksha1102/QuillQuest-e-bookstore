<?php
 session_start();
 $curr_user=$_SESSION['username'];
 $host = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'quillquest';
 $conn = mysqli_connect($host, $user, $pass, $db);
 $prod_id=$_POST['prod_id_dec'];
 $prev_qty_query="select qty from cart where username='$curr_user' and prod_id='$prod_id'";
 $prev_qty_res=mysqli_query($conn, $prev_qty_query);
 $prev_qty_row=mysqli_fetch_assoc($prev_qty_res);
 $prev_qty=$prev_qty_row['qty'];
 if($prev_qty>1){
    $alt_qty_query="update cart set qty=$prev_qty-1 where username='$curr_user' and prod_id='$prod_id'";
    mysqli_query($conn, $alt_qty_query);
    $curr_qty_query="select qty from cart where username='$curr_user' and prod_id='$prod_id'";
    $curr_qty_res=mysqli_query($conn, $prev_qty_query);
    $curr_qty_row=mysqli_fetch_assoc($prev_qty_res);
    $curr_qty=$prev_qty_row['qty'];
    echo "$curr_qty";
 }
 else{
     echo "<script>alert('If you want to delete item from cart, click on remove')</script>";
     echo "<script>window.open('usercart.php','_self')</script>";

 } 

?>