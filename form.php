<?php
// form.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "surpass_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO signups (name, email, phone) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $phone);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$stmt->execute();

// Close connection
$stmt->close();
$conn->close();

// Redirect back to the index page
header("Location: index.html");
exit();
?>
