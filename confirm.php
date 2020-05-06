<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@700&display=swap" rel="stylesheet">
    <title>Reservation Confirmed</title>
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
            height: 100%;
            
        }
        span{
            font-size: 30px;
            font-family: 'Baloo Tamma 2', cursive;
            color: #34495e;
        }
        div{
            background-color:#2980b9;
            width: 50%;
            padding-top: 20px; 
            margin-left:auto;
            margin-right: auto;
            border : grey solid 3px;
            border-radius: 20%;
        }
        h3{
            font-size:40px;
            font-family: 'Baloo Tamma 2', cursive; 
            color: #7f8c8d;
        }
        footer {
        clear: both;
        margin: 100px;
        position: fixed;

}
        </style>
</head>
<body>
<nav><a href ="welcome.php">Travels</a></nav>
<h3>Flight Confirmed</h3>
<div>
    <?php

    $root = 'root';
    $password = '';
    $db ='booking';
    $con = mysqli_connect("localhost", $root, $password , $db) or die("No databse with that name");
    $user = $_SESSION["user"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $date = $_POST["date"];
    $lat1=0;
    $lon1=0;
    $lat2=0;
    $lon2=0;

    function distance($lat1, $lon1, $lat2, $lon2) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return $miles;
      }

    $query1 = "SELECT FULLNAME, ADR , LAT, LON from Airports where OBJECTID = $from;";
    if ($result1 = mysqli_query($con,$query1))
    {
        while ($row1 = mysqli_fetch_row($result1))
        {
            echo "<p><span>Flight from<span> : $row1[0],$row1[1].<br><p>";
            $from= $row1[0];
            $lat1 = $row1[2];
            $lon1 = $row1[3];
        }
    }

    $query2 = "SELECT FULLNAME, ADR , LAT, LON from Airports where OBJECTID = $to;";
    if ($result2 = mysqli_query($con,$query2))
    {
        while ($row2 = mysqli_fetch_row($result2))
        {
            echo "<p><span>Flight from<span> : $row2[0],$row2[1].<br><p>";
            $to= $row2[0];
            $lat1 = $row2[2];
            $lon1 = $row2[3];
        }
    }

    $dist = round(distance($lat1, $lon1, $lat2, $lon2));
    echo "<p><span>Distance of flight<span>: $dist<br>";
    $price =$dist*.014;
    echo "<span>Price<span>: ".$price."$ <br>";
    echo "<span>Date<span>: $date </p>";
    $insert = "INSERT INTO bookings VALUES ('$user', '$from', '$to', $price, '$date');";
    mysqli_query($con, $insert);
    ?>
</div>
<footer>This is project using PHP, mySQL, CSS and HTML.</footer>
</body>
</html>
