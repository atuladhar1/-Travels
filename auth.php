<?php
session_start();

 $name = $_POST["uname"];
 $pass = $_POST["password"];
 $_SESSION["user"]=$name;
 $root = 'root';
 $password = '';
 $db ='booking';
 $_SESSION["user"]=$name;

 $con = mysqli_connect("localhost", $root, $password , $db) or die("No databse with that name");
 $query = "SELECT street FROM `users` WHERE user_name = '$name' and pass ='$pass';";
 if ($result = mysqli_query($con,$query)){ 
     if (mysqli_num_rows($result)<1){
        $_SESSION["err"]="err";
        header("Location: index.php");
     }
     else{
     header("Location: welcome.php");
     $_SESSION["user"]=$name;
     }
 }
?>