<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<h5>
    <?php
    $user= $_SESSION["user"];
    $root = 'root';
    $password = '';
    $db ='booking';
    $con = mysqli_connect("localhost", $root, $password , $db) or die("No databse with that name");
    $query ="SELECT first_name, last_name, street, st, email FROM users WHERE user_name = '$user';";
    if ($result = mysqli_query($con,$query)){
        while ($row = mysqli_fetch_row($result))
        {
            $f_name = $row[0];
            $l_name =$row[1];
            $street = $row[2];
            $st = $row[3];
            $email = $row[4];}
    }
    echo "Welcome $f_name $l_name!!<br> Where would you like to book a flight today?";
    ?>
</h5>
<form id = "reserve" action= "reserve.php" method = "post">
    <label for ="destination_from">Please enter the destination</label>
    <input type = "text" id = "destination_from" name = "destination_from">
    <br>
    <label for ="destination_to">Please enter the destination</label>
    <input type = "text" id = "destination_to" name = "destination_to">
    <br>
    <input type = "submit" id = "submit" name = "submit">
</form>
</body>
</html>
