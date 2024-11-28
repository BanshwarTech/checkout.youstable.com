<?php
include('iplocation.php');
$ip = getClientIp();

// Fallback to a public IP for localhost testing
if ($ip == '127.0.0.1' || $ip == '::1') {
    $ip = '8.8.8.8'; // Example fallback IP
}

// Fetch geolocation data
$response = getGeolocation($ip);

// Output the data in HTML format
if ($response['status'] === 'success') {
    $data = $response['data'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Geolocation Info</title>
</head>

<body>
    <h1>Geolocation Information</h1>
    <p><strong>IP Address:</strong> <?= $ip ?? 'N/A' ?></p>
    <p><strong>City:</strong> <?= $data['city'] ?? 'N/A' ?></p>
    <p><strong>Region:</strong> <?= $data['region'] ?? 'N/A' ?></p>
    <p><strong>Country:</strong> <?= $data['country'] ?? 'N/A' ?></p>
    <p><strong>Latitude:</strong> <?= explode(',', $data['loc'] ?? 'N/A')[0] ?></p>
    <p><strong>Longitude:</strong> <?= explode(',', $data['loc'] ?? 'N/A')[1] ?></p>
    <p><strong>Currency:</strong> <?= $data['currency'] ?? 'N/A' ?></p>


</body>

</html>