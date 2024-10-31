<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Maroon White Record Keeping System</title>
    <link rel="stylesheet" href="css/s-dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For Icons -->
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="index.php"><h2>MWC</h2></a> 
        <ul>
            <li><a href="#"><i class="fas fa-building"></i> Branches</a></li>
            <li><a href="addWorker.php"><i class="fas fa-user-plus"></i> Add New Worker</a></li>
            <li><a href="workers-list.php"><i class="fas fa-search"></i>Search for Worker</a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> Request Reports</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h2>Welcome, [HR/Supervisor]</h2>
        </header>
        <div class="dashboard-actions">
            <!-- Card for Add New Worker -->
            <a href="addWorker.php" class="dashboard-card">
                <i class="fas fa-user-plus"></i>
                <h3>Add Worker</h3>
            </a>

            <!-- Card for Search Worker -->
            <a href="workers-list.php" class="dashboard-card">
                <i class="fas fa-search"></i>
                <h3>Search Worker</h3>
            </a>

            <!-- Card for Request Reports -->
            <a href="reports.php" class="dashboard-card">
                <i class="fas fa-file-alt"></i>
                <h3>Reports</h3>
            </a>
        </div>
    </div>

    <script src="dashboard.js"></script>
</body>
<!-- Footer -->
<center>
 <footer>
    <div class="footer-container">
        <div class="footer-left">
            <h3>Maroon White Cleaners</h3>
            <p>&copy; 2024 Maroon White Cleaners. All rights reserved.</p>
        </div>
        <div class="footer-right">
            <ul class="footer-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="workers-list.php">Workers List</a></li>
            </ul>
        </div>
    </div>
</footer>
</center>

</html>
