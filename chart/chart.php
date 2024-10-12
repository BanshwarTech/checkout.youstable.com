<?php

include '../db.php';

// SQL query to count the number of plans by planName
$sql = "SELECT planName, COUNT(*) as count FROM `order` WHERE is_del = 0 GROUP BY planName";
$result = $con->query($sql);

$labels = [];
$values = [];

// Fetch data into arrays
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['planName'];
        $values[] = $row['count'];
    }
} else {
    echo "0 results";
}

// Close the connection
$con->close();
?>

<style>
    .chartBox {
        width: 400px;
        ;
    }
</style>
<div class="chartBox">
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // setup block 
    const data = {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Count of Plans',
            data: <?php echo json_encode($values); ?>,
            backgroundColor: [
                '#0000FF',
                '#0ca0e5',
                '#09523e',
                '#3f6f0f',
                '#180f6f',
                '#5f0f6f',
                '#6f0f46'
            ],
            borderColor: [
                '#0000FF',
                '#0ca0e5',
                '#09523e',
                '#3f6f0f',
                '#180f6f',
                '#5f0f6f',
                '#6f0f46'
            ],
        }]
    };

    // config block 
    const config = {
        type: 'doughnut',
        data,

    };

    // render block
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>