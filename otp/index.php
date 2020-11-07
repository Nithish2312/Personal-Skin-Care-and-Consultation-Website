<?php
session_start();
$success = "";
$error_message = "";
$conn = mysqli_connect("localhost","root","","customer_details","3306");
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$pass = $_SESSION['password'];

if(!empty($email) && empty($_POST["submit_otp"])) {
    setcookie("email",$email,time() + 86400,"/");
	$count  = strlen($email);
	if($count>0) {
		// generate OTP
		$otp = "";
		$mail_status = "";
		if(empty($success)){
		$otp = rand(100000,999999);
		// Send OTP
		require_once("mail_function.php");
		$mail_status = sendOTP($email,$otp);
		}

		if($mail_status == true) {
			$result = mysqli_query($conn,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($conn);
			$success = 3;
			if(!empty($current_id)) {
				$success=1;
			}
		}
	} else {
		$error_message = "Email not exists!";
	}
}
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($conn,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$result1 = mysqli_query($conn,"INSERT INTO account_details(Firstname, Lastname,Email, Password) VALUES ('$fname','$lname','$email','$pass')");
		$success = 2;
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}
}
if(!empty($_POST['Resend'])){
    $email = $_COOKIE['email'];
    $_SESSION['resend'] = 1;
    $count  = strlen($email);
    if($count>0) {
        // generate OTP
        $otp = "";
        $mail_status = "";
        if(empty($success)){
            $otp = rand(100000,999999);
            // Send OTP
            require_once("mail_function.php");
            $mail_status = sendOTP($email,$otp);
        }

        if($mail_status == true) {
            $result = mysqli_query($conn,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
            $current_id = mysqli_insert_id($conn);
            $success = 3;
            if(!empty($current_id)) {
                $success=1;
            }
        }
    } else {
        $error_message = "Email not exists!";
    }
}
?>
<html>
<head>
<title>User Login</title>
<style media="screen">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    /* sets whole page to Open Sans and sets background color */
    body {
        font-family: 'Open Sans', 'sans-serif';
        background-image: url(Untitled-1.jpg);
        margin-top: 200px;
    }
    img{
        margin-bottom: 50px;
    }
    /* login div */
    .login {
        margin-top: 500px;
        background-color: #eee;
        width: 420px;
        height: 312px;
        margin: 0 auto;
        padding: 0;
    }

    /* login header */
    h1 {
        color: #55acee;
        text-align: center;
        font-size: 36px;
        padding-top: 10px;
    }

    /* div containing form */
    form {
        text-align: center;
    }

    /* username and password fields */
    input:not([type="button"]) {
        font-family: 'Open Sans', 'sans-serif';
        border: 1px solid #acacac;
        color: #666;
        opacity: .7;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
        width: 250px;
        transition: all .3s;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        font-size: 16px;
    }

    input:focus:not([type="button"]) {
        border: 1px solid #55acee;
        opacity: 1;
        width: 320px;
        outline: none;
        color: #55acee;
    }

    /* submit button */
    input[type="button"] {
        padding: 15px 25px;
        font-size: 22px;
        width: 420px;
        color: #fff;
        position: relative;
        display: inline-block;
        background-color: #55acee;
        box-shadow: 0px 5px 0px 0px #3C93D5;
        outline: none;
        border: none;
    }

    input[type="button"]:active {
        transform: translate(0px, 5px);
        -webkit-transform: translate(0px, 5px);
        box-shadow: 0px 0px 0px 0px;
    }

    input[type="button"]:hover {
        background-color: #6FC6FF;
    }

</style>
</head>
<body>
<center>
    <img src="Symbol.png" alt="">
</center>
	<?php
		if(!empty($error_message)) {
	?>
            <div class="message error_message" style='color: red;'><center>OTP Expired after 60s</center></div>
	<?php
		}
	?>

<form name="frmUser" method="post" action="">
	<div class="tblLogin">
		<?php
			if ($success == 2) {
				require_once("mail_function.php");
				$mail_status = sendMail($email);
        ?>
		<p style="color:#31ab00;">Welcome, You have successfully Created the account!!</p>
		<script type="text/javascript">
			setTimeout(function(){
				window.location = "../homepage/homepage.php";
			},3000)
		</script>
		<?php
			}
			else {

		?>
                <div class="tableheader">Enter OTP</div>
        <?php if(isset($_POST['resend'])){

            ?><p style="color:#31ab00;" id="message">OTP sent again Please Check Your Mail <?php echo "$email"." "; ?></p>
        <?php }else{ ?>
        <p style="color:#31ab00;" id="message">Check your email to <?php echo "$email"." "; ?>for the OTP</p>
        <div class="tablerow">
            <?php } ?>

            <input type="text" name="otp" placeholder="One Time Password" class="login-input"> <br> <br>
            <input type="submit" name="submit_otp" value="Submit" class="btnSubmit"> <br /> <br>
            <input type="submit" name="resend" value="Resend">
		<?php

			}
		?>
	</div>
</form>
</body></html>
