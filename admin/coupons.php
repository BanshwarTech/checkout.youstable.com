<?php
session_start();
if ($_SESSION['ADMIN_USER'] == '') {
    $_SESSION['error'] = "First you have to login";
    header('Location: login.php');
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="coupons.php">
                    <i class="bi bi-person"></i>
                    <span>Coupons</span>
                </a>
            </li>

        </ul>

    </aside>

    <main id="main" class="main">

        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>Coupons</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Coupons</li>
                    </ol>
                </nav>
            </div>
            <div>
                <!-- Vertically centered Modal -->
                <a href="manageCoupon.php" class="btn btn-primary">
                    Add Coupon
                </a><!-- End Vertically centered Modal-->
            </div>
        </div>


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Coupons</h5>

                            </div>
                            <?php
                            // Check if there is a success message
                            if (isset($_GET['success'])) {
                                $success_message = $_GET['success'];
                                echo "<div class='alert alert-success'>{$success_message}</div>";
                            }

                            // Check if there is an error message
                            if (isset($_GET['error'])) {
                                $error_message = $_GET['error'];
                                echo "<div class='alert alert-danger'>{$error_message}</div>";
                            }
                            ?>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Type</th>
                                            <th>Coupon Value</th>
                                            <th>Plan Name</th>
                                            <th>Plan Group</th>
                                            <th>Billing Cycle</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include '../db.php';

                                        $count = 0;
                                        $select = "SELECT c.id AS coupon_id,c.coupon_code,c.coupon_type, c.coupon_value,c.billing_cycle,c.plangroup_name,pg.Name AS plan_group_name,p.name AS plan_name,c.status FROM coupons c LEFT JOIN plangroup pg ON c.plangroup_name = pg.pg_id LEFT JOIN plans p ON c.plan_name = p.p_id;";
                                        // echo $select;
                                        $result = mysqli_query($con, $select);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $count + 1; ?></td>
                                                    <td>
                                                        <?php echo htmlspecialchars($row["coupon_code"] ?? 'null'); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($row["coupon_type"] ?? 'null'); ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (isset($row["coupon_value"])) {
                                                            if ($row["coupon_type"] == 'Percentage') {
                                                                echo htmlspecialchars($row["coupon_value"]) . '%'; // Append '%' for percentage type
                                                            } else {
                                                                echo htmlspecialchars($row["coupon_value"]);
                                                            }
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($row["plan_name"] ?? 'null'); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($row["plan_group_name"] ?? 'null'); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($row["billing_cycle"] ?? 'null'); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($row["status"] ?? 'null'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="manageCoupon.php?id=<?php echo $row['coupon_id'] ?>" class="btn btn-primary">Edit</a>
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






</body>

</html>