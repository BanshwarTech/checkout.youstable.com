<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include '../db.php';
$email = $_GET['email'] ?? null;
$server_id = $_GET['server_id'] ?? null;
$oid = $_GET['oid'] ?? null;
$domain = $_GET['domain'] ?? null;
$domainType = $_GET['domaintype'] ?? null;
$planName = $_GET['planName'] ?? null;
$transactionId = $_GET['transactionId'] ?? null;
$amount = $_GET['amount'] ?? null;
$billingCycle = $_GET['billing_cycle'] ?? null;
$paymentMethod = 'razorpay';

echo "Email: " . $email . "<br>";
echo "Server ID: " . $server_id . "<br>";
echo "OID: " . $oid . "<br>";
echo "Domain: " . $domain . "<br>";
echo "Domain Type: " . $domainType . "<br>";
echo "Plan Name: " . $planName . "<br>";
echo "Transaction ID: " . $transactionId . "<br>";
echo "Amount: " . $amount . "<br>";
echo "Billing Cycle: " . $billingCycle . "<br>";
echo "Payment Method: " . $paymentMethod . "<br>";
// Determine product ID based on plan name
$planMapping = [
    //  shared
    "DaStart" => 338,
    "DaProfessional" => 339,
    "DaElite" => 340,
    // vps
    "vStart" => 341,
    "vProfessional" => 342,
    "vPopular" => 343,
    "vStable" => 344
    // dedicated

];
$pid = $planMapping[$planName] ?? 0;

echo "product id : " . $pid . "<br>";
if (!$pid) {
    $_SESSION['error_message'] = "Invalid plan selected.";
    header("Location: orders.php?email=$email&server_id=$server_id");
    exit;
}

// Send data to the API
$apiUrl = 'https://www.youstable.com/manage/includes/api.php';

$apiData = [
    'action' => 'AddOrder',
    'username' => 'lIUlHAmZUOKP7oEVV7rmy6TDr9ZbOEuD',
    'password' => 'Dh3cVM3tFzNloeXRo9xpMFOidPJcLVGq',
    'clientid' => $server_id,
    'pid' => $pid,
    'domain' => $domain,
    'billingcycle' => $billingCycle,
    'paymentmethod' => "razorpay",
    'responsetype' => 'json',
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($apiData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    $_SESSION["error_message"] = 'API Error: ' . curl_error($ch);
    curl_close($ch);
    header("Location: orders.php?email=$email&server_id=$server_id");
    exit;
}


curl_close($ch);

// Decode API response
$responseData = json_decode($response, true);
if (!$responseData || $responseData['result'] !== 'success') {
    $_SESSION["error_message"] = "API Error: " . ($responseData['message'] ?? 'Unknown error');
    header("Location: orders.php?email=$email&server_id=$server_id");
    exit;
}


// Get the server order ID
$queryServerOrder = "SELECT * FROM  tblclients c JOIN tblorders o ON c.id = o.userid LEFT JOIN tblinvoices i ON o.userid = i.userid WHERE c.id = ?;";
$stmtServer = $con2->prepare($queryServerOrder);
$stmtServer->bind_param("s", $server_id);
$stmtServer->execute();
$resultServer = $stmtServer->get_result();
$serverRow = $resultServer->fetch_assoc();
$serverOrderId = $serverRow['id'] ?? null;
$invoiceId = $serverRow['invoiceid'] ?? null;
$invoicenum = $serverRow['invoicenum'] ?? null;


$queryUpdate = "UPDATE `order` SET is_del = 1, server_order_id = '" . $serverOrderId . "' WHERE oid = '" . $oid . "' AND clientMail = '" . $email . "'";
$resultUpdate = mysqli_query($con, $queryUpdate);
if ($stmtUpdate->execute()) {
    $_SESSION["success_message"] = $response;
} else {
    $_SESSION["error_message"] = "Failed to reactivate order.";
}


//invoice created api code 
$apiInvoicedata = [
    'action' => 'AddInvoicePayment',
    'username' => 'lIUlHAmZUOKP7oEVV7rmy6TDr9ZbOEuD',
    'password' => 'Dh3cVM3tFzNloeXRo9xpMFOidPJcLVGq',
    'invoiceid' => $invoiceId,
    'transid' => $transactionId,
    'fees' => $amount,
    'gateway' => 'razorpay',
    'date' => date('Y-m-d H:i:s'),
    'responsetype' => 'json',
];
$chInvoice = curl_init();
curl_setopt($chInvoice, CURLOPT_URL, $apiUrl);
curl_setopt($chInvoice, CURLOPT_POST, 1);
curl_setopt($chInvoice, CURLOPT_POSTFIELDS, http_build_query($apiInvoicedata));
curl_setopt($chInvoice, CURLOPT_RETURNTRANSFER, 1);

$responseInvoice = curl_exec($chInvoice);


if (curl_errno($chInvoice)) {
    $_SESSION["error_message"] = 'API Error: ' . curl_error($chInvoice);
    curl_close($chInvoice);
    header("Location: orders.php?email=$email&server_id=$server_id");
    exit;
}

curl_close($chInvoice);
$responseInvoiceData = json_decode($responseInvoice, true);
if (!$responseInvoiceData || $responseInvoiceData['result'] !== 'success') {
    $_SESSION["error_message"] = "API Error: " . ($responseInvoiceData['message'] ?? 'Unknown error');
    header("Location: orders.php?email=$email&server_id=$server_id");
    exit;
}
// Redirect back to the order page
header("Location: orders.php?email=$email&server_id=$server_id");
exit;
