<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
   
    $db = mysqli_connect('localhost', 'root', '', 'NATS96322022');
    if(mysqli_connect_error()) {
        die('Connection error ('. mysqli_connect_errno().')');
    }
    
    // Prepare a select statement
    $sql = "SELECT * FROM individuals WHERE id = ?";
    
    if($stmt = $db->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row['fname'] .' '. $row['lname'];
                $gender = $row['gender'];
                $dob = $row['dob'];
                $crimecom=$row['crimecommitted'];
                $caseid=$row['case_id'];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    $stmt->close();
    
    // Close connection
    $db->close();
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Mystery Law</title>
      
        <link rel="stylesheet" href = "register.css" type = "text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
  
</head>
<body id = "page-top">
<div class ="jumbotron" style="background-color:  rgb(211, 138, 138);">
    <!-- <div class="container"  > -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
   
        <div class ="container">
            <a class="navbar-brand" href="../home/index.php">Mystery Law</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" style="list-style-type: none; display:inline;">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home   
                    </a>
                </li >
                <li class="nav-item ">
                    <a class="nav-link" href="individindex.php">Individual</a>  
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="lawindex.php">Lawyer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="judgeindex.php">Judge</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="caseindex.php">Cases</a>
                   
                </li>
            </ul>
        </div>
        </div>
        
    </nav>
    <!-- </div> -->
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row['fname'] .' '. $row['lname']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <p class="form-control-static"><?php echo $row['gender']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <p class="form-control-static"><?php echo $row['dob']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Crime Committed</label>
                        <p class="form-control-static"><?php echo $row['crimecommitted']; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Case ID</label>
                        <p class="form-control-static"><?php echo $row['case_id']; ?></p>
                    </div>
                    <p><a href="individindex.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>