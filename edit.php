<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "certificateDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing data if ID is set
$candidate_id = isset($_GET['id']) ? $_GET['id'] : 0;
$candidate_name = '';
$candidate_register_id = '';
$certificate_image = '';

if ($candidate_id) {
    $sql = "SELECT * FROM certificates WHERE id = $candidate_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $candidate_name = $row['candidate_name'];
        $candidate_register_id = $row['candidate_register_id'];
        $certificate_image = $row['certificate_image'];
    }
}

// Handle form submission for updating the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $candidate_name = $_POST['candidate_name'];
    $candidate_register_id = $_POST['candidate_register_id'];

    // Handle file upload if a new file is provided
    if ($_FILES['certificate_image']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["certificate_image"]["name"]);
        move_uploaded_file($_FILES["certificate_image"]["tmp_name"], $target_file);
        $certificate_image = $target_file;
    }

    $sql = "UPDATE certificates SET candidate_name = '$candidate_name', candidate_register_id = '$candidate_register_id', certificate_image = '$certificate_image' WHERE id = $candidate_id";
    $conn->query($sql);
    header('Location: admin.php');
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Certificate</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #fd9200;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #e68a00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Certificate</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="candidate_name" value="<?php echo $candidate_name; ?>" required placeholder="Candidate Name">
            <input type="text" name="candidate_register_id" value="<?php echo $candidate_register_id; ?>" required placeholder="Register ID">
            <input type="file" name="certificate_image" accept="image/*">
            <input type="submit" value="Update Certificate">
        </form>
        <?php if ($certificate_image): ?>
            <img src="<?php echo $certificate_image; ?>" alt="Certificate Image" style="max-width: 100%; margin-top: 20px;">
        <?php endif; ?>
    </div>
</body>
</html>
