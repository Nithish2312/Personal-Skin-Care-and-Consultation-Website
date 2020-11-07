<?php
	function sendOTP($email,$otp) {

		$sub = "Greetings from AlluraSkin";
		$msg = "Your one time password is: ".$otp;
		$rec = $email;
	    $result = mail($rec,$sub,$msg);

		return $result;
	}

	function sendMail($email){
		$sub ="Welcome to AlluraSkin";
		$msg = "Welcome to our page";
		$rec = $email;
		$result = mail($rec,$sub,$msg);
		return $result;
	}
?>
