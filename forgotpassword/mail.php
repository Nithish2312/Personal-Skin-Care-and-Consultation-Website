<?php
function sendOTP($email,$otp) {

    $sub = "Greetings!";
    $msg = "Your one time password is: ".$otp;
    $rec = $email;
    $result = mail($rec,$sub,$msg);

    return $result;
}

function sendMail($email){
    $sub ="Your password has been changed";
    $msg = "Your password has been changed successfully !!!";
    $rec = $email;
    $result = mail($rec,$sub,$msg);
    return $result;
}
?>