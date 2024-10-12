<?php
session_start();
session_destroy();
// Set success message in session
$_SESSION['success'] = 'Logout Successfully.';
header('location:login.php');
exit;
