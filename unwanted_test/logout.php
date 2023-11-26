<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
<?php
            session_start();
            if(array_key_exists('logoutbtn', $_POST)&&isset($_SESSION["username"])){
              session_destroy();
              header("Location:new1.php");
              exit();  
            }
            else{
                
                
                echo "<script>prompt('you are not logged in')</script>";
                
                
            }
?>


</body>
</html>
