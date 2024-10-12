<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include "db.php";
if (isset($_SESSION["client_inserted_id"]) && $_SESSION["client_order_email"] && $_SESSION['order_inserted_id']) {
    $client_inserted_id = $_SESSION["client_inserted_id"];
    $client_inserted_email = $_SESSION["client_order_email"];
    $order_inserted_id = $_SESSION['order_inserted_id'];
} else {
    echo "No inserted ID found!<br/>";
}


$order_id = $_GET["oid"];


$update = "UPDATE `order` SET status='failed',transactionId='NULL',orderId='$order_id' where oid='$order_inserted_id' ";

$result = mysqli_query($con, $update);
$page = 'Payment-Failed';
include('inc/header.php');
?>
<title><?= $page; ?></title>
<style>
    .train {
        margin: 20px auto;
    }
</style>

<section>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-12">
                <div class="mb-4 form-banner">
                    <div class="g-3" style="text-align:center;">
                        <h3>OOPS!</h3>
                        <img class="train" src="Cross_red_circle.svg.png" alt="Train illustration" width="50px" height="50px">
                        <div class="sorry-text">SORRY!</div>
                        <div class="message">
                            <span class="fw-bold">Your payment request has been failed!</span>
                            <ul style="list-style-type: none; padding: 0;">
                                <li><strong>User Email:</strong> <?php echo htmlspecialchars($client_inserted_email); ?></li>
                                <li><strong>Client Inserted ID:</strong> <?php echo htmlspecialchars($client_inserted_id); ?></li>
                                <li><strong>Order Inserted ID:</strong> <?php echo htmlspecialchars($order_inserted_id); ?></li>
                                <li><strong>Order ID:</strong> <?php echo htmlspecialchars($order_id); ?></li>
                            </ul>
                        </div>
                        <a href="https://checkout.youstable.com/" class="btn btn-danger">Back to home</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<?php include('inc/footer.php') ?>