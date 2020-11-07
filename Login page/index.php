<?php
	session_start();
$mysqli = new mysqli("localhost","root","","customer_details","3306");
$email = "";
$pass = "";
$details = "";
if(!empty(($_POST['submit_value']))){
 $captcha_code= 	$_SESSION["captcha_code"];
  $captcha = $_POST['captcha'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $temp = $mysqli->query("SELECT * FROM account_details WHERE Email='$email' AND Password='$pass'") or die("cannot do");
  $result = mysqli_fetch_assoc($temp);
  if($result['Email'] == $email && $result['Password'] == $pass){
    if(empty($captcha) || $captcha !== $captcha_code){
      echo '<script>alert("Captcha validation fail");</script>';
      }
      else echo "<script type='text/JavaScript'> window.location= '../homepage/homepage.php' </script>";
    }
  else{
    $details = "Wrong details enter again";
  }
}

 ?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | AlluraSkin</title>
<link rel="stylesheet" type="text/css" href="login.css">
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){
	$('.btnAction').click(function(){
	   	if($('#captcha').val() == '')
	   	{
		   alert("Please enter the captcha code");
		   return false;
		}
	})

	$('.btnRefresh').click(function(){
		  $("#captcha_code").attr('src','captcha_code.php');
		  return false;
	})
})
</script>
</head>
<body>
<div class="vikas">

<img src="Symbol.png"	alt="Logo" class="logo1">
<div id="underlogo"><p><b>&nbspAllura<b>Skin</b></b></p></div>
<div id="underlogo1"><p>&nbspPlease Login to continue using AlluraSkin.<br><br><br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Welcome Back!<br><br>Filters are great, but great skin is better!</p></div>
<div id="underlogo1"><p><br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspPlease Login with email</p></div>
<div id="error-message">
  Please check ur details properly and type again
</div>
<br>
 <div class="bunny">
  <form action="" method="post">
    <?php if(!empty($details)){?>
     <script type="text/javascript">
       var object = document.getElementById('error-message');
       object.style.display = "block";
     </script>
   <?php } ?>
   <br>
    <input type="text" id="fname" name="email" placeholder="Email">
    <br>
    <input type="password" id="lname" name="password" placeholder="Password">
   <br>
 		<input type="text" name="captcha" id="captcha" class="input" placeholder="Captcha">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp
    <img id="captcha_code" src="captcha_code.php" />
    &nbsp &nbsp &nbsp &nbsp &nbsp

 		<button name="submit" class="btnRefresh">Refresh Captcha</button>
<br><br>
<br><br>
    <input type="submit" name="submit_value"class="btnAction" accept="text/html" value="Login">
  </form>
</div>
	<div class="bunny">
</div>
	<br>
		<div id="underlogo1"><span>&nbsp &nbsp &nbsp Don’t have an account ? </span><span style="color:#00DBD0;"></span><span style="color:#00DBD0;"><a href="../signuppage/index.html" style="text-decoration:none; color:#00DBD0;">Sign Up</a></span></div>
        <div id="underlogo1"><span><br>&nbsp &nbsp &nbsp &nbsp &nbsp Forgot password ? </span><a href="../forgotpassword/main.html" style="text-decoration:none; color:#00DBD0;">click here</a></div>

      </div>
</body>
</html>
