<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include "db.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

if (isset($_SESSION["client_inserted_id"]) && $_SESSION["client_order_email"] && $_SESSION['order_inserted_id']) {
    $client_inserted_id = $_SESSION["client_inserted_id"];
    $client_inserted_email = $_SESSION["client_order_email"];
    $order_inserted_id = $_SESSION['order_inserted_id'];



    $order_id = $_GET["oid"];
    $payment_id = $_GET["rp_payment_id"];
    $signature = $_GET["rp_signature"];
    $rp_order_id = $_GET["rp_order_id"];

    $_SESSION['order_id'] = $order_id;

    $update = "UPDATE `order` SET status='Paid',transactionId='$payment_id',orderId='$order_id' WHERE oid='$order_inserted_id'";
    $result = mysqli_query($con, $update);

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = "pro.turbo-smtp.com";
        $mail->SMTPAuth = true;
        $mail->Username = "support@googiehost.com";
        $mail->Password = "Nokia#765a";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('support@googiehost.com');

        $mail->addAddress($client_inserted_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Order Confirmation - Youstable Deal';
        $mail->Body = "Your Order Id : " . $order_id;

        // Send email
        if ($mail->send()) {
            $success = "Your Order has been confirmed and please check your mail.";
        } else {
            $error = 'Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        $error = 'Mail Error: ' . $e->getMessage();
    }
} else {
    echo "No inserted ID found!<br />";
}
$page = 'Payment Success';
include('inc/header.php');

?>
<title><?= $page; ?></title>
<style>
    h1 {
        font-size: 5rem;
        color: #4a56e2;
    }
</style>

<section>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-12">
                <div class="mb-4 form-banner">
                    <div class="g-3 " style="text-align:center;">
                        <h1>Thank You!</h1>
                        <p class="text-success fw-bold">Your Payment has been received successfully.</p>
                        <p class="fw-bold"><u>Your Payment Information</u> </p>
                        <ul style="list-style-type: none; padding: 0;">
                            <li><strong>User Email:</strong> <?php echo htmlspecialchars($client_inserted_email); ?></li>
                            <li><strong>Client Inserted ID:</strong> <?php echo htmlspecialchars($client_inserted_id); ?></li>
                            <li><strong>Order Inserted ID:</strong> <?php echo htmlspecialchars($order_inserted_id); ?></li>
                            <li><strong>RazorPay Payment ID:</strong> <?php echo htmlspecialchars($payment_id); ?></li>
                            <li><strong>Order ID:</strong> <?php echo htmlspecialchars($order_id); ?></li>
                            <li><strong>RazorPay Order ID:</strong> <?php echo htmlspecialchars($rp_order_id); ?></li>
                        </ul>
                        <!-- <a href="https://checkout.youstable.com/" class="btn btn-success">Back to home</a> -->
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Include Toastr CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
    /* Customizing the Toastr notification look */
    #toast-container>.toast-success {
        background-color: #1e5631 !important;
        color: #fff !important;
        opacity: 1 !important;
    }

    #toast-container>.toast-error {
        background-color: #8b0000 !important;
        color: #fff !important;
        opacity: 1 !important;
    }

    #toast-container>div .toast-progress {
        background-color: #fff !important;
    }

    #toast-container>div .toast-title {
        color: #fff !important;
    }

    #toast-container>div .toast-message {
        color: #ddd !important;
    }

    #toast-container>div .toast-close-button {
        color: #fff !important;
    }
</style>

<script type="text/javascript">
    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-top-right",
        "closeButton": true
    };

    // Trigger Toastr notifications based on messages
    <?php if (!empty($success)): ?>
        toastr.success('<?php echo htmlspecialchars($success); ?>');
    <?php elseif (!empty($error)): ?>
        toastr.error('<?php echo htmlspecialchars($error); ?>');
    <?php endif; ?>
</script>
<?php include('inc/footer.php') ?>