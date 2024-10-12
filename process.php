<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $planDetail = $_POST['plangroup'];
    $billing_cycle  = $_POST['billingcycle'];
    $plan = $_POST['plan'];
    $currency = $_POST['currency'];
    session_start();
    $_SESSION['plan_details'] = [
        'billingcycle' => $billing_cycle,
        'plan' => $plan,
        'currency' => $currency,
        'plangroup' => $planDetail
    ];
}
