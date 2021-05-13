<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
$errors = array();
 include "dbconn.php";
if(!$db){
    die("Connection failed: " .mysqli_connect_errno());
}
    // login

if(isset($_POST['login_user'])){
    $custid = mysqli_real_escape_string($db, $_POST['custid']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if(empty($custid)){
        $usernameerror = "*customer id is required";
        array_push($errors, $usernameerror);
    }
    if(empty($password)){
        $passworderror = "*Password is required";
        array_push($errors, $passworderror);
    }
    
    if(count($errors) == 0){
        
        $fetch_query = "SELECT * FROM customers WHERE custid='$custid' AND pwd='$password'";
        $results = mysqli_query($db, $fetch_query);
        if (mysqli_num_rows($results) == 1) {
  	         $_SESSION['custid'] = $custid;
  	         $_SESSION['success'] = "You are now logged in";
  	         echo "<script> alert('Welcome to BUDDY Bank ');
                                     window.location='viewcustomers.php';
                           </script>";   // after login you have to give the location where you want to go
  	     }else {
  		    array_push($errors, "*Invalid Credentials");
  	     }
        
    }
}
?>