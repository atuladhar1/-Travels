<?php
session_start();
if (isset($_SESSION["err"])){
    echo "<script>
    window.onload = function banana(){

        window.alert('Wrong Username Or Password');
    };
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Sign up</title>
</head>
<body>
    <div>
    <h1>
        Login
    </h1>
    <form id = "login" action = "auth.php" method = "post">
        <label for ="uname">Username </label>
        <input type ="text" id= "uname" name="uname">
        <label for ="password">Password</label>
        <input type ="password" id="password" name="password">
        <input type ="submit" value ="Sign In" id = "signin" name = "signin"> 
    </form>
    </div>
    <div>
        <h1>
            Sign up
        </h1>
        <form id = "signup" action = "signup.php" method = "post">
            <label for = "fname"> First Name</label>
            <input type = "text" id ="fname" name= "fname">
            <label for = "lname"> Last Name</label>
            <input type = "text" id = "lname" name= "lname">
            <label for = "username"> Username </label>
            <input type = "text" id = username name = "username">
            <label for = "street">Street Name</label>
            <input type = "text" id = "street" name = "street">
            <label for = "state">State</label>
            <input type = "text" id = "state" name ="state">
            <label for= "email">Email Address</label>
            <input type = "text" id = "email" name="email">
            <input type ="submit" value ="Sign Up" id = "signin" name = "signin"> 
        </form>
    </div>
   
</body>
</html>