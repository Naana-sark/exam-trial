<?php
//check connection 
$db = mysqli_connect('localhost', 'root', '', 'NATS96322022');
if(mysqli_connect_error()) {
    die('Connection error ('. mysqli_connect_errno().')');
}

//getting the id and displaying in the form
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
$id=$_GET['id'];

$sql= "SELECT * FROM cases where case_id = '$id' ";
$result=$db->query($sql);
if($result->num_rows>0){

    while($row=$result->fetch_assoc()){
        $casev = $row['case_verdict'];
        $courtp= $row['court_procedures'];
       
    }
}
else{
    echo "0 results";
}

}
//update the information in the database

if (isset($_POST["update"])){
    $id=$_POST['id'];
    $casev = $_POST['casev'];
    $courtp= $_POST['courtp'];


    $up="UPDATE `cases` SET `case_verdict`='$casev',`court_procedures`='$courtp' WHERE `case_id`='$id'";
    // echo $up;
    // return $up;

    if($db->query($up)){
        echo "Updated";
        header('location: caseindex.php');
    }
    else{
        echo "\nError: ". $db->error;
    }
}

   


        ?>

<!DOCTYPE html>
<html>
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

   
    <body id="page-top"> 
    <div class ="jumbotron" style="background-color:  rgb(211, 138, 138);">
  
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
                    <a class="nav-link" href="caseindex.php">Cases</a>>
                   
                </li>
            </ul>
        </div>
        </div>
        
    </nav>




<div class="container" id="form-special">
       <h3 style="text-align:center;">Update Case Form</h3>
        <form id = "pageForm" action="updatecases.php" method="POST">
            <div class="form-group">
                <input id = "id" name = "id" type = "hidden" value="<?php echo $id; ?>"><br>
                <label for = "caseverd"> Case Verdict</label>
                <input id = "casev" class="form-control" name = "casev" type = "text" value="<?php echo $casev; ?>" required><br>
               
                <label for = "courtp"> Court Procedures Followed</label>
                <input id = "courtp" class="form-control" name = "courtp" type = "text" value="<?php echo $courtp; ?>" required><br>
               
                <button class="btn btn-primary" name="update" value= "update" type="submit">Update</button>

                </div>
        </form>
</div>
    </div>
    </body>
</html>