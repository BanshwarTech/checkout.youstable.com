<?php
include '../db.php';

// Function to fetch initial data (optional, if needed)
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

    $data = [];
    // Fetch data into an array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = ['value' => $row['count'], 'name' => $row['planName']];
        }
    }

    return $data; // Return data array
}

$initialData = fetchData('today');

// Close the connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECharts Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <style>
        .chartBox {
            width: 400px;
            height: 400px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i>dropdown</a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>
            <li><a class="dropdown-item" href="#" data-period="today">Today</a></li>
            <li><a class="dropdown-item" href="#" data-period="this_month">This Month</a></li>
            <li><a class="dropdown-item" href="#" data-period="this_year">This Year</a></li>
        </ul>
    </div>

    <div class="chartBox" id="trafficChart"></div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>