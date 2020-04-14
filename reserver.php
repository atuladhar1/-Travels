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
        #nav {
            color: white;
            font-size: 50px;
            font-family: 'Baloo Tamma 2', cursive;
            width: 100%;
            float: center;
            margin-bottom: 15px;
        }

        body {
            margin: 0px;
            text-align: center;
            background: rgba(66, 165, 140, 0.5);
            color: grey;
        }
        </style>
</head>
<body>
<navi id="nav">Muji Travels<br></navi>
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
            echo "From: <br>";
            while ($row1 = mysqli_fetch_row($result1))
            {
                echo "<input type='radio' name= 'from' value =$row1[0] checked> $row1[3]<br>";
            }
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
            echo "TO: <br>";
        while ($row2 = mysqli_fetch_row($result2))
        {
            echo "<input type='radio' name= 'to' value =$row2[0] checked> $row2[3]<br>";
        }
    }
    }
    ?>
    <label for="date">Date</label>
    <input type = "date"  name = "date" id= "date">
    <input type ="submit" value ="Reserve A Flight" id = "reserve" name = "reserve">
    </form>

</body>
</html>