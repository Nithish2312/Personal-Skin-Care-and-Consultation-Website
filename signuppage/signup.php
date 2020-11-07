<?php
session_start();
$mysqli = new mysqli("localhost","root","","customer_details","3306");
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["mail"];
$pass = $_POST["pass1"];
$cpass = $_POST["pass2"];
$temp1 = mysqli_query($mysqli,"SELECT *  FROM account_details WHERE Email='$email' ");

$rows = mysqli_num_rows($temp1);
if($pass === $cpass){
  if($rows > 0){
    echo "<script type='text/JavaScript'> alert('Account already exists'); window.location='../signuppage/index.html' </script>";
    }
    else{
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $pass;
      $_SESSION["name"] = $_POST["firstname"];
      echo "<script type='text/JavaScript'> window.location='../otp/index.php' </script>";
    }
  }

	else{
		echo "<script type='text/JavaScript'> alert('the password are not matching enter again'); window.location = '../signuppage/index.html'; </script>";
	}

 ?>
