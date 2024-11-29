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

function fetchData($timePeriod)
{
  global $con;
  $sql = "SELECT planName, COUNT(*) as count FROM `order` WHERE is_del = 0"; // Modify the query as needed

  // Add condition based on the time period
  if ($timePeriod == 'today') {
    $sql .= " AND DATE(orderDate) = CURDATE()"; // Assuming orderDate is the date column
  } elseif ($timePeriod == 'this_month') {
    $sql .= " AND MONTH(orderDate) = MONTH(CURDATE()) AND YEAR(orderDate) = YEAR(CURDATE())";
  } elseif ($timePeriod == 'this_year') {
    $sql .= " AND YEAR(orderDate) = YEAR(CURDATE())";
  }

  $sql .= " GROUP BY planName";

  $result = $con->query($sql);

  if (!$result) {
    echo "Error: " . $con->error; // Log any SQL errors
  }

  $data = [];
  // Fetch data into an array
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = ['value' => $row['count'], 'name' => $row['planName']];
    }
  }

  return $data; // Return data array
}

// Fetch today's data by default
$initialData = fetchData('today');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - YouStable.com</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://www.youstable.com/assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
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

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
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

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">



            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-12">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Clients </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>

                    <div class="ps-3">
                      <?php


                      $query = "SELECT COUNT(*) as total FROM client";
                      $result = mysqli_query($con, $query);

                      if ($result) {
                        $row = $result->fetch_assoc();
                        $count = $row['total']; ?>
                        <h6><?php echo $count; ?></h6>
                      <?php

                      } else { ?>
                        <h6><?php echo $con->error; ?></h6>
                      <?php

                      }
                      ?>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-6 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Orders </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-order-play-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php


                      $query = "SELECT COUNT(*) as total FROM `order`";
                      $result = mysqli_query($con, $query);

                      if ($result) {
                        $row = $result->fetch_assoc();
                        $count = $row['total']; ?>
                        <h6><?php echo $count; ?></h6>
                      <?php

                      } else { ?>
                        <h6><?php echo $con->error; ?></h6>
                      <?php

                      }
                      ?>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Admin Details </h5>



                </div>

              </div>
            </div><!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#" data-period="today">Today</a></li>
                <li><a class="dropdown-item" href="#" data-period="this_month">This Month</a></li>
                <li><a class="dropdown-item" href="#" data-period="this_year">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Total Orders <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="chartBox"></div>

              <script>
                const myChart = echarts.init(document.querySelector("#trafficChart"));

                // Function to set chart options
                function setChartOptions(chartData) {
                  myChart.setOption({
                    tooltip: {
                      trigger: 'item',
                      formatter: function(params) {
                        return `${params.name}: ${params.value}`;
                      }
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Count of Plans',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '14',
                          fontWeight: 'bold',
                          formatter: '{b}\n{c}' // Display name and count on hover
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: chartData // Data fetched from the database
                    }]
                  });
                }

                // Set initial chart data
                setChartOptions(<?php echo json_encode($initialData); ?>);

                // Fetch data based on the selected time period
                document.querySelectorAll('.dropdown-item').forEach(item => {
                  item.addEventListener('click', function() {
                    const selectedPeriod = this.getAttribute('data-period');

                    // AJAX request to fetch data for the selected period
                    fetch(`fetch_data.php?timePeriod=${selectedPeriod}`)
                      .then(response => response.json())
                      .then(data => {
                        console.log("Fetched Data:", data); // Log the fetched data

                        if (data.length === 0) {
                          // Show alert if no data is available
                          alert('No data available for the selected time period.');
                          // Clear the chart or set it to an empty state
                          myChart.setOption({
                            series: [{
                              data: [] // Clear the chart data
                            }]
                          });
                        } else {
                          setChartOptions(data); // Update chart with new data
                        }
                      })
                      .catch(error => console.error('Error fetching data:', error));
                  });
                });
              </script>


            </div>
          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>YouStable</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="https://youstable.com/">YouStable</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>