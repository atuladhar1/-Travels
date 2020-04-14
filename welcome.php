<?php
session_start();
if (isset($_SESSION["find"])) { {
        echo "<script>
    window.onload = function banana(){

        window.alert('No Airports In that city');
    };
    </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@700&display=swap" rel="stylesheet">
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
        h2{
            font-family: 'Baloo Tamma 2', cursive;
            font-size: 40px; 
            color: green;
        }
        div{
            margin: 0px auto;
            font-size: 200%;
            font-family: 'Baloo Tamma 2', cursive;
            background: #EE9898;
            width: 45%;
            border-radius: 30px;
            padding: 30px 0px;
        }
        input[type=submit]{
        font-size: 20px;
        border-radius: 30px;
        padding: 10px;
}
    </style>
</head>

<body>
    <navi id="nav">Muji Travels<br></navi>
        <h2>

            <?php
            $user = $_SESSION["user"];
            $root = 'root';
            $password = '';
            $db = 'booking';
            $con = mysqli_connect("localhost", $root, $password, $db) or die("No databse with that name");
            $query = "SELECT first_name, last_name, street, st, email FROM users WHERE user_name = '$user';";
            if ($result = mysqli_query($con, $query)) {
                while ($row = mysqli_fetch_row($result)) {
                    $f_name = $row[0];
                    $l_name = $row[1];
                    $street = $row[2];
                    $st = $row[3];
                    $email = $row[4];
                }
            }
            echo "Welcome $f_name $l_name!!<br> Where would you like to book a flight today?";
            ?>
        </h2>
        <div>
        <form id="reserve" action="reserver.php" method="post">
            <label for="destination_from">Please enter the destination</label>
            <input type="text" id="destination_from" name="destination_from">
            <br>
            <label for="destination_to">Please enter the destination</label>
            <input type="text" id="destination_to" name="destination_to">
            <br>
            <input type="submit" id="submit" name="submit">
        </form>
    </div>
</body>

</html>