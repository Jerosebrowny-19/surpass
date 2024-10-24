<?php
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$dbname = "certificateDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $candidate_name = $_POST['candidate_name'];
    $candidate_register_id = $_POST['candidate_register_id'];

    // Handling file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["certificate_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["certificate_image"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    // Move uploaded file
    if (!move_uploaded_file($_FILES["certificate_image"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }

    // Insert into database
    $sql = "INSERT INTO certificates (candidate_name, candidate_register_id, certificate_image) 
            VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error in SQL statement: " . $conn->error);
    }

    // Bind the parameters (s = string, s = string, s = string)
    $stmt->bind_param("sss", $candidate_name, $candidate_register_id, $target_file);

    // Execute the query
    if ($stmt->execute()) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
