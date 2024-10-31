<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "mwc-rkms");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form data
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $nrc = $conn->real_escape_string($_POST['nrc']);
    $place = $conn->real_escape_string($_POST['place']);
    $city = $conn->real_escape_string($_POST['city']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $nextofkin = $conn->real_escape_string($_POST['nextofkin']);
    $nextofkin_phone = $conn->real_escape_string($_POST['nextofkin_phone']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $department = $conn->real_escape_string($_POST['department']);
    $health = $conn->real_escape_string($_POST['health']);
    $academic_level = $conn->real_escape_string($_POST['academic_level']);
    $licenses = json_encode($_POST['licenses']); // Encode licenses as JSON

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO workers (firstname, surname, nrc, place, city, phone, next_of_kin, nextofkin_phone, dob, department, health_condition, academic_level, licenses) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $firstname, $surname, $nrc, $place, $city, $phone, $nextofkin, $nextofkin_phone, $dob, $department, $health, $academic_level, $licenses);

    // Execute and check for errors
    if ($stmt->execute()) {
        // Redirect to supervisor dashboard
        header("Location: supervisor-dashboard.php"); 
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }
    

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
