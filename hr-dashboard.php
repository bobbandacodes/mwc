<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "mwc-rkms";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Queries for Dashboard Summary
// Total workers
$totalWorkers = $conn->query("SELECT COUNT(*) AS count FROM workers")->fetch_assoc()['count'];

// Workers by department
$workersByDept = $conn->query("SELECT department, COUNT(*) AS count FROM workers GROUP BY department");

// Top Performing Workers (assuming performance score is stored)
$topPerformers = $conn->query("SELECT firstname, surname, performance_score FROM workers ORDER BY performance_score DESC LIMIT 5");

// Absenteeism Rate (Example calculation for absenteeism, assuming a table of absences)
$absenteeismRate = $conn->query("SELECT COUNT(*) / (SELECT COUNT(*) FROM workers) * 100 AS rate FROM absences WHERE MONTH(date) = MONTH(CURDATE())")->fetch_assoc()['rate'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HR Dashboard</title>
    <link rel="stylesheet" href="css/hr-dashboard.css">
</head>
<body>
    <h1>HR Dashboard</h1>

    <!-- Overview Section -->
    <div class="overview">
        <h2>Overview</h2>
        <div>Total Workers: <?= $totalWorkers ?></div>
        <div>Absenteeism Rate: <?= number_format($absenteeismRate, 2) ?>%</div>
    </div>

    <!-- Workforce Composition -->
    <div class="workforce-composition">
        <h2>Workforce Composition by Department</h2>
        <table>
            <tr>
                <th>Department</th>
                <th>Number of Workers</th>
            </tr>
            <?php while ($dept = $workersByDept->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($dept['department']) ?></td>
                    <td><?= $dept['count'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <!-- Performance Tracking -->
    <div class="performance-tracking">
        <h2>Top Performing Workers</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Performance Score</th>
            </tr>
            <?php while ($worker = $topPerformers->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($worker['firstname'] . " " . $worker['surname']) ?></td>
                    <td><?= $worker['performance_score'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    
    <?php $conn->close(); ?>
</body>
</html>
