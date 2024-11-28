<?php
session_start();
if ($_SESSION['ADMIN_USER'] == '') {
    $_SESSION['error'] = "First you have to login";
    header('Location: login.php');
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dateToday = date('Y-m-d', strtotime('Today'));
$dateYesterday = date('Y-m-d', strtotime('Yesterday'));
$dateTwoDaysAgo = date('Y-m-d', strtotime('-2 days'));
$selectedDate = '';

if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
}
$email = $_GET['email'];
$server_id = $_GET['server_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Orders - YouStable.com</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="https://www.youstable.com/assets/img/favicon.png" rel="icon">


    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">


    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>


    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="https://www.youstable.com/assets/img/logo_youstable.svg" alt="">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">




                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>



                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="signOut.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="clients.php">
                    <i class="bi bi-person"></i>
                    <span>Clients</span>
                </a>
            </li>


        </ul>

    </aside>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Orders</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Orders</h5>
                                <form action="" method="GET" id="dateFilterForm" class="d-inline-block">
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" name="server_id" value="<?php echo $server_id; ?>">
                                    <select name="date" onchange="document.getElementById('dateFilterForm').submit();" class="form-select border">
                                        <option value="">Filter Data</option>
                                        <option value="2024-10-07">Today</option>
                                        <option value="2024-10-06">Yesterday</option>
                                        <option value="2024-10-05">2 Days Ago</option>
                                    </select>
                                </form>
                            </div>
                            <?php
                            if (isset($_SESSION["success_message"])) { ?>
                                <div class="alert alert-success"><?php echo $_SESSION["success_message"] ?></div>
                            <?php
                                unset($_SESSION["success_message"]);
                            }

                            if (isset($_SESSION["error_message"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error_message"] ?></div>
                            <?php
                                unset($_SESSION["error_message"]);
                            }
                            ?>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Plan Name</th>
                                            <th>Domain Name</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Transaction ID</th>
                                            <th>Order Unique ID</th>
                                            <th>Action</th>
                                            <th>Send Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include '../db.php';

                                        $count = 0;
                                        $select = "SELECT * FROM `order`
                            LEFT JOIN `client` ON `order`.clientMail = `client`.email 
                            WHERE `order`.clientMail='" . $email . "'";
                                        if ($selectedDate != '') {
                                            $select .= " AND DATE(`order`.orderDate) = '$selectedDate'";
                                        }
                                        $select .= " ORDER BY `order`.orderDate DESC";
                                        // echo $select;
                                        $result = mysqli_query($con, $select);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $clientId = $row["id"];
                                                $oid = $row["oid"];
                                        ?>
                                                <tr>
                                                    <td><?php echo $count + 1; ?></td>
                                                    <td><?php echo htmlspecialchars($row["planName"] ?? 'null'); ?></td>
                                                    <td><?php echo htmlspecialchars($row["domainName"] ?? 'null'); ?></td>
                                                    <td><?php echo htmlspecialchars($row["status"] ?? 'null'); ?></td>
                                                    <td><?php echo htmlspecialchars($row["totalAmount"] ?? 'null'); ?></td>
                                                    <td><?php echo htmlspecialchars($row["transactionId"] ?? 'null'); ?></td>
                                                    <td><?php echo htmlspecialchars($row["orderId"] ?? 'null'); ?></td>
                                                    <td>
                                                        <a href="orders.php?email=<?php echo urlencode($email); ?>&server_id=<?php echo urlencode($server_id); ?>&order_id=<?php echo urlencode($row['oid']); ?>"
                                                            class="btn btn-info text-white">
                                                            <i class="fa-solid fa-eye"></i> View
                                                        </a>

                                                    </td>
                                                    <td>
                                                        <a href="send-order.php?server_id=<?php echo urlencode($server_id); ?>&oid=<?php echo urlencode($oid); ?>&amount=<?php echo $row['totalAmount'] ?>&transactionId=<?php echo $row['transactionId']; ?>&domain=<?php echo urlencode($row["domainName"]); ?>&domaintype=<?php echo urlencode(trim('own')); ?>&billing_cycle=<?php echo $row['billing_cycle'] ?>&planName=<?php echo urlencode(trim($row["planName"])); ?>&email=<?php echo urlencode(trim($_REQUEST['email'])); ?>"
                                                            class="btn text-white" style="background:var(--bs-success);">
                                                            <i class="fa-solid fa-server"></i> Send Data
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $count++;
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>YouStable</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

            Designed by <a href="https://youstable.com/">YouStable</a>
        </div>
    </footer>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
    $order_id  = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
    $order_data = null;

    if ($order_id > 0) {
        $query = "SELECT * FROM `order` WHERE oid = $order_id";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $order_data = mysqli_fetch_assoc($result);
        }
    }

    ?>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Order Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if ($order_data): ?>
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Plan Name:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($order_data['planName'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Plan Price:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    &#x24;<?php echo htmlspecialchars($order_data['planPrice'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Domain Name:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($order_data['domainName'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>GST:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($order_data['gst'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Status:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($order_data['status'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Payable Amount:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    &#x20B9;<?php echo htmlspecialchars($order_data['totalAmount'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Transaction Id:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($order_data['transactionId'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Order Id:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($order_data['orderId'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Order Registered Date:</strong>
                                </td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($order_data['orderDate'] ?? ''); ?>
                                </td>
                            </tr>
                        </table>

                    <?php else: ?>
                        <p>No client details found.</p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <?php if ($order_data): ?>
        <script>
            $(document).ready(function() {
                $('#staticBackdrop').modal('show');
            });
        </script>
    <?php endif; ?>
    <script>
        setTimeout(function() {

            let url = new URL(window.location.href);

            if (url.searchParams.has('order_id')) {
                url.searchParams.delete('order_id');

                window.history.replaceState({}, document.title, url.toString());
                location.reload();
            }
            if (url.searchParams.has('date')) {
                url.searchParams.delete('date');

                window.history.replaceState({}, document.title, url.toString());
                location.reload();
            }
        }, 5000);
    </script>


</body>

</html>