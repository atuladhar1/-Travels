<?php
session_start();
if (isset($_SESSION["err"])){
    if($_SESSION["err"]=="err"){
        echo "<script>
        window.onload = function banana(){
            window.alert('Wrong Username Or Password');
        };
        </script>";
        $_SESSION["err"]= "";
    }
}
if (isset($_SESSION["sin"])){
    if($_Session["sin"]=="Not unique Username"){
        echo "<script>
        window.onload = function banana(){
            window.alert('Choose a unique username');
        };
        </script>";
        $_SESSION["sin"]= "";}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Sign up</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<style>
input[type=submit]{
    font-size: 20px;
}
nav {
            color: white;
            font-size: 50px;
            font-family: 'Baloo Tamma 2', cursive;
            background: black;
        }
body{
    margin: 0px;
    text-align: center;
    background: rgba(66, 165, 140, 0.5);
    color: grey;
}
#login{
    margin: 0px auto 0px auto;
    width :400px;
    padding: 50px 0px;
    background: rgb(243, 246, 189);
    border-radius: 20%;
}
#log input{
    border: 3px solid grey;
    border-radius: 10%;
}
label{
    font-family: 'Baloo Tamma 2', cursive;
    font-size: 25px;

}
#signin{
    margin-top : 15px;
    color: grey;
    background-color: white;
    border: 0;
}
h1{
    font-size: 35px;
    font-family: 'Baloo Tamma 2', cursive;
}
#up{
    background: #E5CEFF;
    width: 45%;
    margin: 0px auto 0px auto;
    border-radius: 20%;
    padding: 50px 0;
}
</style>
<nav>Travels</nav>
    <div id = "login">
    <h1>
        Login
    </h1>
    <form id = "log" action = "auth.php" method = "post">
        <label for ="uname" required>Username</label>
        <input type ="text" id= "uname" name="uname">
        <br>
        <label for ="password" required>Password </label> 
        <input type ="password" id="password" name="password">
        <br>
        <input type ="submit" value ="Sign In" id = "signin" name = "signin"> 
    </form>
    </div>
    <div id="up">
        <h1>
            Sign up
        </h1>
        <form id = "signup" action = "signup.php" method = "post">
            <label for = "fname"> First Name</label>
            <input type = "text" id ="fname" name= "fname">
            <label for = "lname"> Last Name</label>
            <input type = "text" id = "lname" name= "lname">
            <br>
            <label for = "username" required> Username </label>
            <input type = "text" id = "username" name = "username">
            <label for ="password" required>Password</label>
            <input type ="password" id ="password" name ="password">
            <br>
            <label for = "street">Street Name</label>
            <input type = "text" id = "street" name = "street">
            <label for = "state">State</label>
            <input type = "text" id = "state" name ="state">
            <br>
            <label for= "email">Email Address</label>
            <input type = "text" id = "email" name="email">
            <br>
            <input type ="submit" value ="Sign Up" id = "signin" name = "signin"> 
        </form>
    </div>
    <footer>This is project using PHP, mySQL, CSS and HTML.</footer>
</body>
</html>
