<?php
//check connection 
$db = mysqli_connect('localhost', 'root', '', 'NATS96322022');
if(mysqli_connect_error()) {
    die('Connection error ('. mysqli_connect_errno().')');
}

//getting the id and displaying in the form
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
$id=$_GET['id'];

$sql= "SELECT * FROM lawyer where lawyer_id = '$id' ";
$result=$db->query($sql);
if($result->num_rows>0){

    while($row=$result->fetch_assoc()){
        $fname = $row['fname'];
        $lname= $row['lname'];
        $case_id=$row['case_id'];
        $contact=$row['contactnum1'];
        $gender = $row['gender'];
                
       
    }
}
else{
    echo "0 results";
}

}
//update the information in the database

if (isset($_POST["update"])){
    $id=$_POST['id'];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $case_id=$_POST["case_id"];
    $contact=$_POST["contact"];
    $gender=$_POST["gender"];
  
  
    $up="UPDATE `lawyer` SET `fname`='$fname',`lname`='$lname',`case_id`= '$case_id',
    `contactnum1`='$contact',`gender`='$gender'  WHERE `lawyer_id`='$id'";
   

    if($db->query($up)){
        echo "Updated";
        header('location: lawindex.php');
    }
    else{
        echo "\nError: ". $db->error;
    }
}

   


        ?>
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

<div  class="container"id="form-special">
       <h3 style="text-align:center;">Update Lawyer Form</h3>
        <form id = "update_form" action="updatelawyer.php" method="POST">
            <div class="form-group">
              
                <input id = "id" name = "id" type = "hidden" value="<?php echo $id; ?>"><br>
       
         
                <label for = "fname"> First Name</label>
                <input id = "fname" class="form-control" name = "fname" type = "text" value="<?php echo $fname; ?>" required><br>
                <label for = "lname"> Last Name</label>
                <input id = "lname" class="form-control" name = "lname" type = "text" value="<?php echo $lname; ?>" required><br>
                <label for = "case_ID"> Case ID</label>
                <input id = "case_id" class="form-control" name = "case_id" type = "text" value="<?php echo $case_id; ?> " required><br>
                <label for = "contact"> Contact</label>
                <input id = "contact" class="form-control" name = "contact" type = "tel"  value="<?php echo $contact; ?>" required><br>
                <label for = "genderField"> Gender</label>
                <select id = "genderField" class="form-control" name = "gender" value="<?php echo $gender; ?> " required>
                    <option value="Gender" selected hidden>Gender</option>
                    <option value="male"> Male</option>
                    <option value="female"> Female</option>
                    <option value="other"> Other</option>
                </select><br>
                
               
              
                <button class="btn btn-primary" name="update" value= "update" type="submit">Update</button>
                <br>
               
               
                </div>
        </form>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>