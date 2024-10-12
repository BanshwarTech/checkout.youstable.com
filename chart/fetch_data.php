<?php
include '../db.php';

if (isset($_GET['timePeriod'])) {
    $timePeriod = $_GET['timePeriod'];

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

    // Get data for the selected time period
    $data = getData($timePeriod);

    // Return data as JSON
    echo json_encode($data);
}

// Close the connection
$con->close();
