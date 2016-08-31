<?php
	session_start();
	require_once "admin/includes/functions.php";

	if(isset($_POST['sendmail']))
	{
	
		if (!empty($_REQUEST['captcha'])) 
		{
			if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) 
			{
				$_SESSION['refill'] = array(
					'fname' => $_POST['fname'],
					'address' => $_POST['address'],
					'state' => $_POST['state'],
					'post' => $_POST['post'],
					'country' => $_POST['country'], 
					'telephone' => $_POST['telephone'], 
					'email' => $_POST['email'],
					'message' => $_POST['message']
				);
				redirect('index.php?msg=2');
			} 
			else 
			{
					$to      = 'admin@train2invest.com';
					$subject = 'Contact Enquiry';
					$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From:info@websolutioninc.net \r\n";
					$headers .= "Reply-To: " . strip_tags($_POST['email']) . "\r\n";
					$message = "<html> <head><style>td, th {border:1px solid #000; padding:5px;}</style> <title>Birthday Reminders for August</title> </head> <body>";
					$message .= "<table>";
					$message .= "<tr>";
					$message .= "<th>Full Name</th><th>Address</th> <th>State</th><th>Post Code</th><th>Country</th><th>Telephone</th><th>Email</th><th>Message</th>";
					$message .= "</tr>";
					$message .= "<tr>";
					$message .= "<td>" . $_POST['fname'] . "</td><td>" . $_POST['address'] . "</td> <td>" . $_POST['state'] . "</td><td>" . $_POST['post'] . "</td><td>" . $_POST['country'] . "</td><td>" . $_POST['telephone'] . "</td><td>" . $_POST['email'] . "</td><td>" . $_POST['message'] . "</td>";
					$message .= "</tr>";
					$message .= "</table>";
					$message .= "</body>";
					$message .= "</html>";
					if (mail($to, $subject, $message, $headers)) {
						session_destroy();
						redirect('index.php?msg=3');
					} else {
						redirect('index.php?msg=4');
					}
		
	
			}


		}
	}
	
	else{
		redirect('index.php?msg=1');
	}
	
?>