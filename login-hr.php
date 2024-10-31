<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Login</title>
    <link rel="stylesheet" href="css/general-styles.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="img/mwc-logo.png" alt="MWC Logo"></a>
        </div>
        <ul class="nav-links" id="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="policy.php">Policy</a></li>
        </ul>
    </nav>

    <!-- HR Login Form -->
    <section class="login-form">
        <h1>HR Login</h1>
        <form action="login-hr.php" method="POST">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login-hr" class="submit-btn">Login</button>
        </form>
    </section>

    <?php
    if (isset($_POST['login-hr'])) {
        include 'db-connection.php';

        // Get form values
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $password = $_POST['password'];

        // Retrieve user data
        $sql = "SELECT * FROM hr_users WHERE name = '$fullname'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            // Redirect to HR dashboard
            header("Location: hr-dashboard.php");
            exit();
        } else {
            echo "<p>Incorrect fullname or password. Please try again.</p>";
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>

    <script src="js/script.js"></script>
</body>
</html>
