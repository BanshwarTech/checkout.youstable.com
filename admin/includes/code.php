<?php
include '../../db.php';
$msg = $_GET['msg'];
echo $msg;

switch ($msg) {
    case 'addCoupon':
        if (isset($_POST['coupon_id']) && !empty($_POST['coupon_id'])) {
            // Update coupon
            $coupon_id = $_POST['coupon_id'];
            $query = "UPDATE `coupons` SET 
                `coupon_code` = '" . $_POST['code'] . "',
                `coupon_type` = '" . $_POST['type'] . "',
                `coupon_value` = '" . $_POST['value'] . "',
                `billing_cycle` = '" . $_POST['billingCycle'] . "',
                `plan_name` = '" . $_POST['planName'] . "',
                `plangroup_name` = '" . $_POST['planGroup'] . "'
                WHERE `id` = '$coupon_id'";
            echo $query;
            $result = mysqli_query($con, $query);

            if ($result) {
                $success_message = "Coupon Updated";
                header('Location: ../coupons.php?success=' . urlencode($success_message));
            } else {
                $error_message = "Coupon Not Updated";
                header('Location: ../coupons.php?error=' . urlencode($error_message));
            }
        } else {
            // Insert new coupon
            $query = "INSERT INTO `coupons`(`coupon_code`, `coupon_type`, `coupon_value`, `billing_cycle`, `plan_name`, `plangroup_name`, `status`) 
                      VALUES ('" . $_POST['code'] . "','" . $_POST['type'] . "','" . $_POST['value'] . "','" . $_POST['billingCycle'] . "','" . $_POST['planName'] . "','" . $_POST['planGroup'] . "','1')";
            echo $query;
            $result = mysqli_query($con, $query);

            if ($result) {
                $success_message = "Coupon Added";
                header('Location: ../coupons.php?success=' . urlencode($success_message));
            } else {
                $error_message = "Coupon Not Added";
                header('Location: ../coupons.php?error=' . urlencode($error_message));
            }
        }
        break;
}
