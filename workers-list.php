<?php
session_start();

// Check if supervisor_id is set in session
if (!isset($_SESSION['supervisor_id'])) {
    // Redirect to login if not set
    header("Location: login.php");
    exit();
}

$current_supervisor_id = $_SESSION['supervisor_id'];

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "mwc-rkms";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the query to fetch workers
$sql = "SELECT id, firstname, surname, phone, place, supervisor_id FROM workers";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT id, firstname, surname, phone, place, supervisor_id FROM workers WHERE firstname LIKE '%$search%' OR surname LIKE '%$search%'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Workers List</title>
    <link rel="stylesheet" href="css/workers-list.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For Icons -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h2><img src="img/mwc-logo.png" alt="Maroon White Logo" style="width: 100px;"></h2>
        <button class="hamburger" onclick="toggleSidebar()">&#9776;</button>
        <ul>
            <li><a href="dashboard-supervisor.html"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Workers List</a></li>
            <li><a href="request-reports.html"><i class="fas fa-file-alt"></i> Request Reports</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h2>Workers List</h2>
        </header>

        <!-- Search Bar -->
        <div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search workers by name...">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Workers Table -->
        <div class="workers-table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Place</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $workerName = htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['surname']);
                            echo "<tr>";
                            echo "<td>" . $workerName . "</td>";
                            echo "<td>" . htmlspecialchars($row['place']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                            echo "<td class='action-buttons'>";
                            echo "<a href='rate-worker.php?id=" . $row['id'] . "' class='btn rate-btn'>Rate</a>";
                            if ($row['supervisor_id'] == $current_supervisor_id) {
                                echo "<a href='edit-worker.php?id=" . $row['id'] . "' class='btn edit-btn'>Edit</a>";
                            }
                            echo "<a href='delete-worker.php?id=" . $row['id'] . "' class='btn delete-btn' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No workers found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php $conn->close(); ?>
</body>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("active");
    }
</script>
</html>
