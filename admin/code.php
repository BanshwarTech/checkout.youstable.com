<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include "../db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sEmail = '';
    $sPwd = '';
    $select = "SELECT * FROM admin";
    $result = mysqli_query($con, $select);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sEmail = $row["useremail"];
            $sPwd = $row["password"];
        }
    }

    $email = mysqli_real_escape_string($con, $_POST['useremail']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    echo $email;
    echo $password;

    if ($email == $sEmail && $password == $sPwd) {
        $_SESSION['ADMIN_USER'] = $email;
        header("location:index.php");
    } else {
        $_SESSION['error'] = "Useremil or Password is invalid";
        header("location:login.php");
    }
}
