<?php
// Database configuration
$servername = "localhost"; // Change if different
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "travel"; // Change to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $blood_group = $_POST['blood_group'];
    $department = $_POST['department'];
    $courses = isset($_POST['course']) ? implode(", ", $_POST['course']) : "";
    
    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO students (name, father_name, mother_name, phone, email, gender, dob, address, blood_group, department, courses) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $father_name, $mother_name, $phone, $email, $gender, $dob, $address, $blood_group, $department, $courses);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
