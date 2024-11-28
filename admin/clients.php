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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Clients - YouStable.com</title>
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
            <h1>Clients</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Clients</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Clients</h5>

                                <form action="" method="GET" id="dateFilterForm" class="ml-auto">
                                    <select name="date" onchange="document.getElementById('dateFilterForm').submit();" class="form-select border">
                                        <option value="">Filter Data</option>
                                        <option value="<?php echo htmlspecialchars($dateToday); ?>" <?php echo ($selectedDate == $dateToday) ? 'selected' : ''; ?>>Today</option>
                                        <option value="<?php echo htmlspecialchars($dateYesterday); ?>" <?php echo ($selectedDate == $dateYesterday) ? 'selected' : ''; ?>>Yesterday</option>
                                        <option value="<?php echo htmlspecialchars($dateTwoDaysAgo); ?>" <?php echo ($selectedDate == $dateTwoDaysAgo) ? 'selected' : ''; ?>>2 Days Ago</option>
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
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Send Data</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include '../db.php';
                                    $count = 0;

                                    $select = "SELECT * FROM `client`";
                                    if ($selectedDate != '') {
                                        $select .= " WHERE DATE(date) = '$selectedDate'";
                                    }

                                    $select .= " ORDER BY `client`.date DESC";
                                    $result = mysqli_query($con, $select);

                                    $uniqueEmails = [];

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if (!in_array($row["email"], $uniqueEmails)) {
                                                $uniqueEmails[] = $row["email"];

                                    ?>
                                                <tr>
                                                    <td scope="row"><?php echo ++$count; ?></td>
                                                    <td scope="row"><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
                                                    <td scope="row"><?php echo $row["email"]; ?></td>
                                                    <td scope="row"><?php echo $row["phonenumber"]; ?></td>
                                                    <td scope="row"><?php echo $row["date"]; ?></td>
                                                    <td scope="row">
                                                        <a href="orders.php?email=<?php echo $row['email'] ?>&&server_id=<?php echo $row["server_client_id"] ?>"
                                                            class="btn text-white" style="background:var(--bs-primary);"><i
                                                                class="fa-solid fa-cart-shopping"></i>
                                                            Orders</a>
                                                        &nbsp;
                                                        <a href="clients.php?client_id=<?php echo $row['id']; ?>"
                                                            class="btn btn-info text-white">
                                                            <i class="fa-solid fa-eye"></i> View
                                                        </a>


                                                    </td>
                                                    <td scope="row">
                                                        <?php
                                                        if ($row["is_del"] == 0) {
                                                        ?>
                                                            <a href="send-client.php?fname=<?php echo trim($row['fname']); ?>&&lname=<?php echo trim($row["lname"]); ?>&&email=<?php echo trim($row["email"]); ?>&&address=<?php echo trim($row["address"]); ?>&&city=<?php echo trim($row["city"]); ?>&&state=<?php echo trim($row["state"]); ?>&&postcode=<?php echo trim($row["postcode"]); ?>&&country=<?php echo trim($row["country"]); ?>&&phonenumber=<?php echo trim($row["phonenumber"]); ?>&&password=<?php echo trim($row["password"]); ?>"
                                                                class="btn text-white" style="background:var(--bs-success);">
                                                                <i class="fa-solid fa-server"></i> Send Data
                                                            </a>
                                                        <?php
                                                        } elseif ($row["is_del"] == 1) {
                                                        ?>
                                                            <a href="#"
                                                                class="btn text-white" style="background:var(--bs-warning);">
                                                                <i class="fa-solid fa-server"></i>Already Send
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>

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
        <?php if ($_SESSION['success_message']): ?>
            toastr.success('<?php echo $_SESSION['success_message']; ?>');
        <?php unset($_SESSION['success_message']);
        elseif ($_SESSION['error_message']): ?>
            toastr.error('<?php echo $_SESSION['error_message']; ?>');
        <?php unset($_SESSION['errerror_messageor']);
        endif; ?>
    </script>
    <?php
    $client_id = isset($_GET['client_id']) ? intval($_GET['client_id']) : 0;
    $client_data = null;

    if ($client_id > 0) {
        $query = "SELECT * FROM client WHERE id = $client_id";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $client_data = mysqli_fetch_assoc($result);
        }
    }
    ?>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Client Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if ($client_data): ?>
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Name:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['fname']) . " " . htmlspecialchars($client_data['lname']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Email:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['email'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Phone Number:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['phonenumber'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Address:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['address'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Country:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['country'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>State:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['state'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>City:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['city'] ?? ''); ?>
                                </td>
                            </tr>

                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>PostCode:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['postcode'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Server Client Id:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['server_client_id'] ?? ''); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px;"><strong>Date Registered:</strong></td>
                                <td style="border: 1px solid #ddd; padding: 8px; color:#0000FF;">
                                    <?php echo htmlspecialchars($client_data['date'] ?? ''); ?>
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

    <?php if ($client_data): ?>
        <script>
            $(document).ready(function() {
                $('#staticBackdrop').modal('show');
            });
        </script>
    <?php endif; ?>
    <script>
        setTimeout(function() {

            let url = new URL(window.location.href);

            if (url.searchParams.has('date')) {
                url.searchParams.delete('date');

                window.history.replaceState({}, document.title, url.toString());
                location.reload();
            }
            if (url.searchParams.has('client_id')) {
                url.searchParams.delete('client_id');

                window.history.replaceState({}, document.title, url.toString());
                location.reload();
            }
        }, 5000);
    </script>

</body>

</html>