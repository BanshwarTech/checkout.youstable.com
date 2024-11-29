<?php
session_start();
if ($_SESSION['ADMIN_USER'] == '') {
    $_SESSION['error'] = "First you have to login";
    header('Location: login.php');
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../db.php';
// Fetch Plan Groups
$planGroups = $con->query("SELECT * FROM plangroup")->fetch_all(MYSQLI_ASSOC);

// Fetch Plans
$plans = $con->query("SELECT * FROM plans")->fetch_all(MYSQLI_ASSOC);
// Fetch Pricing and Billing Cycles
$pricing = $con->query("SELECT * FROM plan_pricing")->fetch_all(MYSQLI_ASSOC);
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
                        <li class="breadcrumb-item active">Manage Coupon</li>
                    </ol>
                </nav>
            </div>
            <div>
                <!-- Vertically centered Modal -->
                <a href="coupons.php" class="btn btn-primary">
                    Back
                </a><!-- End Vertically centered Modal-->
            </div>
        </div>




        <section class="section" id="addCoupon">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Manage Coupons</h5>

                            </div>
                            <?php
                            $coupon = null;
                            $plangroup_name_id = 0;
                            $plan_name_id = 0;
                            $billing_cycle = null;
                            if (isset($_GET['id'])) {
                                // Fetch coupon details for editing
                                $coupon_id = $_GET['id'];
                                $select = "SELECT c.id, c.coupon_code, c.coupon_type, c.coupon_value, c.billing_cycle, c.plan_name, c.plangroup_name FROM coupons c WHERE c.id = '$coupon_id'";
                                // echo $select;
                                $result = mysqli_query($con, $select);
                                if ($result) {
                                    $coupon = mysqli_fetch_assoc($result);
                                    $plangroup_name_id = $coupon['plangroup_name'];
                                    $plan_name_id = $coupon['plan_name'];
                                    $billing_cycle = $coupon['billing_cycle'];
                                }
                            }
                            ?>
                            <form action="includes/code.php?msg=addCoupon" method="post">
                                <div class="row">
                                    <div class="col-6 form-floating mt-2">

                                        <select name="planGroup" id="planGroup" class="form-select shadow-sm">
                                            <option value="">Select Plan Group</option>
                                        </select><label for="planGroup" class="form-label ms-2 ">Plan Group</label>
                                    </div>
                                    <div class="col-6 form-floating mt-2">

                                        <select name="planName" id="planName" class="form-select shadow-sm">
                                            <option value="">Select Plan Name</option>
                                        </select><label for="planName" class="form-label ms-2">Plan Name</label>
                                    </div>
                                    <div class="col-6 form-floating mt-2">

                                        <select name="billingCycle" id="billingCycle" class="form-select shadow-sm">
                                            <option value="">Select Billing Cycle</option>
                                        </select><label for="type" class="form-label ms-2 ">Billing Cycle</label>
                                    </div>
                                    <div class="col-6 form-floating mt-2">

                                        <input type="text" name="code" class="form-control text-uppercase shadow-sm" placeholder="Enter Coupon code" value="<?php echo isset($coupon) ? $coupon['coupon_code'] : ''; ?>"><label for="code" class="form-label ms-2 ">Coupon Code</label>
                                    </div>
                                    <div class="col-6 form-floating mt-2">

                                        <select name="type" id="" class="form-select shadow-sm">
                                            <option value="Percentage" <?php echo (isset($coupon) && $coupon['coupon_type'] == 'Percentage') ? 'selected' : ''; ?>>Percentage</option>
                                            <option value="Fixed" <?php echo (isset($coupon) && $coupon['coupon_type'] == 'Fixed') ? 'selected' : ''; ?>>Fixed</option>
                                        </select> <label for="type" class="form-label ms-2 ">Coupon type</label>
                                    </div>
                                    <div class="col-6 form-floating mt-2">

                                        <input type="text" name="value" class="form-control shadow-sm" placeholder="Enter Coupon Value" value="<?php echo isset($coupon) ? $coupon['coupon_value'] : ''; ?>"> <label for="type" class="form-label ms-2 ">Coupon Value</label>
                                    </div>

                                </div>

                                <div class="form-group mt-2">
                                    <!-- Hidden input for coupon id (only visible when editing) -->
                                    <?php if (isset($coupon)): ?>
                                        <input type="hidden" name="coupon_id" value="<?php echo $coupon['id']; ?>">
                                    <?php endif; ?>
                                    <input type="submit" class="btn btn-primary" value="<?php echo isset($coupon) ? 'Update' : 'Add'; ?>">
                                    <input type="reset" class="btn btn-secondary">
                            </form>
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
    <script>
        // Embed PHP data into JavaScript
        const previouslySelectedPlanGroupId = <?= $plangroup_name_id; ?>;
        const previouslySelectedPlanNameId = <?= $plan_name_id ?? 'null'; ?>; // Plan Name ID
        const previouslySelectedBillingCycle = <?= json_encode($billing_cycle ?? ''); ?>; // Billing Cycle

        const planGroups = <?php echo json_encode($planGroups); ?>;
        const plans = <?php echo json_encode($plans); ?>;
        const pricing = <?php echo json_encode($pricing); ?>;

        const planGroupSelect = document.getElementById('planGroup');
        const planNameSelect = document.getElementById('planName');
        const billingCycleSelect = document.getElementById('billingCycle');

        // Populate Plan Group Dropdown
        planGroups.forEach(group => {
            const option = document.createElement('option');
            option.value = group.pg_id;
            option.textContent = group.Name;
            if (group.pg_id == previouslySelectedPlanGroupId) {
                option.selected = true;
            }
            planGroupSelect.appendChild(option);
        });

        // Function to populate Plan Name based on Plan Group
        function populatePlanNameDropdown(groupId) {
            planNameSelect.innerHTML = '<option value="">Select Plan Name</option>'; // Reset Plan Name dropdown
            billingCycleSelect.innerHTML = '<option value="">Select Billing Cycle</option>'; // Reset Billing Cycle dropdown

            plans.filter(plan => plan.planGroup_id == groupId)
                .forEach(plan => {
                    const option = document.createElement('option');
                    option.value = plan.p_id;
                    option.textContent = plan.name;
                    if (plan.p_id == previouslySelectedPlanNameId) {
                        option.selected = true;
                    }
                    planNameSelect.appendChild(option);
                });
        }

        // Function to populate Billing Cycle based on Plan Name
        function populateBillingCycleDropdown(planId) {
            billingCycleSelect.innerHTML = '<option value="">Select Billing Cycle</option>'; // Reset Billing Cycle dropdown

            pricing.filter(price => price.plan_id == planId)
                .forEach(price => {
                    const option = document.createElement('option');
                    option.value = price.billing_cycle;
                    option.textContent = price.billing_cycle;
                    if (price.billing_cycle == previouslySelectedBillingCycle) {
                        option.selected = true;
                    }
                    billingCycleSelect.appendChild(option);
                });
        }

        // Event listener for Plan Group change
        planGroupSelect.addEventListener('change', e => {
            const selectedGroupId = e.target.value;
            populatePlanNameDropdown(selectedGroupId);
        });

        // Event listener for Plan Name change
        planNameSelect.addEventListener('change', e => {
            const selectedPlanId = e.target.value;
            populateBillingCycleDropdown(selectedPlanId);
        });

        // Initial population based on preselected values
        if (previouslySelectedPlanGroupId) {
            populatePlanNameDropdown(previouslySelectedPlanGroupId);
        }
        if (previouslySelectedPlanNameId) {
            populateBillingCycleDropdown(previouslySelectedPlanNameId);
        }
    </script>






</body>

</html>