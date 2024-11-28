<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include '../db.php';

$firstName = $_GET['fname'];
$lastName = $_GET['lname'];
$email = $_GET['email'];
$address = $_GET['address'];
$city = $_GET['city'];
$state = $_GET['state'];
$postcode = $_GET['postcode'];
$country = $_GET['country'];
$phoneNumber = $_GET['phonenumber'];
$password = $_GET['password'];

echo "First Name: " . $firstName . "<br>";
echo "Last Name: " . $lastName . "<br>";
echo "Email: " . $email . "<br>";
echo "Address: " . $address . "<br>";
echo "City: " . $city . "<br>";
echo "State: " . $state . "<br>";
echo "Postcode: " . $postcode . "<br>";
echo "Country: " . $country . "<br>";
echo "Phone Number: " . $phoneNumber . "<br>";
echo "Password: " . $password . "<br>";


$api_url = 'https://www.youstable.com/manage/includes/api.php';
$api_username = 'lIUlHAmZUOKP7oEVV7rmy6TDr9ZbOEuD';
$api_password = 'Dh3cVM3tFzNloeXRo9xpMFOidPJcLVGq';

// Prepare API request
$api_data = [
    'action' => 'AddClient',
    'username' => $api_username,
    'password' => $api_password,
    'firstname' => $firstName,
    'lastname' => $lastName,
    'email' => $email,
    'address1' => $address,
    'city' => $city,
    'state' => $state,
    'postcode' => $postcode,
    'country' => $country,
    'phonenumber' => $phoneNumber,
    'password2' => $password,
    'responsetype' => 'json'
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute API call
$response = curl_exec($ch);


if ($response === false) {
    $error_message = 'cURL Error: ' . curl_error($ch);
    $_SESSION['error_message'] = $error_message;
    error_log($error_message);
    curl_close($ch);
    // header("Location: clients.php");
    exit;
}

curl_close($ch);
$response_data = json_decode($response, true);

// Handle API response
if (isset($response_data['result']) && $response_data['result'] === 'success') {
    $_SESSION['success_message'] = "Client added successfully via API.";

    // Fetch client data
    $sql_client = "SELECT * FROM client";
    $result_client = mysqli_query($con, $sql_client);

    if ($result_client) {
        while ($row_client = mysqli_fetch_assoc($result_client)) {
            $client_email = $row_client["email"];
            $client_id = $row_client["id"];

            // Fetch server data based on client email
            $sql_server = "SELECT * FROM tblclients WHERE email = '$client_email'";
            $result_server = mysqli_query($con2, $sql_server);

            if ($result_server) {
                $row_server = mysqli_fetch_assoc($result_server);
                if ($row_server) {
                    $server_id = $row_server["id"];
                    $server_email = $row_server["email"];

                    // Update client table with server information
                    $update_sql = "UPDATE client SET server_client_id = '$server_id', server_email = '$server_email', is_del=1 WHERE id = $client_id";
                    // echo $update_sql;
                    $update_result = mysqli_query($con, $update_sql);

                    if ($update_result) {
                        echo "Record updated successfully: " . $server_id . " " . $server_email . "<br>";
                    } else {

                        $_SESSION['error_message'] = "Error updating record: " . mysqli_error($con) . "<br>";
                    }
                } else {
                    echo "";
                }
            } else {
                $_SESSION['error_message'] = "Error fetching data from tblclients: " . mysqli_error($con2) . "<br>";
            }
        }
    } else {
        $_SESSION['error_message'] = "Error fetching data from client table: " . mysqli_error($con) . "<br>";
    }

    // Redirect to dashboard
    header("Location: clients.php");
} else {
    // Handle API error
    $api_error = $response_data['message'] ?? 'Unknown API error.';
    $_SESSION['error_message'] = "API Error: " . $api_error;
    error_log("API Error: " . $api_error);

    // Redirect to dashboard
    header("Location: clients.php");
    exit;
}
