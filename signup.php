<?php
session_start();
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["username"];
$pass = $_POST["password"];
$street = $_POST["street"];
$state = $_POST ["state"];
$email = $_POST["email"];

$root = 'root';
$password = '';
$db ='booking';
$con = mysqli_connect("localhost", $root, $password , $db) or die("No databse with that name");


$query = "SELECT * FROM users WHERE user_name = '$username';";
if ($result= mysqli_query($con,$query))
{
    if (mysqli_num_rows($result)<1){
        $insert = "INSERT INTO users VALUES ('$username', '$pass', '$fname', '$lname', '$street', '$state' , '$email');";
        mysqli_query($con, $insert);
        $_SESSION["user"]= $username;
        header ("Location: welcome.php");
    }
    else {
        $_SESSION["sin"]="Not unique Username";
        header("Location: index.php");
    }
}



?>