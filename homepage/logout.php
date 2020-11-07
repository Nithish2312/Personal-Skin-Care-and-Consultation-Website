<?php
if(isset($_POST['logout']))
{
 unset($_SESSION['fname']);
 unset($_SESSION['password']);
 echo "success";
 header("../session_expired.php");
 exit();
}
?>
