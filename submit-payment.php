<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include "db.php";
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST,GET,PUT,PATCH,DELETE");
header("Content-Type: application/json");
header("Accept: application/json");
header(
    "Access-Control-Allow-Headers:Access-Control-Allow-Origin,Access-Control-Allow-Methods,Content-Type"
);
function random_strings($length_of_string)
{

    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    return substr(
        str_shuffle($str_result),
        0,
        $length_of_string
    );
}
// client data 
$fname = trim($_POST["fname"]);
$lname = trim($_POST["lname"]);
$email = trim($_POST["email"]);
$password = random_strings(16);
$phone = trim($_POST["phone"]);
$address = trim($_POST["address"]);
$city = trim($_POST["city"]);
$state = trim($_POST["state"]);
$postcode = trim($_POST["postcode"]);
$country = trim($_POST["country"]);
$gst = trim($_POST["gst"]);
$date = date("Y-m-d H:i:s");
// order details
$order_id = uniqid();
$planName = $_POST["planName"];
$planPrice = $_POST["planPrice"];
$payAmount = $_POST["payAmount"];
$domainName = $_POST["domain"];
$billing_cycle = $_POST["billingcycle"];
$currency = $_POST["currency"];

$status = "Pending";
$orderDate = date("Y-m-d H:i:s");


if (isset($_POST["action"]) && ($_POST["action"] = "payOrder")) {
    $razorpay_mode = "test";

    $razorpay_test_key = "rzp_test_GLdwHf2ou851Fb";
    $razorpay_test_secret_key = "4Ev8GCSpRAxSNGZir8v5qM8y";

    $razorpay_live_key = "rzp_live_itzAkBlhedzK09";
    $razorpay_live_secret_key = "BJ8CyCLH2gRGHtLQdr1DUyrc";

    if ($razorpay_mode == "test") {
        $razorpay_key = $razorpay_test_key;

        $authAPIkey =
            "Basic " .
            base64_encode($razorpay_test_key . ":" . $razorpay_test_secret_key);
    } else {
        $authAPIkey =
            "Basic " .
            base64_encode($razorpay_live_key . ":" . $razorpay_live_secret_key);
        $razorpay_key = $razorpay_live_key;
    }



    // Check if the client already exists
    $sql = "SELECT id FROM client WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $clientId = '';
    if ($row = mysqli_fetch_assoc($result)) {
        $clientId = $row['id'];
    }
    mysqli_free_result($result);

    if ($clientId) {
        $update_sql = "UPDATE client SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', address = '$address', city = '$city', state = '$state', postcode = '$postcode', country = '$country', phonenumber = '$phone', date = '$date' WHERE id = $clientId";
        if (!mysqli_query($con, $update_sql)) {
            echo json_encode(["res" => "error", "info" => "Error updating record: " . mysqli_error($con)]);
            exit();
        }
        $_SESSION["client_inserted_id"] = $clientId;
    } else {
        $insert_sql = "INSERT INTO client (fname, lname, email, password, address, city, state, postcode, country, phonenumber, date) VALUES ('$fname', '$lname', '$email', '$password', '$address', '$city', '$state', '$postcode', '$country', '$phone', '$date')";
        if (mysqli_query($con, $insert_sql)) {
            $client_inserted_id = mysqli_insert_id($con);
            $_SESSION["client_inserted_id"] = $client_inserted_id;
        } else {
            echo json_encode(["res" => "error", "info" => "Error inserting record: " . mysqli_error($con)]);
            exit();
        }
    }

    // Step 1: Check if the record exists
    $sql_order = "SELECT oid FROM `order` WHERE clientMail = '$email' AND domainName = '$domainName'";
    $result_order = mysqli_query($con, $sql_order);
    $orderId = '';

    if ($row = mysqli_fetch_assoc($result_order)) {
        $orderId = $row['oid'];
    }
    mysqli_free_result($result_order);


    if ($orderId) {
        // Step 2: If record exists, update it
        $update_sql = "UPDATE `order` 
        SET planName = '$planName', billing_cycle = '$billing_cycle', planPrice = '$planPrice', currency = '$currency', 
            gst = '$gst', status = '$status', totalAmount = '$payAmount', orderDate = '$orderDate' 
        WHERE oid = $orderId";

        if (mysqli_query($con, $update_sql)) {
            $_SESSION["order_inserted_id"] = $orderId;
        } else {
            echo json_encode(["res" => "error", "info" => "Error updating order: " . mysqli_error($con)]);
            exit();
        }
    } else {
        // Step 3: If no record exists, insert a new one
        $iorder = "INSERT INTO `order` (planName, billing_cycle, planPrice, currency, domainName, gst, status, totalAmount, orderId, clientMail, orderDate) 
               VALUES ('$planName', '$billing_cycle', '$planPrice', '$currency', '$domainName', '$gst', '$status', '$payAmount', '$order_id', '$email', '$orderDate')";

        if (mysqli_query($con, $iorder)) {
            // Capture the inserted order's ID and store in session
            $order_inserted_id = mysqli_insert_id($con);
            $_SESSION["order_inserted_id"] = $order_inserted_id;
        } else {
            echo json_encode(["res" => "error", "info" => "Failed to insert order: " . mysqli_error($con)]);
            exit();
        }
    }



    $_SESSION['client_order_email'] = $email;

    // Additional note for payment
    $note = "Payment of amount Rs. " . $payAmount;

    $postdata = [
        "amount" => $payAmount * 100,
        "currency" => "INR",
        "receipt" => $note,
        "notes" => [
            "notes_key_1" => $note,
            "notes_key_2" => "",
        ],
    ];
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.razorpay.com/v1/orders",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postdata),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: " . $authAPIkey,
        ],
    ]);

    $response = curl_exec($curl);

    curl_close($curl);
    $orderRes = json_decode($response);

    if (isset($orderRes->id)) {

        $rpay_order_id = $orderRes->id;

        $dataArr = [
            "amount" => $payAmount,
            "description" => " Pay bill of Rs. " . $payAmount,
            "rpay_order_id" => $rpay_order_id,
            "name" => $fname,
            "email" => $email,
            "phone" => $phone,
            "client_inserted_Id" => $_SESSION["client_inserted_id"]
        ];
        echo json_encode([
            "res" => "success",
            "order_number" => $order_id,
            "userData" => $dataArr,
            "razorpay_key" => $razorpay_key,
        ]);
        exit();
    } else {

        echo json_encode([
            "res" => "error",
            "order_id" => $order_id,
            "info" => "Error with payment",
        ]);
        exit();
    }
} else {
    echo json_encode(["res" => "error"]);
    exit();
}
