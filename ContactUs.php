<?php

require_once '../swiftmailer/lib/swift_required.php';

class ContactUs
{
	private $SMTPServer = "";
	private $SMTPPort = "";
	private $username = "";
	private $password = "";
	private $sender = "";

	public function __construct($SMTPServer, $SMTPPort, $username, $password, $sender)
	{
		$this->SMTPServer = $SMTPServer;
		$this->SMTPPort = $SMTPPort;
		$this->username = $username;
		$this->password = $password;
		$this->sender = $sender;
	}

	public function sendMessage($sendTo, $subject, $message) {
		
		if($sendTo != "" && $subject != "" && $message != "") {

			if(!is_array($sendTo))
				$sendTo = array($sendTo);

			$transport = Swift_SmtpTransport::newInstance($this->SMTPServer,$this->SMTPPort)
				->setUsername($this->username)
				->setPassword($this->password)
				;
			
			$mailer = Swift_Mailer::newInstance($transport);

			$message = Swift_Message::newInstance()
				->setSubject(stripslashes($subject))
				->setFrom(stripslashes($this->sender))
				->setTo($sendTo)
				->setBody(str_replace("\n.", "\n..", stripslashes(nl2br($message))))
				;

			$result = $mailer->send($message);


		}
		else {
			return 1;
		}
	}

	public function setSMTPServer ($value) {
		$this->SMTPServer = $value;
	}

	public function getSMTPServer () {
		return $this->SMTPServer;
	}

	public function setSMTPPort ($value) {
		$this->SMTPPort = $value;
	}

	public function getSMTPPort () {
		return $this->SMTPPort;
	}

	public function setUsername ($value) {
		$this->username = $value;
	}

	public function getUsername () {
		return $this->username;
	}

	public function setPassword ($value) {
		$this->password = $value;
	}

	public function getPassword () {
		return $this->password;
	}

	public function setSender ($value) {
		$this->sender = $value;
	}

	public function getSender () {
		return $this->sender;
	}
}

?>