<?php

	$to = 'zack@propagate.com.au';
	#$to = 'kaushtuv@propagate.com.au';

	$subject = 'Question about RMC product from '.$_POST['name'];
    $development = $_POST['development'];
	$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
    $message .= "<tr><td><strong>Company:</strong> </td><td>" . strip_tags($_POST['comapny']) . "</td></tr>";
	$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
	$message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
        
        
	
	$message .= "</table>";
	$message .= "</body></html>";
	
	#mail($to, $subject, $message, $headers);
	wp_mail( $to, $subject, $message, $headers );
	
	header('Location:'.  bloginfo('template_directory').'/thank-you');
	
?>
