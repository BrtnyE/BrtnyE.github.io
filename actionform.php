<?php

$webmaster_email = "britneyedok03@gmail.com";

$feedback_page = "index.html";
$error_page = "error_message.html";
$thankyou_page = "thank_you.html";

$Name = $_REQUEST['name'] ;
$Email = $_REQUEST['email_address'] ;
$Subject = $_REQUEST['subject'] ;
$Massage = $_REQUEST['massage'] ;
$massage = 
"Name: " . $Name . "\r\n" . 
"Email: " . $Email . "\r\n" . 
"Subject: " . $Subject . "\r\n" .
"Massage ;" . $Massage ;

function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

if (!isset($_REQUEST['email_address'])) {
header( "Location: $feedback_page" );
}

elseif (empty($Name) || empty($Email)) {
header( "Location: $error_page" );
}

elseif ( isInjected($Name) || isInjected($Email)  || isInjected($Subject)   || isInjected($Massage) ) {
header( "Location: $error_page" );
}

else {

	mail( "$webmaster_email", "Feedback Form Results", $msg );

	header( "Location: $thankyou_page" );
}
?>
