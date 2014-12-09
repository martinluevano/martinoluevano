<?php
session_start();
require_once("csrf.php");
require_once("Mail.php");

try{
	//verify the form was submitted properly
	if (@isset($_POST["name"]) === false || @isset($_POST["email"]) === false || @isset($_POST["subject"]) === false ||
				@isset($_POST["message"]) === false) {
		throw(new RuntimeException("Form variables incomplete or missing"));
	}

	//input sanitation
	$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
	$subject = filter_input(INPUT_POST,"subject", FILTER_SANITIZE_STRING);
	$message = trim(INPUT_POST, "message");
	$message = filter_input(INPUT_POST,"message", FILTER_SANITIZE_STRING);
	$messageLength = strlen($message);
		if($messageLength >301){
			throw (new RangeException("Message is longer than 300 characters"));
		}
	// verify the CSRF tokens
	if(verifyCsrf($_POST["csrfName"], $_POST["csrfToken"]) === false) {
		throw(new RuntimeException("CSRF tokens incorrect or missing. Make sure cookies are enabled."));
	}


// email the user with an activation message
	$to   = "moluevan@yahoo.com";
	$from = $email;

// build headers
	$headers                 = array();
	$headers["To"]           = $to;
	$headers["From"]         = $from;
	$headers["Reply-To"]     = $from;
	$headers["Subject"]      = $subject;
	$headers["MIME-Version"] = "1.0";
	$headers["Content-Type"] = "text/html; charset=UTF-8";

	$message = <<< EOF
<html>
    <body>
        <h1>Hooray someone has contacted you off www.martinoluevano.com</h1>
        <hr />
        <p>$name want to make contact with you about $subject.  You can reach him at $email.  His message is:<br /> $message.</p>
    </body>
</html>
EOF;

	// send the email
	error_reporting(E_ALL & ~E_STRICT);
	$mailer =& Mail::factory("sendmail");
	$status = $mailer->send($to, $headers, $message);
	if(PEAR::isError($status) === true)
	{
		echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Oh snap!</strong> Unable to send mail message:" . $status->getMessage() . "</div>";
	}
	else
	{
		echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Contact successful!</strong> I will get back to you soon.</div>";
	}


} catch(Exception $exception){
	echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Oh Snap!</strong> Unable to send email: " . $exception->getMessage() . "</div>";

}

/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 12/7/2014
 * Time: 11:29 PM
 */ 