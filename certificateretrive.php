<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Certificate</title>
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        img {
            margin-top: 20px;
            max-width: 100%;
        }
        .download-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }
        .download-btn:hover {
            background-color: #0056b3;
        }
    </style>
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

    
    <style>
        .download-btn{
            background-color:#fd9200;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body style="background-color: white;">

     <!--start of navbar-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light px-4"> <!-- Added px-4 for horizontal padding -->
        <a class="navbar-brand" href="#">
            <img src="img/wordmark2.png" alt="Logo" style="height: 30px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" onclick="home()">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Courses
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" onclick="aws()">AWS Cloud</a>
                        <a class="dropdown-item" onclick="ds()">Data Science</a>
                        <a class="dropdown-item" onclick="uiux()">UI/UX</a>
                        <a class="dropdown-item" onclick="cicsa()">CICSA</a>
                        <a class="dropdown-item" onclick="ccna()">CCNA</a>
                        <a class="dropdown-item" onclick="rhel()">RHEL LINUX</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="certificate()">Certificate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://wa.me/9363097405">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!--end of navbar-->
    <br><br>

<div class="container">
    <h4>Download Certificate</h4>
    <form action="certificateretrive.php" method="GET">
        <input type="text" name="candidate_register_id" placeholder="Enter Register ID" required>
        <input type="submit" value="Retrieve"  style="background-color:#fd9200;">
    </form><br><br>

    <?php
    if (isset($_GET['candidate_register_id'])) {
        $candidate_register_id = $_GET['candidate_register_id'];

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

        $sql = "SELECT candidate_name, certificate_image FROM certificates WHERE candidate_register_id = '$candidate_register_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<h3>Hello! <b><i>" . $row["candidate_name"] . "</i></b></h3>";
                echo "<h6><i>Here is your certificate</i></h6>";
                echo "<img src='" . $row["certificate_image"] . "' alt='Certificate'>";
                echo "<a href='" . $row["certificate_image"] . "' download class='download-btn'>Download Certificate</a>";
            }
        } else {
            echo "No records found!";
        }

        $conn->close();
    }
    ?>
</div>

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
</script>

</body>
</html>
