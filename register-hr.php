<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Registration</title>
    <link rel="stylesheet" href="css/general-styles.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="img/mwc-logo.png" alt="MWC Logo"></a>
        </div>
        <ul class="nav-links" id="nav-links">
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="policy.php">Policy</a></li>
        </ul>
        <!-- Hamburger Menu Icon -->
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- HR Registration Form -->
    <section class="register-form">
        <h1>HR Registration</h1>
        <form action="" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="submit-btn">Register</button>
        </form>

        <?php
        // Include database connection
        include 'db-connection.php';

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO hr_users (name, email, phone, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

            // Set parameters
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<p>Registration successful!</p>";
                header("Location: login.php");
                exit();
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 MWC. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
