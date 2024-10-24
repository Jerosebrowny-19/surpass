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

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM certificates WHERE id = $id";
    $conn->query($sql);
    header('Location: admin.php');
}

$sql = "SELECT * FROM certificates";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: #333;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #fd9200;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #fd9200;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #fd9200;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            background-color: #fd9200;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #e68a00; /* Darker shade on hover */
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Surpass</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</head>

<body style="background-color: white;">
   

     <!--start of navbar-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light px-4"> <!-- Added px-4 for horizontal padding -->
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" onclick="home()">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="certificate()">Certificate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="upload()">Upload</a>
                </li>
            </ul>
        </div>
    </nav>
    

    <h2>Certificate Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Register ID</th>
            <th>Certificate Image</th>
            <th>Actions</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['candidate_name'] . "</td>";
            echo "<td>" . $row['candidate_register_id'] . "</td>";
            echo "<td><img src='" . $row['certificate_image'] . "' alt='Certificate'></td>";
            echo "<td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                    <a href='admin.php?delete=" . $row['id'] . "'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>

    </table>

    <script>
    // Show button on scroll
    window.onscroll = function() {
        const button = document.querySelector('.back-to-top');
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            button.classList.add('show');
        } else {
            button.classList.remove('show');
        }
    };

    // Scroll to top when the button is clicked
    document.querySelector('.back-to-top').addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    function aws() {
            window.location.href = "aws.html"; // Replace with your target URL
        }

    function ds() {
            window.location.href = "Data science.html"; // Replace with your target URL
        }

    function uiux() {
            window.location.href = "UIUX.html"; // Replace with your target URL
        }

    function cicsa() {
            window.location.href = "SOC.html"; // Replace with your target URL
        }

    function ccna() {
            window.location.href = "CCNA.html"; // Replace with your target URL
        }

    function rhel() {
            window.location.href = "RHEL.html"; // Replace with your target URL
        }

    function certificate() {
            window.location.href = "certificate.php"; // Replace with your target URL
        }

        function home() {
            window.location.href = "index.html"; // Replace with your target URL
        }

        function upload() {
            window.location.href = "upload.html"; // Replace with your target URL
        }
</script>
</body>

</html>
