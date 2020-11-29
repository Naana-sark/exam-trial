<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mystery Law</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href = "register.css" type = "text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    
 
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
      
    

</head>
<body id="page-top"> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../home/index.php">Mystery Law</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                        
                    </a>
                </li >
                <li class="nav-item ">
                    <a class="nav-link" href="individual.php">Individual</a>
                    
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="lawyer.php">Lawyer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="judge.php">Judge</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href=cases.php>Cases</a>
                   
                </li>
            </ul>
        </div>
        </div>
    </nav>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "NATS96322022";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result1=mysqli_query($conn,"SELECT count(*) as total from individuals");
$data=mysqli_fetch_assoc($result1);
echo "<strong> Total number of individuals in the table are : </strong> ";
echo  $data['total'];
echo "<br>";
echo "<br>";

$sql = "SELECT * FROM individuals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Gender</th><th>Date of Birth</th>
    <th>Crime Committed</th><th>Case ID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"]. " " . $row["lname"]. "</td><td>" .
         $row["gender"]. "</td><td>" . $row["dob"]. "</td><td>" . $row["crimecommitted"]. "</td><td>" . $row["case_id"]. 
         "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
