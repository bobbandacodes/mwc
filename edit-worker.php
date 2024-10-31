

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Worker</title>
    <link rel="stylesheet" href="css/edit-worker.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Maroon White</h2>
        <ul>
            <li><a href="dashboard-supervisor.html"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="workers-list.php"><i class="fas fa-users"></i> Workers List</a></li>
            <li><a href="request-reports.html"><i class="fas fa-file-alt"></i> Request Reports</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
        <h2>Edit Worker: <?php echo isset($worker) ? htmlspecialchars($worker['firstname']) . ' ' . htmlspecialchars($worker['surname']) : 'Unknown Worker'; ?></h2>
        </header>

        <!-- Edit Worker Form -->
        <!-- Edit Worker Form -->
<form method="POST" action="">
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo isset($worker['firstname']) ? htmlspecialchars($worker['firstname']) : ''; ?>" required>
    </div>

    <div class="form-group">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" id="surname" value="<?php echo isset($worker['surname']) ? htmlspecialchars($worker['surname']) : ''; ?>" required>
    </div>

    <div class="form-group">
        <label for="nrc_number">NRC Number:</label>
        <input type="text" name="nrc_number" id="nrc_number" value="<?php echo isset($worker['nrc_number']) ? htmlspecialchars($worker['nrc_number']) : ''; ?>" required>
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo isset($worker['address']) ? htmlspecialchars($worker['address']) : ''; ?>" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" value="<?php echo isset($worker['phone']) ? htmlspecialchars($worker['phone']) : ''; ?>" required>
    </div>

    <div class="form-group">
        <label for="next_of_kin">Next of Kin:</label>
        <input type="text" name="next_of_kin" id="next_of_kin" value="<?php echo isset($worker['next_of_kin']) ? htmlspecialchars($worker['next_of_kin']) : ''; ?>" required>
    </div>

    <div class="form-group">
        <button type="submit">Update Worker</button>
    </div>
</form>

    </div>
</body>

<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "mwc-rkms";
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the worker ID is set in the URL
if (isset($_GET['id'])) {
    $worker_id = intval($_GET['id']);

    // Fetch worker details to pre-fill the form
    $worker_sql = "SELECT * FROM workers WHERE id = ?";
    $stmt = $conn->prepare($worker_sql);
    $stmt->bind_param("i", $worker_id);
    $stmt->execute();
    $worker_result = $stmt->get_result();

    if ($worker_result->num_rows > 0) {
        $worker = $worker_result->fetch_assoc();
    } else {
        die("Worker not found.");
    }

    // Handle form submission for updating worker details
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $conn->real_escape_string($_POST['firstname']);
        $surname = $conn->real_escape_string($_POST['surname']);
        $nrc_number = $conn->real_escape_string($_POST['nrc_number']);
        $address = $conn->real_escape_string($_POST['address']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $next_of_kin = $conn->real_escape_string($_POST['next_of_kin']);

        // Update worker details in the database
        $update_sql = "UPDATE workers SET firstname = ?, surname = ?, nrc_number = ?, address = ?, phone = ?, next_of_kin = ? WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ssssssi", $firstname, $surname, $nrc_number, $address, $phone, $next_of_kin, $worker_id);

        if ($stmt->execute()) {
            echo "Worker details updated successfully!";
            header("Location: workers-list.php?message=Worker+updated+successfully");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $stmt->close();
} else {
    die("Worker ID not provided.");
}

$conn->close();
?>

</html>
