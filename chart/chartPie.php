<?php
include '../db.php';

// Function to get data based on the selected time period
function getData($timePeriod)
{
    global $con; // Access the database connection

    switch ($timePeriod) {
        case 'today':
            $date = date('Y-m-d');
            $sql = "SELECT planName, COUNT(*) as count 
                    FROM `order` 
                    WHERE is_del = 0 AND DATE(orderDate) = '$date'
                    GROUP BY planName";
            break;

        case 'this_month':
            $sql = "SELECT planName, COUNT(*) as count 
                    FROM `order` 
                    WHERE is_del = 0 AND MONTH(orderDate) = MONTH(CURRENT_DATE()) 
                    AND YEAR(orderDate) = YEAR(CURRENT_DATE())
                    GROUP BY planName";
            break;

        case 'one_month_ago':
            $sql = "SELECT planName, COUNT(*) as count 
                    FROM `order` 
                    WHERE is_del = 0 AND MONTH(orderDate) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) 
                    AND YEAR(orderDate) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)
                    GROUP BY planName";
            break;

        case 'two_months_ago':
            $sql = "SELECT planName, COUNT(*) as count 
                    FROM `order` 
                    WHERE is_del = 0 AND MONTH(orderDate) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH) 
                    AND YEAR(orderDate) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH)
                    GROUP BY planName";
            break;

        default:
            return [];
    }

    $result = $con->query($sql);

    $data = [];
    // Fetch data into an array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = ['value' => $row['count'], 'name' => $row['planName']];
        }
    }

    return $data;
}

// Get initial data for today
$initialData = getData('today');

// Close the connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECharts Example</title>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chartBox {
            width: 400px;
            height: 400px;
            margin: auto;
        }

        .dropdown {
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="dropdown">
            <label for="dateSelector">Select Time Period:</label>
            <div class="col-sm-12 ">
                <select id="dateSelector" class="form-select form-control" aria-label="Select Time Period">
                    <option value="today">Today</option>
                    <option value="this_month">This Month</option>
                    <option value="one_month_ago">One Month Ago</option>
                    <option value="two_months_ago">Two Months Ago</option>
                </select>
            </div>
        </div>
        <div class="chartBox" id="trafficChart"></div>
    </div>

    <script>
        document.getElementById('dateSelector').addEventListener('change', function() {
            const selectedValue = this.value;
            console.log('Selected time period:', selectedValue);
            // You can add functionality based on the selected value here
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        document.getElementById('dateSelector').addEventListener('change', function() {
            const selectedPeriod = this.value;

            // AJAX request to fetch data for the selected period
            fetch(`fetch_data.php?timePeriod=${selectedPeriod}`)
                .then(response => response.json())
                .then(data => {
                    setChartOptions(data); // Update chart with new data
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
</body>

</html>