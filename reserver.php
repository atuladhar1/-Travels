<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <style>
       nav {
            color: white;
            font-size: 50px;
            font-family: 'Baloo Tamma 2', cursive;
            background: black;
        }
        body {
            margin: 0px;
            text-align: center;
            background: rgba(66, 165, 140, 0.5);
            color: #2c3e50;
        }

        form{
            font-size: 20px;
        }
        form p{
            font-size: 30px;
        }

        div{
            text-align: left;
            width:600px;
            background-color: #2ecc71;
            margin-left:auto;
            margin-right:auto;
            padding: 40px 10px;
            border-radius: 30px;
        }
        #date{
            text-align: center;
        }
        input[type=date]{
            font-size: 20px;
        }
        input[type=submit]{
        font-size: 20px;
        border-radius: 30px;
        margin-top: 30px;
        padding: 10px;
        }
        </style>
</head>
<body>
<nav>Travels</nav>
<div>
<form action='confirm.php' method='post'>
    <?php
    $from = $_POST["destination_from"];
    $to = $_POST["destination_to"];

    $root = 'root';
    $password = '';
    $db ='booking';
    $con = mysqli_connect("localhost", $root, $password , $db) or die("No databse with that name");

    $query1 = "SELECT * from Airports where CITY_NAME = '$from';";
    if ($result1 = mysqli_query($con,$query1)){
        if ((mysqli_num_rows($result1)<1)){
            $_SESSION["find"]="not found";
            header("Location: welcome.php");
        }
        else{
            echo "<p>From: </p>";
            echo "<div class='options'>";
            while ($row1 = mysqli_fetch_row($result1))
            {
                echo "<input type='radio' name= 'from' value =$row1[0] checked> $row1[3]<br>";
            }
            echo"</div>";
        }   
    }
    ?>
    <?php
    $query2 = "SELECT * from Airports where CITY_NAME = '$to';";
    if ($result2 = mysqli_query($con,$query2)){
        if ((mysqli_num_rows($result2)<1)){
            $_SESSION["find"]="not found";
            header("Location: welcome.php");
        }
        else{
            echo "<p>To: </p>";
            echo "<div class='options'>";
        while ($row2 = mysqli_fetch_row($result2))
        {
            echo "<input type='radio' name= 'to' value =$row2[0] checked> $row2[3]<br>";
        }
        echo"</div>";
    }
    }
    ?>
    <br>
    <p id = "date">
    <label for="date">Date</label>
    <input type = "date"  name = "date" id= "date" required>
    <br>
    <input type ="submit" value ="Reserve A Flight" id = "reserve" name = "reserve">
    </p>
    </form>


</div>
<footer>This is project using PHP, mySQL, CSS and HTML.</footer>
</body>
</html>
