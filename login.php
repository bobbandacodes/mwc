<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/general-styles.css">
    <link rel="stylesheet" href="css/login.css">
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
        <!-- Hamburger Menu Icon -->
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

        <!-- Registration Section -->
        <section class="register-selection">
        <h1>LOGIN AS</h1>
        <div class="button-container">
            <a href="login-hr.php" class="register-btn">HR</a>
            <a href="login-supervisor.php" class="register-btn">Supervisor</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 MWC. All rights reserved.</p>
    </footer>

    <!-- Link to the external JavaScript for Hamburger Menu -->
    <script src="js/script.js"></script>
</body>
</html>
