<?php
session_start();
$newpass = $_POST['pass'];
$email = $_SESSION['email'];
$cpass = $_POST['cpass'];
$conn = new mysqli("localhost","root","","customer_details","3306") or die("cannot connect");
if($newpass === $cpass){
    if(!empty($_POST['submit_otp'])){
        $row = $conn -> query("SELECT * FROM account_details WHERE Email = '$email' ");
        $result = mysqli_fetch_assoc($row);
        $count = mysqli_num_rows($row);

        if($count > 0){
            if($result['Password'] == $newpass){
                echo "<script type='text/javascript'>
                alert('New password cannot be same as old password');
               window.location = 'changepassword.html';
            </script>";
            }
            else{
                $result = $conn->query("UPDATE account_details SET Password='$newpass' WHERE Email = '$email' ");
                echo "<p style='color:#31ab00;'>Password Changed</p>";
                require_once("mail.php");
                $mail_status = sendMail($email);
                echo "<script type='text/javascript'>
                setTimeout(function(){
                    window.location = '../homepage/homepage.php';
                },3000)
            </script>";
            }
        }

    }
}
else{
    echo "<script type='text/javascript'>
                alert('passwords dont match');
                window.location = 'changepassword.html';
            </script>";
}
?>
