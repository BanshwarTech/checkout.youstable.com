<?php

$con = mysqli_connect("localhost", "root", "", "youstable.com");
if (!$con) {
    echo "Connection is not Successfully";
}

// $servername2 = "108.59.0.102";
// $username2 = "checkout-ys";
// $password2 = "TsmyRJliEeTUqtWW";
// $dbname2 = "youstablewhmcs";

// // Create connection
// $con2 = mysqli_connect($servername2, $username2, $password2, $dbname2);

// // Check connection
// if ($con2->connect_error) {
//     die("Connection failed: " . $con2->connect_error);
// }
