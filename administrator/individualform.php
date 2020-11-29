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
                    <a class="nav-link" href=#>Cases</a>
                   
                </li>
            </ul>
        </div>
        </div>
    </nav>

    <!--cases form -->
    <div class="container" id="form-special">
       <h3 style="text-align:center;">Cases</h3>
        <form id = "pageForm" action="ind.php" method="POST">
            <div class="form-group">
                <br><label for = "case_id"> Case ID</label>
                <input id = "caseid" class="form-control" name = "caseid" type = "text" required><br>
                <label for = "caseverd"> Case Verdict</label>
                <input id = "casev" class="form-control" name = "casev" type = "text" required><br>
               
                <label for = "courtp"> Court Procedures Followed</label>
                <input id = "courtp" class="form-control" name = "courtp" type = "text" required><br>
               
                <button class="btn btn-primary" name="submit" type="submit">Submit</button>

                </div>
        </form>
</div>
    <!-- individual form-->
    <div  class="container"id="form-special">
       <h3 style="text-align:center;">Individual Form</h3>
        <form id = "pageForm" action="ind.php" method="POST">
            <div class="form-group">
                <br><label for = "ID"> Any form of ID Number</label>
                <input id = "id" class="form-control" name = "id" type = "text" required><br>
                <label for = "fname"> First Name</label>
                <input id = "fname" class="form-control" name = "fname" type = "text" required><br>
                <label for = "lname"> Last Name</label>
                <input id = "lname" class="form-control" name = "lname" type = "text" required><br>
                <label for = "genderField"> Gender</label>
                <select id = "genderField" class="form-control" name = "gender">
                    <option value="Gender" selected hidden>Gender</option>
                    <option value="male"> Male</option>
                    <option value="female"> Female</option>
                    <option value="other"> Other</option>
                </select><br>
                <label for = "dob"> Date of Birth</label>
                <input id = "dob" class="form-control" name = "dob" type = "date" required><br>
                <label for = "crimec"> Committed any crime</label> 
                <select id = "crimec" class="form-control" name = "crimec" required><br>
                    <option value="crimec" selected hidden>Committed any Crime?</option>
                    <option id = "yes" value="yes">Yes</option>
                    <option id = "no" value="no">No </option>
                </select>
                <div id = "parent"></div>
                <br>
                <br>
                
                <button class="btn btn-primary" name="submit1" type="submit">Submit</button>
                <br>
                <br>
                <a  href="individindex.php" class="btn btn-secondary" target="_blank">Update Individual table</a><br>
                <br>
                <a  href="caseindex.php" class="btn btn-secondary" target="_blank">Update Cases table</a>

                </div>
        </form>
    </div>
    <script src="formv.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

