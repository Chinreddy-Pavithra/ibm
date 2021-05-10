<!DOCTYPE html>
<html>
  
<head>
    <title>SignUp page</title>
</head>
  
<body>
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "a");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $custid = $_REQUEST['custid'];
        $custname = $_REQUEST['custname'];
        $email =  $_REQUEST['email'];
        $currentbalance = $_REQUEST['balance'];
        $pwd1 = $_REQUEST['pwd'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO customers  VALUES ('$custid', 
            '$custname','$email','$currentbalance','$pwd1')";
          
        if(mysqli_query($conn, $sql)){
           echo "<script> alert('Welcome to BUDDY Bank ');
                                     window.location='viewcustomers.php';
                           </script>";
            //echo nl2br("\n$first_name\n $last_name\n "
                //. "$gender\n $address\n $email");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
		<?php
// PHP program to pop an alert
// message box on the screen
  
// Display the alert box 

  
?>
    </center>
</body>
  
</html>
