<?php
// Database connection details
$servername = "localhost"; // Change if not using localhost
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "travel"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $departure = $conn->real_escape_string($_POST['departure']);
    $destination = $conn->real_escape_string($_POST['destination']);
    $departure_date = $conn->real_escape_string($_POST['departure-date']);
    $return_date = !empty($_POST['return-date']) ? $conn->real_escape_string($_POST['return-date']) : NULL;
    $class = $conn->real_escape_string($_POST['class']);
    $passengers = (int)$_POST['passengers'];

    // Insert data into the database
    $sql = "INSERT INTO sai (name, email, phone, departure_city, destination_city, departure_date, return_date, class, passengers)
            VALUES ('$name', '$email', '$phone', '$departure', '$destination', '$departure_date', '$return_date', '$class', $passengers)";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
