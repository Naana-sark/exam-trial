<!DOCTYPE html>
<html lang= "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Mystery Law</title>
      
        <link rel="stylesheet" href = "register.css" type = "text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <link href= "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
        });
        </script>
</head>

   
    <body id="page-top"> 
    <div class ="jumbotron" style="background-color:  rgb(211, 138, 138);">

    <!--navigation bar begins-->
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
    <!--navigation bar ends-->
    </div>

    <!--displaying the cases table and allowing you to create, read, update and delete data-->
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Lawyer Details</h2>
                        <a href="lawform.php" class="btn btn-info pull-right" target="_blank">Add New Lawyer</a>
                    </div>
                    <?php
                    //check connection
                    $db = mysqli_connect('localhost', 'root', '', 'NATS96322022');
                    if(mysqli_connect_error()) {
                        die('Connection error ('. mysqli_connect_errno().')');
                    }
                    
                    $sql = "SELECT * FROM lawyer";
                    if($result = $db->query($sql)){
                        
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped table-responsive-lg'>";
                                echo "<thead>";
                                    echo "<tr>";
                                       
                                        echo "<th> Lawyer ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Case ID</th>";
                                       
                                        echo "<th>Gender</th>";
                                        echo "<th>Contact</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['lawyer_id'] . "</td>";
                                        echo "<td>" . $row['fname'] ." ". $row["lname"]. "</td>";
                                        echo "<td>" . $row['case_id'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['contactnum1'] . "</td>";
        
                                        echo "<td>";
                                            echo "<a href='lawyerread.php?id=". $row['lawyer_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open' style='color:red'></span></a>";
                                            echo "<a href='updatelawyer.php?id=". $row['lawyer_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil' ></span></a>";
                                            echo "<a href='deletelawyer.php?id=". $row['lawyer_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash' style='color:black'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $db->error;
                    }
                    
                    // Close connection
                    $db->close();
                    ?>
                 </div>
            </div>        
        </div>
    </div>

                    

    </body>
</html>