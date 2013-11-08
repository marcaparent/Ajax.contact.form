<?php

require_once('ContactUs.php');

/* ---------- CONFIG ------------ */

$SMTP_SERVER = "";
$SMTP_PORT = "";
$SMTP_USERNAME = "";
$SMTP_PASSWORD = "";
$SENDER_EMAIL = "";

/* --------- GET POSTBACK -------- */

if((isset($_GET['email']) && $_GET['email'] != "") &&
	(isset($_GET['subject']) && $_GET['subject'] != "") &&
	(isset($_GET['message']) && $_GET['message'] != "")) {

	$contact = new ContactUs($SMTP_SERVER,$SMTP_PORT, $SMTP_USERNAME,$SMTP_PASSWORD,$SENDER_EMAIL);
	$contact->sendMessage($_GET['email'],$_GET['subject'],$_GET['message']);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Show up Contact Form</title>
		<link href='style.css' rel='stylesheet' type='text/css'>
	</head>

	<body>
		<div id="content">
			<h1>Contact us</h1>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" id="message">
			<h2>Contact form</h2>
			<table id="signaler">
				<tr>
					<td>Email : </td>
					<td><input type="text" name="email" id="courrielSignaler"></td>
				</tr>
				<tr>
					<td>Subject : </td>
					<td><input type="text" name="subject" id="sujetSignaler"></td>
				</tr>
				<tr>
					<td>Message : </td>
					<td><textarea type="text" name="message" id="messageSignaler"></textarea></td>
				</tr>
			</table>
			<br/>
			<input type="submit" class="button" value="OK">
			<input type="reset" class="button" value="Cancel">
		</div>
		</div>		
	</body>
</html>