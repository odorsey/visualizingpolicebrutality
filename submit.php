<?php
if (isset($_POST["submit"])) {
	$name = strip_tags(htmlentities($_POST['name']));
	$email = strip_tags(htmlentities($_POST['email']));
	$message = strip_tags(htmlentities($_POST['message']));
	$from = 'VBP Contact Form'; 
	$to = 'oddorsey@gmail.com'; 
	$subject = 'Message from a Visualizing Police Brutality Visitor';
	 
	$body = "From: $name\n E-Mail: $email\n Message:\n $message";
	
	// Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your first and last name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter a message';
        }
       
	   if (!$errName && !$errEmail && !$errMessage) {
			if (mail($to, $subject, $body, $from)) {
				$result='<div class="alert alert-success">Your email has been sent. I will respond as soon as I can.</div>';
			} else {
				$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again.</div>';
			}
		}
}
?>