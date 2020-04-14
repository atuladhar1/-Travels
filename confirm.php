<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmed</title>
</head>
<body>
<h3>Flight Confirmed</h3>
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
            echo "<p>Flight from : $row1[0],$row1[1].<br><p>";
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
            echo "<p>Flight from : $row2[0],$row2[1].<br><p>";
            $to= $row2[0];
            $lat1 = $row2[2];
            $lon1 = $row2[3];
        }
    }

    $dist = round(distance($lat1, $lon1, $lat2, $lon2));
    echo "<p>Distance of flight: $dist<br>";
    $price =$dist*.014;
    echo "Price: ".$price."$ <br>";
    echo "Date: $date </p>";
    $insert = "INSERT INTO bookings VALUES ('$user', '$from', '$to', $price, '$date');";

    echo $insert;
    mysqli_query($con, $insert);
    ?>

</body>
</html>