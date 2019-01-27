if(isset($_POST['submit'])) {

if(trim($_POST['Name']) == '') {
    $hasError = true;
} else {
    $name = trim($_POST['Name']);
}

if(trim($_POST['Subject']) == '') {
    $hasError = true;
} else {
    $subject = trim($_POST['Subject']);
}

//Check to make sure sure that a valid email address is submitted 
if(trim($_POST['email']) == '' && preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$_POST['Email']))  {
    $hasError = true;
}  else {
    $email = trim($_POST['Email']);
}
if(trim($_POST['Message']) == '') {
    $hasError = true;
} else {
    if(function_exists('stripslashes')) {
        $comments = stripslashes(trim($_POST['Message']));
    } else {
        $comments = trim($_POST['Message']);
    }
}

//----------------------Email Validation-----------------//
    function EmVal($e)
    {
        return preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$e);
    }


//If there is no error, send the email
if(!isset($hasError)) {
        $emailTo = 'mrgndwnn@gmail.com';
        $body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments \n\n";
        $headers = 'From: <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;}


}
 ?>