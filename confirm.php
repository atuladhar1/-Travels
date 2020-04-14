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

    $from = $_POST["from"];
    $to = $_POST["to"];
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

    $query1 = "SELECT FULLNAME, ADR, LATITUDE, LONGITUDE  from Airports where OBJECTID = '$from';";
    if ($result1 = mysqli_query($con,$query1)){
        echo "<h3>FROM:</h3>";
        while ($row1 = mysqli_fetch_row($result1))
        {
            echo "<p> Flight Boarding from $row1[0], $row1[1]. </p>";
        }
    }
    $dist = distance($lat1, $lon1, $lat2, $lon2);
    echo "kjkl";
    ?>
</body>
</html>