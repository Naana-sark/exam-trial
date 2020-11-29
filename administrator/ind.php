<?php

  if(isset($_POST["submit1"])){
    $vid= $_POST["id"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $crimec = $_POST["crimec"];
   
    
  
  
    if(isset($_POST["yes"])){
        $crimecom = $_POST["crimeC"];
        $caseI = $_POST["caseid"];
        
    }
    $host = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "NATS96322022";
    
    $conn = new mysqli($host, $username, $passwd, $dbname);
    
    if(mysqli_connect_error()) {
        die('Connection error ('. mysqli_connect_errno().')');
    }else{

    
        
       
        if($crimec == "no"){
            $ins= "INSERT INTO `individuals`(`id`, `fname`, `lname`, `gender`, `dob`)
             VALUES ('$vid','$firstname','$lastname','$gender','$dob')";
        }
        if($crimec == "yes"){
            $crimecom = $_POST["crimeC"];
            $caseI = $_POST["caseid"];
            

            // $INSERT =  "INSERT into individuals (id, fname, lname, gender,dob,crimecommitted,case_id) 
            // values ('$vid', '$firstname','$lastname','$gender', '$dob','$crimecom',' $caseI')";

            $ins= "INSERT INTO `individuals`(`id`, `fname`, `lname`, `gender`, `dob`, `crimecommitted`, `case_id`)
             VALUES ('$vid','$firstname','$lastname','$gender','$dob','$crimecom','$caseI')";
            //  echo $ins;
            //  return $ins;

        }


            if($conn->query($ins)){
                echo "New individual inserted successfully";
                header('location: individualform.php');
        }
            else{
                echo "\nError: ". $conn->error;
        }
      


    $conn->close();
}

}
if(isset($_POST["submit"])){
    $id= $_POST["caseid"];
    $caseverd = $_POST["casev"];
    $courtp = $_POST["courtp"];
  
   


    $host = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "NATS96322022";

    $conn = new mysqli($host, $username, $passwd, $dbname);

    if(mysqli_connect_error()) {
        die('Connection error ('. mysqli_connect_errno().')');
    }else{
        $INSERT1 = "INSERT into cases (case_id, case_verdict, court_procedures) 
            values ('$id', '$caseverd','$courtp')";
    }

    if($conn->query($INSERT1)){
        echo "New individual inserted successfully";
        header('location: individualform.php');
    }
        // header("Refresh:0");
    else{
        echo "\nError: ". $conn->error;
    }


    $conn->close();
}

if(isset($_POST["submit3"])){
    $id= $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $case_id=$_POST["case_id"];
    $contact=$_POST["contact"];
    $gender=$_POST["gender"];
  
    $host = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "NATS96322022";

    $conn = new mysqli($host, $username, $passwd, $dbname);

    if(mysqli_connect_error()) {
        die('Connection error ('. mysqli_connect_errno().')');
    }else{
        $INSERT1 = "INSERT into judges (judge_id,fname, lname, case_id, contactnum1, gender) 
            values ('$id', '$fname', '$lname', '$case_id', '$contact', '$gender')";
    }

    if($conn->query($INSERT1)){
        echo "New individual inserted successfully";
        header('location: individualform.php');
    }
        // header("Refresh:0");
    else{
        echo "\nError: ". $conn->error;
    }


    $conn->close();
}
if(isset($_POST["submit4"])){
    $id= $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $case_id=$_POST["case_id"];
    $contact=$_POST["contact"];
    $gender=$_POST["gender"];
  
   


    $host = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "NATS96322022";

    $conn = new mysqli($host, $username, $passwd, $dbname);

    if(mysqli_connect_error()) {
        die('Connection error ('. mysqli_connect_errno().')');
    }else{
        $INSERT1 = "INSERT into lawyer (lawyer_id,fname, lname, case_id, gender, contactnum1) 
            values ('$id', '$fname', '$lname', '$case_id', '$gender', '$contact')";
    }

    if($conn->query($INSERT1)){
        echo "New individual inserted successfully";
        header('location: individualform.php');
    }
        // header("Refresh:0");
    else{
        echo "\nError: ". $conn->error;
    }


    $conn->close();
}


    ?>
   