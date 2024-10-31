<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Registration</title>
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
            <li><a href="register-hr.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="policy.php">Policy</a></li>
        </ul>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Supervisor Registration Form -->
    <section class="register-form">
        <h1>Register as Supervisor</h1>
        <form action="register-supervisor.php" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="register-supervisor" class="submit-btn">Register</button>
        </form>
    </section>

    <?php
    // Handle form submission
    if (isset($_POST['register-supervisor'])) {
        include 'db-connection.php';

        // Get form values and hash the password
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Insert into the supervisors table
        $sql = "INSERT INTO supervisors (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";

        if (mysqli_query($conn, $sql)) {
            // Redirect to login page after successful registration
            header("Location: login.php");
            exit();
        } else {
            echo "<p>Registration failed: " . mysqli_error($conn) . "</p>";
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>

    <script src="js/script.js"></script>
</body>
</html>
